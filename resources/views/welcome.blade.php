<x-layout>
        <div class="mt-8">
                @guest
                        <div class="flex gap-2 justify-end mr-10">
                                <a class="bg-green-600 text-gray-50 px-4 py-1 rounded-md" href="{{url('register')}}">Register</a>
                                <a class="bg-blue-600 text-gray-50 px-4 py-1 rounded-md" href="{{url('signin')}}">LogIn</a>
                        </div>
                @endguest

                @auth
                        <form method="POST" action="{{url('/')}}" class="flex justify-end pr-10 mt-2">
                        @csrf
                        <input type="submit" class="bg-blue-600 text-gray-50 px-4 py-1 rounded-md" value="LogOut"/>
                        </form>
                @endauth
        </div>

        <h1 class="text-3xl font-bold underline text-center mb-5"><a href="#">The LaravelPage</a></h1>
        <x-input background="text-3xl bg-blue-400 cursor-pointer" children="Laravel Members"/>           
         
        <div >
                <div class="block">
                @foreach ($allJobs as $job)
               <div class="text-center m-4 p-4 rounded-lg border-2 border-gray-600">
                <h1 class="text-lg font-bold text-blue-600">{{$job->first_name}}</h1>
                <h2 class="text-md">{{$job->last_name}}</h2>
                <p class="text-md">{{$job->email}}</p>
                <!-- <td><button id="{{$job->id}}" class="bg-blue-400 rounded-md px-2 text-gray-50" onclick="edit(event)">Edit</button></td>  -->
                </div>
                @endforeach
                </div>
                
        </div>
        <div class="mx-4">
                {{$allJobs->links('pagination::tailwind')}}
        </div>
</x-layout>
