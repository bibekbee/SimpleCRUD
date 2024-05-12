<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index(){
        $allProducts = Product::all();
        //return view('products', compact('allProducts'));
        return view('products', ['products' => $allProducts]);
    }

    public function show($id){
        $product = Product::findorfail($id);
        return view('showTwo', ['product'=>$product])->with('message', 'products');
    }

    public function edit(Product $product){
        $data = $product;
        return view('editProduct', ['product'=>$data]);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        $product = Product::findorfail($id);
        $product->update($validated);
        return redirect('products');
    }

    public function delete($id){
        $product = Product::findorfail($id);
        $product->delete();
        return redirect('products');
    }

}
