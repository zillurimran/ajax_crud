<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\HttpFoundation\Session\Storage\save;

class Product extends Model
{
    use HasFactory;
    private static $product;

    public static function saveProduct($request){

        $request->validate([
            'name'=>'required|unique:products',
            'price'=>'required'
        ],
            [
                'name.required'=>'Name is required',
                'name.unique'=>'Name already exists',
                'price.required'=>'Price is required'
            ]);

        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->save();
    }

    public static function updateProduct($request){

        $request->validate([
            'up_name'=> 'required|unique:products,name,'.$request->up_id,
            'up_price'=>'required'
        ],
            [
                'up_name.required'=>'Name is required',
                'up_name.unique'=>'Product already exists',
                'up_price.required'=>'Price is required'
            ]);
        Product::where('id',$request->up_id)->update([
            'name'=>$request->up_name,
            'price'=>$request->up_price,
        ]);
    }

}
