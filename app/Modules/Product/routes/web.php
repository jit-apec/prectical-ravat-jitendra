<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Product\Http\Controllers\ProductController;

Route::group(['prefix'=>'/admin/product','middleware'=>['auth']],function(){

Route::get('/', [ProductController::class,'list']);
Route::get('/add',[ProductController::class,'create']);
Route::post('/add',[ProductController::class,'store']);
Route::get('/edit/{id}',[ProductController::class,'edit']);
Route::post('/edit/{id}',[ProductController::class,'update']);
Route::get('/delete',[ProductController::class,'destroy']);
Route::get('/less_stock',[ProductController::class,'less_stock']);
});
