<x-layout>
    <div class="mx-24 my-4">
        <h1 class="text-2xl mb-2">Edit Details</h1>
        <hr class="mb-5">
            @if($message == "store")
                
                <div class="space-y-2 text-md">
                <p><strong>First Name: </strong>{{$job->first_name}}</p>
                <p><strong>Last Name: </strong>{{$job->last_name}}</p>
                <p><strong>Email: </strong>{{$job->email}}</p>
                <div>
            @elseif($message == "products")
                
                <div class="space-y-2 text-md">
                <p><strong>Name: </strong>{{$product->name}}</p>
                <p><strong>Price: </strong>{{$product->price}}</p>
                <p><strong>Quantity: </strong>{{$product->quantity}}</p>
                <div>
            @else
                <h1>Nothing to see here!</h1>
            @endif

        <hr class="mt-6 mb-4">
        <div class="flex justify-between text-gray-50">
            <button form="delete-form" class="bg-red-600 rounded-lg px-4 py-1">Delete</button>
            <div class="space-x-4">
                <button class="bg-gray-400 rounded-lg px-4 py-1" onclick="cancle('{{isset($product->id) ? 'products' : 'show'}}')">Cancle</button>
                @if($message == "store")
                <button id='{{$job->id}}' class="bg-blue-600 rounded-lg px-4 py-1" onclick="update(event, 'show')">Update</button>
                @elseif($message == "products")
                <button id='{{$product->id}}' class="bg-blue-600 rounded-lg px-4 py-1" onclick="update(event, 'products')">Update</button>
                @else
                <button class="bg-blue-600 rounded-lg px-4 py-1" onclick="cancle('/')">Back</button>
                @endif
            </div>
        </div>
    </div>

    <form method="POST" id="delete-form" action="{{isset($product->id) ? url($message, [$product->id]) : url($message, [$job->id])}}">
        @csrf
        @method('DELETE')
    </form>
    
</x-layout>
