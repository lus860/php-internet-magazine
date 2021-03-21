<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $newMenuItems = [];
    public $parentCount = '----';

    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('IsAdmin');

    }

    public function index()
    {
        $title = 'Menus';
        $submenu = Menu::orderBy('sort_order')->get();
        return view('admin.menu.index', ['title' => $title, 'submenu' => $submenu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Submenu';
        $menuItems = Menu::all();
        foreach ($menuItems as $item) {
            if($item->parent_id == 0 ) {
                $this->newMenuItems[$item->id] = $item->name;
                if(count ($item->childrens) >0) {
                    $this->rekursiya($item, count($menuItems));
                }

            }
        }
        return view('admin.menu.create', ['title'=>$title, 'menuItems' => $this->newMenuItems]);

    }

    public function rekursiya($item, $count) {

        if(count ($item->childrens) >0) {
            foreach ($item->childrens as $children) {
                $this->parentCount = '----';
                if ($item->parent_id !== 0){
                    $this->parentCount($item);
                }
                $this->newMenuItems[$children->id] = $this->parentCount.$children->name;
                if($count == count($this->newMenuItems)) {
                    return;
                } elseif (count ($children->childrens) >0) {
                    $this->rekursiya($children, $count);
                }
            }
        }
    }

    public function parentCount($item) {

        $parent_id = $item->parent_id;
        if ($parent_id == 0) {
            return;
        } else {
            $menuItem = Menu::find($parent_id);
            $this->parentCount .='----';
            $this->parentCount($menuItem);
        }

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
            'parent_id' => ['required'],
            'url' => ['required', 'string', 'max:255'],
        ]);

        $data['name'] = $request->name;
        $data['url'] = $request->url;
        $data['parent_id'] = $request->parent_id;
        $data['status'] =  $request->status ? Menu::ENABLED:Menu::DISABLE;
        $menu = Menu::create($data);

        if ($menu) {
            return redirect('/admin/menu')->with('success', __('menu.menu_create'));
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

    public function sorting(Request $request)
    {
        $json = $request->nested_menu_array;
        $decoded_json = json_decode($json, TRUE);
        $simplified_list = [];
        $this->recur1($decoded_json, $simplified_list);

        try {
            $info = [
                "success" => FALSE,
            ];

            foreach($simplified_list as $k => $v){
                $menu = Menu::find($v['id']);
                $menu->parent_id = $v['parent_id'];
                $menu->sort_order = $v['sort_order'];
                $menu->save();
            }
            $info['success'] = TRUE;
        } catch (\Exception $e) {
            $info['success'] = FALSE;
        }

        if($info['success']){
            return redirect('/admin/menu')->with('success',  __('menu.menu_sorting_update'));

        }else{
            return redirect()->back()->with('error', __('message.error.some_mistake_went'));
        }

    }

    public function recur1($nested_array=[], &$simplified_list=[]) {

        static $counter = 0;

        foreach($nested_array as $k => $v){

            $sort_order = $k+1;
            $simplified_list[] = [
                "id" => $v['id'],
                "parent_id" => 0,
                "sort_order" => $sort_order
            ];

            if(!empty($v["children"])) {
                $counter+=1;
                $this->recur2($v['children'], $simplified_list, $v['id']);
            }

        }
    }

    public function recur2($sub_nested_array=[], &$simplified_list=[], $parent_id = NULL) {

        static $counter = 0;

        foreach($sub_nested_array as $k => $v){

            $sort_order = $k+1;
            $simplified_list[] = [
                "id" => $v['id'],
                "parent_id" => $parent_id,
                "sort_order" => $sort_order
            ];

            if(!empty($v["children"])){
                $counter+=1;
                $this->recur2($v['children'], $simplified_list, $v['id']);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Menu';
        $menu = Menu::find($id);
        $menuItems = Menu::all();
        foreach ($menuItems as $item) {
            if($item->parent_id == 0 ) {
                $this->newMenuItems[$item->id] = $item->name;
                if(count ($item->childrens) >0) {
                    $this->rekursiya($item, count($menuItems));
                }

            }
        }
        return view('admin.menu.edit', ['title' => $title,'menu' => $menu, 'menuItems' => $this->newMenuItems]);
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
            'parent_id' => ['required'],
            'url' => ['required', 'string', 'max:255'],
        ]);

        $data['name'] = $request->name;
        $data['url'] = $request->url;
        $data['parent_id'] = $request->parent_id;
        $data['status'] =  $request->status ? Menu::ENABLED:Menu::DISABLE;

        $menu = Menu::find($id);

        if($menu){
            Menu::where('id',  $id)->update($data);
                return redirect('/admin/menu')->with('success',  __('menu.menu_update'));

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
        $menu = Menu::find($id);
        if($menu){
            if( $menu->delete()){
                return redirect('/admin/menu')->with('success', __('menu.menu_destroy'));
            }
        } else {
            return redirect()->back()->with('error', 'Some mistake went !!');
        }

    }

}
