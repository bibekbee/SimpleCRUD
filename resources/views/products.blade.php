<x-layout>
<div class="w-2/4 mx-auto">
@foreach($products as $product)
<div class="flex justify-between items-center m-6 p-6 border-2 border-gray-800 rounded-md">
<div >
    <h1><b>Product Name:</b> {{$product->name}}</h1>
    <h1><b>Product Price:</b> {{$product->price}}</h1>
    <h1><b>Product Quantity:</b> {{$product->quantity}}</h1>
</div>
<div>
    <button id="{{$product->id}}" class="bg-blue-400 rounded-md px-2 text-gray-50" onclick="edit(event, 'products')">Edit</button>
</div>
</div>
@endforeach
</div>
</x-layout>