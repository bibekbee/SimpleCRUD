<div class="bg-slate-600 py-4">
<div class="px-5 lg:px-0 lg:mx-[auto] container flex items-center justify-between">
    <h1 class="text-xl text-gray-100 font-bold cursor-pointer">WorkFlow</h1>
    <div class="flex items-center justify-end gap-5">
        <ul class="flex gap-5 font-semibold">
            <li><x-btns.navbtn href="{{url('/')}}">Home</x-navbtn></li>
            <li><x-btns.navbtn href="{{url('products')}}">Products</x-navbtn></li>
            <li><x-btns.navbtn href="{{url('show')}}">Show</x-navbtn></li>
            <li><x-btns.navbtn href="{{url('create')}}">Add Member</x-navbtn></li>
        </ul>

        <div class="py-1 flex justify-end items-center gap-5">
              @guest
              <a href="{{url('signin')}}" class="cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium bg-gray-50 text-gray-700 hover:bg-gray-100">Log in &#8594;</a>
              @endguest
              @auth
              <div>
                        <form method="POST" action="{{url('/')}}" class="flex justify-end">
                        @csrf
                        <input type="submit" class="cursor-pointer rounded-lg px-2.5 py-2.5 text-sm font-medium bg-gray-50 text-gray-700 hover:bg-gray-100" value="Log out &#8594;">
                        </form>
              </div>
              @endauth
              
        </div>
    </div>
</div>
</div>