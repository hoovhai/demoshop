<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;

class UploadController extends Controller
{
    protected $upload;
    
    public function __construct(UploadService $uploadService)
    {
        $this->upload = $uploadService;
    }

    public function store(Request $request)
    {
        $url = $this->upload->store($request);

        if ($url != false)
        {
            return response()->json( [
                'error' => false,
                'url' => $url
            ] );
        } else {
            return response()->json( [
                'error' => true
            ] );
        }
    }
}
