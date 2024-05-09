<x-layout>
    <div class="mx-5 lg:mx-52 mt-20">
        <form method="post" action="{{url('store/')}}">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                <div class="mt-2">
                    <input type="text" name="first_name" id="first-name" class="pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('first_name')
                        {{$message}}
                    @enderror
                </span>
                </div>

                <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                <div class="mt-2">
                    <input type="text" name="last_name" id="last-name" class="pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('last_name')
                        {{$message}}
                    @enderror
                </span>
                </div>

                <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" class="pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="cancle()">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>

        </form>
    </div>

    <!-- @if ($errors->any())
    <div class="text-red-500 mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
    
</x-layout>