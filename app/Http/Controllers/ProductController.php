<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

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
            'image' => ['image', File::types(['png', 'jpg', 'webp'])],
        ]);
        
        $product = Product::findorfail($id);

        if($request->has('image')){
            $imagePath = $request->image->store('images');

            if($product->image != null){
                Storage::disk('public')->delete($product->image);
            }
        }else{
            $imagePath = null;
            if($product->image != null){
                Storage::disk('public')->delete($product->image);
            }
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imagePath,
        ]);
        return redirect('products');
    }

    public function delete($id){
        $product = Product::findorfail($id);
        $product->delete();
        return redirect('products');
    }

}
