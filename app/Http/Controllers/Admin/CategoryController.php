<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('IsAdmin');

    }

    public function index()
    {
        $title = 'Category';
        $categories = Category::all();
        return view('admin.category.index', ['title' => $title, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Category';
        $subcategories = SubCategory::all();
        return view('admin.category.create', ['title' => $title, 'subcategories' => $subcategories]);
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
        $category = Category::create($data);

        if ($category) {
            $category_id = Category::latest()->first()->id;
            if($request->subcategorie){
                foreach ($request->subcategories as $id){
                    $subcategory = SubCategory::find($id);
                    $subcategory->categories()->attach($category_id);
                }
            }

            return redirect('/admin/category')->with('success', __('category.category_create'));
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
        $title = 'Edit Category';
        $category = Category::find($id);
        $subcategories = SubCategory::all();
        return view('admin.category.edit', ['title' => $title,'category' => $category, 'subcategories' => $subcategories]);
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
        $category = Category::find($id);

        $old_subcategories = $category->sub_categories;
        $old_id = $category->id;
        if($category){
            if(Category::where('id',  $id)->update($data)){
                foreach ($old_subcategories as $old_subcategory){
                    $old_subcategory->categories()->detach($old_id);
                }

                if($request->subcategories){
                    foreach ($request->subcategories as $id){
                        $subcategory = SubCategory::find($id);
                        $subcategory->categories()->attach($old_id);
                    }
                }

            }
            return redirect('/admin/category')->with('success',  __('category.category_update'));

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
        $category = Category::find($id);
        if($category){
            if( $category->delete()){
                return redirect('/admin/category')->with('success', __('category.category_destroy'));
            }
        } else {
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
    }
}
