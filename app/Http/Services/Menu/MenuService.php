<?php

namespace App\Http\Services\Menu;
use App\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService 
{

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
                Menu::create([
                    'name' => (string) $request->input('name'),
                    'parent_id' => (int) $request->input('parent_id'),
                    'description' => (string) $request->input('desc'),
                    'content' => (string) $request->input('content'),
                    'active' => (string) $request->input('active'),
                    'slug'  => Str::slug($request->input('name'), '-')
                ]);

                Session::flash('success', 'Tạo Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request) 
    {
        $id = $request->input('id');

        $menu = Menu::where('id', $id)->first();

        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function updateMenu($menu, $request) : bool
    {   
        if($request->input('parent_id') !== $menu->id) {
            $menu->parent_id = $request->input('parent_id');
        }
        
        $menu->name = $request->input('name');
        $menu->description = $request->input('description');
        $menu->content = $request->input('content');
        $menu->active = $request->input('active');
        $menu->save();

        Session::flash('success', 'Sửa danh mục thành công !'); 
        return true;
    }

}