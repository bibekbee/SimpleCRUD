<x-layout>
    <div class="w-full mt-4 flex justify-center">
        <form class="flex gap-4" action="{{url('show')}}" method="GET" class="flex flex-col">
            <input type="search" name="search" value="{{$data}}" placeholder="Search" class="border-2 border-gray-600 rounded-md px-2">
            <input class="bg-blue-600 text-gray-50 px-2 rounded-lg" type="submit" value="Search"/>
        </form>
    </div>
    <div class="flex justify-center mt-2">
    
    <table class="my-4 text-xs lg:text-sm">
        <tr class="border-gray-600 border-2 p-10">
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
        </tr>
        @foreach ($allJobs as $job)
        <tr >
            <td class="border-gray-600 border-2 p-2 lg:py-2 lg:px-10">{{$job->first_name}}</td>
            <td class="border-gray-600 border-2 p-2 lg:py-2 lg:px-10">{{$job->last_name}}</td>
            <td class="border-gray-600 border-2 p-2 lg:py-2 lg:px-10">{{$job->email}}</td>
            @can('edit', $job)
            <td class="border-gray-600 border-2 lg:p-4"><button id="{{$job->id}}" class="bg-blue-400 rounded-md px-2 text-gray-50" onclick="edit(event, 'show')">Edit</button></td> 
            @endcan
        </tr>
        @endforeach
    </table>
    </div>
</x-layout>