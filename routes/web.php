<?php

use App\Http\Controllers\Admin\MainController as MainControllerAdmin;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//admin
Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/users/login/store', [LoginController::class, 'store']);



Route::middleware(['auth']) ->group( function () {

    Route::prefix('admin')->group(function() {
        Route::get('/', [MainControllerAdmin::class, 'index'])->name('admin');
        Route::get('/main', [MainControllerAdmin::class, 'index']);

        //Menus
        Route::prefix('menus')->group(function () { 
            Route::get('add', [MenuController::class, 'create']);
            Route::post('store', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'list']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
            Route::get('edit/{menu}', [MenuController::class, 'edit']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
        });

        //Product
        Route::prefix('products')->group(function () { 
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
        });

        //Slider
        Route::prefix('sliders')->group(function () { 
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
        });

        //Upload
        Route::post('upload/services', [UploadController:: class, 'store']);
        
    });

});

//fronend

Route::get('/', [MainController:: class, 'index']);
