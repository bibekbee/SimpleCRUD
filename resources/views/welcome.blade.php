<x-layout>
        <div class="my-2">
                @guest
                        <div class="flex gap-2 justify-end mr-10">
                                <a class="bg-green-600 text-gray-50 px-4 py-1 rounded-md" href="{{url('register')}}">Register</a>
                                <a class="bg-blue-600 text-gray-50 px-4 py-1 rounded-md" href="{{url('signin')}}">LogIn</a>
                        </div>
                @endguest

                @auth
                        <form method="POST" action="{{url('/')}}" class="flex justify-end pr-10 mt-2">
                        @csrf
                        <input type="submit" class="border-2 hover:border-gray-50 hover:bg-blue-600 hover:text-gray-50 border-gray-200 text-blue-600 px-6 py-1 rounded-md" value="LogOut"/>
                        </form>
                @endauth
        </div>
        <div>
                <hr>
                <x-inputx class="text-lg font-semibold text-gray-800" children="Workflow Members"/>           
                <hr>
        </div>
        <div>
                <div class="max-w-[960px] mx-auto my-4">
                @foreach ($allJobs as $job)
               <div class="text-center my-3 p-10 rounded-lg border-2  border-gray-600">
  
                        <h1 class="text-lg font-bold text-blue-600">
                                <span class="text-black">Name:</span> {{$job->first_name}} {{$job->last_name}}
                        </h1>
        
                        <p class="text-md"><strong>Email:</strong> {{$job->email}}</p>
                        <!-- <td><button id="{{$job->id}}" class="bg-blue-400 rounded-md px-2 text-gray-50" onclick="edit(event)">Edit</button></td>  -->
                </div>
                @endforeach
                </div>
                
        </div>

        <div class="m-4 max-w-[960px] mx-auto">
                {{$allJobs->links('pagination::tailwind')}}
        </div>

        <div class="h-20">
                <hr>
        </div>
       
</x-layout>
