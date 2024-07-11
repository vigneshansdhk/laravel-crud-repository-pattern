<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;





Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::post('store', 'store');
    Route::get('edit/{id}', 'edit');
    Route::post('update', 'update');
    Route::get('delete/{id}', 'destroy');
    Route::get('del-image/{data}/{id}', 'DeleteImage');
});
