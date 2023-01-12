<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        return view('products');
    }

    public function saveProduct(Request $request){
        $request->validate([
            'name'=>'required|unique:products',
            'price'=>'required'
        ],
        [
            'name.required'=>'Name is required',
            'name.unique'=>'Name already exists',
            'price.required'=>'Price is required'
        ]);
    }
}
