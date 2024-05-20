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
                <x-form.field label_for="email" label_slot="Email:" input_id="email" input_name="email" input_type="email" input_val="{{old('email') ?? ''}}" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>
                <br>
                <x-form.field label_for="password" label_slot="Password:" input_id="password" input_name="password" input_type="password" input_val="" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="cancle()">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">SignIn</button>
                </div>
        </form>
    </div>

    <div class="text-sm text-red-500 mt-2 w-1/2 text-end -ml-4 underline">
        <a href="#">forgot password</a>
    </div>
</x-layout>