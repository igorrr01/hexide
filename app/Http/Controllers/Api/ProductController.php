<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index ()
    {
        $perPage = 5;
        $products = Product::orderByDesc('id')->paginate($perPage);

        if(!$products){
            return response()->json([
                "status code" => 404,
                "message" => "Products not found!"
            ])->setStatusCode(404);
        }

        return response()->json([
            "status" => true,
            "products" => $products
        ])->setStatusCode(200);
    }

    public function show (Request $request)
    {
        $product = Product::find($request->id);

        if(!$product){
            return response()->json([
                "status code" => 404,
                "message" => "Product not found!"
            ])->setStatusCode(404);
        }

        return response()->json([
            "status" => true,
            "product" => $product
        ])->setStatusCode(200);
    }

    public function order (Request $request)
    {
        $product = Product::find($request->id);

        if(!$product){
            return response()->json([
                "status code" => 404,
                "message" => "Product not found!"
            ])->setStatusCode(404);
        }

        Order::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id
        ]);    

        return response()->json([
            "status" => true,
            "product" => 'Product is order'
        ])->setStatusCode(200);
    }
}
