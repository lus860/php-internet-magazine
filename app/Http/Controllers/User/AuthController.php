<?php

namespace App\Http\Controllers\User;

use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{
    public $user = [];

    public $guest_password;

    protected function guard()
    {
        return Auth::guard();
    }
    public function showSignInForm()
    {
        $title = 'User Sign In';
        return view('user.auth.signin', ['title'=> $title]);
    }


    public function showSignUpForm()
    {
        $title = 'Admin Sign Up';
        return view('user.auth.signup', ['title'=> $title]);
    }

    public function setUser($request){
        $this->user = [
            'firstname' => $request->firstname? $request->firstname: $request->guest_firstname,
            'lastname' => $request->lastname? $request->lastname: $request->guest_lastname,
            'address' => $request->address? $request->address: $request->guest_address,
            'email' => $request->email? $request->email: $request->guest_email,

        ];
        if(isset($request->password)){
            $this->user['password'] = $request->input('password');
        }
    }
    public function register(Request $request)
    {
        $attributes = $request->all();

        if(array_key_exists('firstname', $attributes) &&
            array_key_exists('lastname', $attributes) &&
            array_key_exists('email', $attributes) &&
            array_key_exists('password', $attributes) &&
            array_key_exists('phone', $attributes) &&
            array_key_exists('address', $attributes)
        ){
            $request->validate( [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required'],
                'address' => ['required', 'string'],
            ]);

        } else {
            $request->validate( [
                'guest_firstname' => ['required', 'string', 'max:255'],
                'guest_lastname' => ['required', 'string', 'max:255'],
                'guest_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'guest_phone' => ['required'],
                'guest_address' => ['required', 'string'],

            ]);
         }

        $this->setUser($request);

        $phone = isset($request->phone)? $request->phone: $request->guest_phone;
        $this->check($phone);
        $this->guest_password = uniqid();
        $user = $this->createUser();
        $this->verifyEmail();
        event(new Registered($user));
        $this->guard()->login($user);
        return view('auth.verify');
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


    public function createUser(){

        $user = new User;
        $user->firstname = $this->user['firstname'];
        $user->lastname = $this->user['lastname'];
        $user->email = $this->user['email'];
        $user->password = isset($this->user['password'])?Hash::make($this->user['password']):Hash::make($this->guest_password);
        $user->address = $this->user['address'];
        $user->phone = $this->user['phone'];
        $user->save();

        return $user;
    }

    public function verifyEmail(){

        VerifyEmail::toMailUsing(function ($notifiable) {

            // Генерация ссылки для подтверждения письма
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify', Carbon::now()->addMinutes(20), [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification())
                ]
            );

            $vars = [
                'url' => $verifyUrl
            ];

            $newPass = isset($this->user['password'])?' ':'Your password '. $this->guest_password;
            return (new MailMessage)
                ->subject(Lang::get('Verify Email Address'))
                ->line(Lang::get('Please click the button below to verify your email address.'. $newPass))
                ->action(Lang::get('Verify Email Address'), $verifyUrl)
                ->line(Lang::get('If you did not create an account, no further action is required.'));
        });
    }

    public function logged(Request $request){

        $request->validate( [
            'phone' => ['required'],
            'address' => ['required', 'string'],
        ]);

        $this->user = [
            'address' => $request->address,
        ];

        $this->check($request->phone);

        if($this->user){

            $id = Auth::user()->id;
            $userAuth = User::find($id);
            if(User::where('id',  $id)->update( $this->user )){

                return true;
            }
            return false;
        }
    }
}
