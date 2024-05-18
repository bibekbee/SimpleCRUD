<x-layout>
    <div class="mx-5 lg:mx-52 mt-20">
        <form method="post" action="{{ $name == 'update' ? url('store', [$editJob->id]) : url('create') }}">
        @csrf
        @if($name == 'update')
            @method('PATCH')
        @endif
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <x-form.field label_for="first-name" label_slot="First Name:" input_id="first-name" input_name="first_name" input_type="text" input_val="{{$editJob->first_name ?? ''}}" required>
                    <span class="text-red-500 italic text-sm mt-1">
                        @error('first_name')
                            {{$message}}
                        @enderror
                    </span>
                </x-form.field>
                <x-form.field label_for="last-name" label_slot="Last Name:" input_id="last-name" input_name="last_name" input_type="text" input_val="{{$editJob->last_name ?? ''}}" required>
                    <span class="text-red-500 italic text-sm mt-1">
                        @error('last_name')
                            {{$message}}
                        @enderror
                    </span>
                </x-form.field>
                <x-form.field label_for="email" label_slot="Email Address:" input_id="email" input_name="email" input_type="email" input_val="{{$editJob->email ?? ''}}" required>
                    <span class="text-red-500 italic text-sm mt-1">
                        @error('email')
                            {{$message}}
                        @enderror
                    </span>
                </x-form.field>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="cancle('show')">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>

        </form>
    </div>
    
</x-layout>