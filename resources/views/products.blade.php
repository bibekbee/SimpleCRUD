<x-layout>
<div class="mt-10 w-3/4 mx-auto grid grid-cols-3">
@foreach($products as $product)
<div class="m-6 p-6 border-2 border-gray-800/50 rounded-md">

    <div class="w-full h-full flex flex-col text-gray-600">
     
        <div class="mb-4">
            <img class="cursor-pointer" src="{{'storage/' . $product->image}}" alt="{{$product->name}}"/>
        </div>

        <div class="mt-auto">
            <h1><b>Product Name:</b> {{$product->name}}</h1>
            <h1><b>Product Price:</b> {{$product->price}}</h1>
            <h1><b>Product Quantity:</b> {{$product->quantity}}</h1>
            @auth
            <div>
                <button id="{{$product->id}}" class="bg-gray-600 rounded-md px-2 text-gray-50 float-end" onclick="edit(event, 'products')">Edit</button>
            </div>
            @endauth
        </div>
    
    </div>

</div>
@endforeach
</div>
</x-layout>