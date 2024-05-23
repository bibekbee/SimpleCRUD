<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Stars;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index(){
        $allProducts = Product::latest()->paginate(6);
        //return view('products', compact('allProducts'));
        return view('products', ['products' => $allProducts]);
    }

    public function deleteUpdate($id){
        $product = Product::findorfail($id);
        return view('dupage', ['product'=>$product])->with('message', 'products');
    }

    public function create(){
        return view('editProduct')->with('name', 'create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => ['image', File::types(['png', 'jpg', 'webp'])],
        ]);

        if($request->image){
             $imgPath = $request->image->store('images');
        }else{
            $imgPath = '';
        }
        $user = Auth::user();
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imgPath,
            'user_id' => $user->id,
        ]);

        return redirect('products');
    }

    public function edit(Product $product){
        $data = $product;
        return view('editProduct', ['product'=>$data, 'name' =>'update']);
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
        if($product->image != null){
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect('products');
    }

    public function rating(Request $request){
       $validate = $request->validate([
            'rating' => 'required|integer|between:0,5'
        ]);


        if($request->id !== null){
            $star = Stars::find($request->id);
            $star->update([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'rating' => $request->rating,
                'updated_at' => Carbon::now()
            ]);
        }else{
            Stars::insert([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'rating' => $request->rating,
                'created_at' => Carbon::now()
            ]);
        }

        

        // if($star->created_at == null){
        //     $star->created_at = Carbon::now();
        //     $star->save();
        // }else{
        //     $star->updated_at = Carbon::now();
        //     $star->save();
        // }
        return redirect()->back();
    }

}
