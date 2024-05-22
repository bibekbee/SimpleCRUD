<x-layout>
<div class="container mx-auto mt-16 space-y-5 w-1/2">

    <div class="flex justify-between items-center ">
        <div>
            <h1 class="font-bold">Profile Page</h1>
            <br>
            <img src="" alt="profile Image"/>
            <h1 id="userName">Name: {{ $user->name }}</h1>
            <h2>Email: {{ $user->email }}</h2>
        </div>
        <div id="form"></div>
        <div>
            <button onclick="generateForm('text','name','Name')" class="text-sm bg-indigo-500 rounded-lg text-white px-4 py-2 mt-2 font-semibold">Edit Profile</button>
        </div>
    </div>
    <div>
        <hr>
    </div>

    <div class="space-y-4">
            <h1 class="font-bold">Change Password</h1>
            <div>
            <form method="post" action="{{url('setting')}}">
                @csrf
                @method('PATCH')
                <x-form.field label_for="oldpassword" label_slot="Old Password:" input_id="oldpassword" input_name="oldpassword" input_type="password" input_val="" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('oldpassword')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>
                <br/>
                <x-form.field label_for="newpassword" label_slot="New Password:" input_id="newpassword" input_name="newpassword" input_type="password" input_val="" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('newpassword')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>
                <br>

                <x-form.field label_for="password_confirmation" label_slot="Confirm Password:" input_id="password_confirmation" input_name="newpassword_confirmation" input_type="password" input_val="" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('newpassword_confirmation')
                        {{ $message }}
                    @enderror
                </span>
                </x-form.field>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </form>
            </div>

        <div>
            <div class="text-sm">
                <h1>Some additional Information<h1>
                <p>You will get a confirmation email to change your password</p>
            </div>
        </div>

        <div>
            <button form="delete" onclick="confirmation('Are you sure you want to delete your account?')" class="text-white bg-red-500 px-4 py-1 rounded-lg">Delete</button> 
            <form id="delete" class="hidden" method="post" action="">
                @csrf
            </form>
        </div>

    </div>

   

</div>


</x-layout>