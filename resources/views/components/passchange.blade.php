@props(['hidden', 'link'])
<div>
            <form method="post" action="{{url($link)}}">
                @csrf
                @method('PATCH')
                @if(!$hidden)
                <x-form.field label_for="oldpassword" label_slot="Old Password:" input_id="oldpassword" input_name="oldpassword" input_type="password" input_val="" required>
                <span class="text-red-500 italic text-sm mt-1">
                    @error('oldpassword')
                        {{$message}}
                    @enderror
                </span>
                </x-form.field>
                </div>
                @endif
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