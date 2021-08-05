<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Slider;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }


    public function create()
    {
        return view('admin.sliders.add', [
            'title' => 'Thêm Slider'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required',
        ]);

        $this->sliderService->insert($request);
        
        return redirect()->back();
    }

    public function index() 
    {
        return view('admin.sliders.list', [
            'title' => 'Danh sách Sliders',
            'sliders' => $this->sliderService->get()
        ]);
    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.edit', [
            'title' => 'Update slider',
            'slider' => $slider
        ]);
    }

    public function update(Slider $slider, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required',
        ]);

        $result = $this->sliderService->update($slider, $request);

        if ($result)
        {
            return redirect('admin/sliders/list');
        } else {
            redirect()->back();
        }
    }

    public function destroy(Request $request) 
    {
        $result = $this->sliderService->delete($request);

        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        } else {
            return response()->json([
                'error' => true,
            ]);
        };
    }
}
