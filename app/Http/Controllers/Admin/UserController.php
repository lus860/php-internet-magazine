<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Users';
        $users = User::all();
        return view('admin.user.index', ['title' => $title, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create User';

        $role = [
            'Admin' => User::ADMIN,
            'User' => User::USER,
        ];
        return view('admin.user.create', ['title' => $title, 'role' => $role ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required'],
            'address' => ['required', 'string'],
        ]);

        $this->check( $request->phone);
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = $request->email_verified_at;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user = $user->save();

        if ($user) {

            return redirect('/admin/user')->with('success', __('user.user_create'));
        }
        return redirect()->back()->with('error', __('message.error.some_mistake_went'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit User';
        $role = [
            'Admin' => User::ADMIN,
            'User' => User::USER,
        ];
        $user = User::find($id);
        return view('admin.user.edit', ['title' => $title, 'user' => $user,'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate( [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required'],
            'address' => ['required', 'string'],
        ]);

        $user = User::find($id);

        if($user->email !== $request->email){
            $request->validate( [
                'email' => ['unique:users'],
            ]);
        }

        $this->check( $request->phone);


        if($user){
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->email_verified_at = $request->email_verified_at;
            $user->role = $request->role;
            $user = $user->save();
            if ($user) {

                return redirect('/admin/user')->with('success', __('user.user_update'));
            }
            return redirect()->back()->with('error', __('message.error.some_mistake_went'));
        }
        return redirect()->back()->with('error', __('message.error.some_mistake_went'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            if( $user->delete()){
                return redirect('/admin/user')->with('success', __('user.user_destroy'));
            }
        } else {
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
    }


    public function check($phone){
        if(strlen($phone) == 9 && substr($phone,0,1) == 0 ){
            $this->user['phone'] = '+374'.substr($phone, 1);
        }elseif(strlen($phone) == 12 && substr($phone,0,4) == '+374'){
            $this->user['phone'] = $phone;
        }elseif(strlen($phone) == 8 ){
            $this->user['phone'] = '+374'.$phone;
        }
    }
}
