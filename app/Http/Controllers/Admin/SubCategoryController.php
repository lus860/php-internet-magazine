<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('IsAdmin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Subcategories';
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index', ['title' => $title, 'subcategories' => $subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Subcategory';

        return view('admin.subcategory.create', ['title' => $title]);
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
            'name' => ['required', 'string', 'max:255'],
        ]);

        $data['name'] = $request->name;
        $category = SubCategory::create($data);

        if ($category) {
            return redirect('/admin/subcategory')->with('success', __('subcategory.subcategory_create'));
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
        $title = 'Edit Subcategory';
        $subcategory = SubCategory::find($id);

        return view('admin.subcategory.edit', ['title' => $title,'subcategory' => $subcategory]);
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
            'name' => ['required', 'string', 'max:255'],

        ]);

        $data['name'] = $request->name;

        $subcategory = SubCategory::find($id);

        if($subcategory){
            SubCategory::where('id',  $id)->update($data);
            return redirect('/admin/subcategory')->with('success',  __('subcategory.subcategory_update'));

            return redirect()->back()->with('error', __('message.error.some_mistake_went'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        if($subcategory){
            if( $subcategory->delete()){
                return redirect('/admin/subcategory')->with('success', __('subcategory.subcategory_destroy'));
            }
        } else {
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
    }
}
