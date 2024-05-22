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
           
        <x-passchange :hidden="false" link="setting"/>

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