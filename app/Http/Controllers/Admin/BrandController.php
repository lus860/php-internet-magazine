<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
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
        $title = 'Brand';
        $brand = Brand::paginate(5);
        return view('admin.brand.index', ['title' => $title, 'brands' => $brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Brand';

        return view('admin.brand.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $data['name'] = $request->name;
        $menu = Brand::create($data);

        if ($menu) {
            return redirect('/admin/brand')->with('success', __('brand.brand_create'));
        }
        return redirect()->back()->with('error', __('message.error.some_mistake_went'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Brand';
        $brand = Brand::find($id);

        return view('admin.brand.edit', ['title' => $title, 'brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);

        $data['name'] = $request->name;

        $brand = Brand::find($id);

        if ($brand) {
            Brand::where('id', $id)->update($data);
            return redirect('/admin/brand')->with('success', __('brand.brand_update'));

            return redirect()->back()->with('error', __('message.error.some_mistake_went'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            if ($brand->delete()) {
                return redirect('/admin/brand')->with('success', __('brand.brand_destroy'));
            }
        } else {
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
    }
}
