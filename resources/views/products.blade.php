<x-layout>
<div class="mt-10 w-3/4 mx-auto grid grid-cols-3">
@foreach($products as $product)
<div class="m-6 p-6 border-2 border-gray-200 rounded-md">
<div class="text-gray-600">
    <h1><b>Product Name:</b> {{$product->name}}</h1>
    <h1><b>Product Price:</b> {{$product->price}}</h1>
    <h1><b>Product Quantity:</b> {{$product->quantity}}</h1>
</div>
@auth
<div>
    <button id="{{$product->id}}" class="bg-gray-600 rounded-md px-2 text-gray-50 float-end" onclick="edit(event, 'products')">Edit</button>
</div>
@endauth
</div>
@endforeach
</div>
</x-layout>