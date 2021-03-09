<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function products(){
        $products = DB::table('products as p')
                        ->join('categories as c', 'p.category_id', 'c.id')
                        ->select('p.id','p.name as product', 'p.price', 'c.name as category')
                        ->orderBy('p.id', 'asc')
                        ->get(); 
        // dd($products);
        if($products){ 
            $error = false;
            $msg = "Data Retrived";
        }
        else{
            $error = true;
            $msg = "No Data Found";
        }
        return response()->json([
            'data'=> $products,
            'error'=> $error,
            'msg'=> $msg
        ]);
    }
    public function insert(Request $request){ //tested by POSTMAN CHROME ext.
        $obj = new Product();
        $obj->name = $request->productname;
        $obj->details = $request->productdetails;
        $obj->price = $request->productprice;
        $obj->status = $request->productstatus;
        $obj->category_id = $request->category_id;
        if($obj->save()) {
            return response()->json([
                'data'=> $obj,
                'error'=> false,
                'msg'=> "Data Inserted"
            ]);
        }
    }

    public function getProductById($id){
        $product = DB::table('products')
                        ->where('id', '=', $id )
                        ->first();
        return response()->json([
            'data' => $product,
            'error' => false,
            'msg' => 'Data Retrieved'
        ]);
    }
}
