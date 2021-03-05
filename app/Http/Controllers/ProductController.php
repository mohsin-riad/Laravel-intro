<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use App\Models\Product; 
class ProductController extends Controller
{
    public function all(){
        //eloquent query
        //object relational mapping -ORM
        // $products = Product::join('categories', 'products.category_id', 'categories.id')
        //                     ->select('products.name as product', 'products.price', 'categories.name as category')
        //                     ->get();  

        //query builder
        $products = DB::table('products')
                        ->join('categories', 'products.category_id', 'categories.id')
                        ->select('products.name as product', 'products.price', 'categories.name as category')
                        ->get(); 
        return view('product.pages.products', compact('products'));
    }
}
