<x-layout>
    <div class="mx-24 my-4">
        <h1 class="text-2xl mb-2">Edit Details</h1>
        <hr class="mb-5">
            <div class="space-y-2 text-md">
            <p><strong>First Name: </strong>{{$job->first_name}}</p>
            <p><strong>Last Name: </strong>{{$job->last_name}}</p>
            <p><strong>Email: </strong>{{$job->email}}</p>
            <div>
                
        <hr class="mt-6 mb-4">
        <div class="flex justify-between text-gray-50">
            <button form="delete-form" class="bg-red-600 rounded-lg px-4 py-1">Delete</button>
            <div class="space-x-4">
                <button class="bg-gray-400 rounded-lg px-4 py-1" onclick="cancle()">Cancle</button>
                <button id='{{$job->id}}' class="bg-blue-600 rounded-lg px-4 py-1" onclick="update(event)">Update</button>
            </div>
        </div>
    </div>

    <form method="POST" id="delete-form" action="{{url('store', [$job->id])}}">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
