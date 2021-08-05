<?php

namespace App\Http\Services\Product;

use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService 
{

    protected function isValidPrice($request)
    {
        if($request->input('price') != 0 && $request->input('price_sale') != 0 && $request->input('price_sale') >= $request->input('price'))
        {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc !');
            return false;
        }

        if ($request->input('price_sale') != 0 && $request->input('price') == 0)
        {
            Session::flash('error', 'Vui lòng nhập giá gốc !');
            return false;
        }

        return true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);

        if ($isValidPrice == false) return false;

        $result = $request->except('_token');

        // dd($result);     

        try {           
            Product::create($result);
            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm sản phẩm lỗi');
            Log::info($err->getMessage());
            return false;
        }
        
        return true;
    }

    public function getProduct() 
    {
        return Product::with('menu')
        ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);

        if ($isValidPrice == false) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Update sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Update sản phẩm lỗi');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }


    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();

        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}