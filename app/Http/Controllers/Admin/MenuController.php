<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Menu as AppMenu;
use App\Models\Menu;
use Monolog\Handler\RedisHandler;

class MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menus.add', [
            'title' => 'Thêm Danh Mục',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);

        return redirect()->back();
    }

    public function list()
    {
        return view('admin.menus.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'menus' => $this->menuService->getAll()
        ]);
    }


    public function destroy(Request $request)
    {
        $result =  $this->menuService->destroy($request);

        if ($result) 
        {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        } 

        return response()->json([
            'error' => true
        ]);
    }

    public function edit(AppMenu $menu)
    {
        return view('admin.menus.edit', [
            'title' => 'Chỉnh sửa danh mục: ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function update(AppMenu $menu, CreateFormRequest $request)
    {
        $this->menuService->updateMenu($menu, $request);

        return redirect('admin/menus/list');
    }
}

