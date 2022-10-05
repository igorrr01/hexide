<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 5;
        $orders = Order::orderByDesc('id')->with('product', 'user')->paginate($perPage);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Request $request)
    {
        Order::destroy($request->id);
        return redirect()->back()->with('success', 'Order is successfully delete');   
    }
}
