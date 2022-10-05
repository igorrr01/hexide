<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 5;
        $products = Product::orderByDesc('id')->paginate($perPage);
        
        return view('admin.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::select('id', 'name', 'description', 'price')->findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:500',
                'description' => 'required|max:10000',
                'price' => 'required|integer'
            ]
        );

        $data = $request->all();
        $product = Product::findOrFail($request->id);
        $product->update($data);
        
        return redirect()->back()->with('success', 'Product is successfully update');   

    }

    public function destroy(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->back()->with('success', 'Product is successfully delete');   
    }
}
