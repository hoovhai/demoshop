<?php

namespace App\Http\Services\Slider;

use App\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SliderService 
{
    public function insert($request)
    {
        try {
            Slider::create($request->input());
            Session::flash('success', 'Thêm Slider phẩm thành công');
        } catch(\Exception $err) {
            Log::info($err->getMessage());
            Session::flash('error', 'Thêm Slider lỗi !');
            return false;
        }

        return true;
    }

    public function get()
    {
        return Slider::orderbyDesc('id')->paginate(10);
    }

    public function update($slider, $request)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Update Slider phẩm thành công');
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            Session::flash('error', 'Update Slider lỗi !');
            return false;
        }
        
        return true;
    }

    public function delete($request) :bool
    {
        $slider = Slider::where('id', $request->input('id'))->first();

        if($slider) {
            $slider->delete();
            return true;
        }

        return false;
    }
}