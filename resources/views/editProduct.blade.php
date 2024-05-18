<x-layout>
    <div class="mx-5 lg:mx-52 mt-20">
            
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Product Information</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Please fill out all the field for change.</p>
            </div>  

            <form action="{{$name == 'create' ? url('products/create') : url('products', [$product->id ?? ''])}}" method="post" enctype="multipart/form-data">
                @csrf
                @if($name == 'update')
                @method('PATCH')
                @endif
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <x-form.field label_for="first-name" label_slot="Product Name:" input_id="first-name" input_name="name" input_type="text" input_val="{{$product->name ?? ''}}" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>
                <br>
                <x-form.field label_for="price" label_slot="Product Price:" input_id="price" input_name="price" input_type="number" input_val="{{$product->price ?? ''}}" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('price')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>

                <x-form.field label_for="quantity" label_slot="Product Quantity:" input_id="quantity" input_name="quantity" input_type="number" input_val="{{$product->quantity ?? ''}}" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('quantity')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>
                
                <x-form.field label_for="image" label_slot="Product Image:" input_id="image" input_name="image" input_type="file" input_val="" accept="image/*">
                    <span></span>
                </x-form.field>
                
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="cancle('products')">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{$name == 'update' ? 'Update' : 'Add New'}}</button>
                </div>
                </div>
            </form>
            
    </div>
    
</x-layout>