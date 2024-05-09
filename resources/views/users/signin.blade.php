<x-layout>
   
    <div class="mx-5 lg:mx-52 mt-20">
        <form method="post" action="{{url('signin')}}">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Login User</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">If you have not registered follow this link <a class="text-blue-600 underline" href="{{url('register')}}">register</a></p> 

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Name:</label>
                <div class="mt-2">
                    <input type="text" name="email" id="email"  class="pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{old('email')}}" required>
                </div>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
                </div>

                <div class="sm:col-span-4">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password:</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password" class="pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="cancle()">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">SignIn</button>
                </div>

        </form>
    </div>
    
</x-layout>