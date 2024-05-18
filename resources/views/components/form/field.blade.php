@props(['label_for','label_slot', 'input_type', 'input_id', 'input_name', 'input_val', 'err_name'])
<div class="sm:col-span-3">
    <label for="{{$label_for}}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label_slot }}</label>
    <div class="mt-2">
        <input {{$attributes}} type="{{$input_type}}" id="{{$input_id}}" name="{{$input_name}}" value="{{$input_val}}" class="pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
    </div>
    {{ $slot }}
</div>