<x-layout>

@foreach($products as $product)
<div class="m-6 p-6 border-2 border-gray-800 rounded-md">
    <h1><b>Product Name:</b> {{$product->name}}</h1>
    <h1><b>Product Price:</b> {{$product->price}}</h1>
    <h1><b>Product Quantity:</b> {{$product->quantity}}</h1>
</div>
@endforeach

</x-layout>