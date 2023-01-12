<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;





Route::get('/',[ProductController::class,'products'])->name('products');
Route::post('/add-product',[ProductController::class,'saveProduct'])->name('add.product');
