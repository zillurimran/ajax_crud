<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        return view('products',[
            'products'=> Product::latest()->paginate(5)
        ]);
    }

    public function saveProduct(Request $request){

        Product::saveProduct($request);
        return response()->json([
            'status'=>'success'
        ]);
    }

    public function updateProduct(Request $request){

        Product::updateProduct($request);
        return response()->json([
            'status'=>'success'

        ]);
    }

    public function deleteProduct(Request $request){
        Product::find($request->product_id)->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
