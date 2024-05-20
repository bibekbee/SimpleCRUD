<x-layout>
<div class="container mx-auto mt-20 space-y-5">
    <div>
        <h1 class="font-bold">Profile Page</h1>
        <div>
            <img src="" alt="profile Image"/>
            <h1>Name: {{ $user->name }}</h1>
            <h2>Pass: {{ $user->email }}</h2>
            <button>Edit Profile</button>
        </div>
    </div>
    <div>
        <div class="mx-auto container">
            <h1 class="font-bold">Change Password</h1>

            <form method="post" action="#">

                <x-form.field label_for="password" label_slot="Password:" input_id="password" input_name="password" input_type="password" input_val="" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>
                <br>
                <x-form.field label_for="password_confirmation" label_slot="Confirmation Password:" input_id="password_confirmation" input_name="password_confirmation" input_type="password_confirmation" input_val="" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>

            </form>
        </div>
    </div>

    <div>
        <div>
            <h1>Some additional Information<h1>
            <p>You will get a confirmation email to change your password</p>
        </div>
    </div>

    <div>
    <button form="delete" class="text-white bg-red-500 px-4 py-1 rounded-lg">Delete</button> 
    <form id="delete" class="hidden" method="post" action="#">
    </form>
    </div>

</div>


</x-layout>