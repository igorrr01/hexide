<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index ()
    {
        $perPage = 5;

        $orders = Order::orderByDesc('id')->with('product')->where('user_id', Auth::user()->id)->paginate($perPage);

        if(!$orders){
            return response()->json([
                "status code" => 404,
                "message" => "Orders not found!"
            ])->setStatusCode(404);
        }

        return response()->json([
            "status" => true,
            "orders" => $orders
        ])->setStatusCode(200);
    }

    public function show (Request $request)
    {
        $order = Order::where('user_id', Auth::user()->id)->with('product')->find($request->id);

        if(!$order){
            return response()->json([
                "status code" => 404,
                "message" => "Order not found!"
            ])->setStatusCode(404);
        }

        return response()->json([
            "status" => true,
            "order" => $order
        ])->setStatusCode(200);
    }
}
