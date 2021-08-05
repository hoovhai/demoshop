<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductAdminService;
use App\Product;

class ProductController extends Controller
{
    protected $productService;
    protected $menuService;

    public function __construct(ProductAdminService $productService, MenuService $menuService)
    {
        $this->productService = $productService;
        $this->menuService = $menuService;
    }


    public function index()
    {
        return view('admin.products.liss', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->getProduct()
        ]);
    }

    
    public function create()
    {
        return view('admin.products.add', [
            'title' => 'Thêm Sản Phẩm',
            'menus' => $this->menuService->getParent()
        ]);
    }

    
    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);

        return redirect()->back();
    }

    
    public function show(Product $product)
    {
        return view('admin.products.edit', [
            'title' => 'Update Sản Phẩm' . $product->name,
            'menus' => $this->menuService->getParent(),
            'product' => $product
        ]);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);

        if ($result) {
            return redirect('admin/products/list');
        }
        
        return redirect()->back();
    }

    
    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa Thành công'
            ]);
        } else {
            return response()->json([
                'error' => true,
            ]);
        }
    }
}
