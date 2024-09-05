<x-guest-layout>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('نام')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            {{-- @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror --}}
        </div>

        <div>
            <x-input-label for="last_name" :value="__('نام خانوداگی')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('last_name')"
                required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            {{-- @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror --}}
        </div>

        <!-- province -->
        <div class="mt-4">

            <x-input-label for="province" :value="__('استان')" />
            <select style="padding-right: 35px" id="province" class="block mt-1 w-full" type="text" name="province"
                :value="old('province')" required autofocus autocomplete="province">
                <option class="form-control" value="">انتخاب استان</option>
                @foreach ($provinces as $info)
                    <option value="{{ $info['id'] }}">{{ $info['name'] }}</option>
                @endforeach
            </select>
            {{-- <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')"
                required autofocus autocomplete="state" /> --}}
            <x-input-error :messages="$errors->get('state')" class="mt-2" />
            {{-- @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror --}}
        </div>

        <!-- city -->
        <div class="mt-4">

            <x-input-label for="city" :value="__('شهر')" />
            <select style="padding-right: 35px" id="city" class="block mt-1 w-full" type="text" name="city"
                :value="old('city')" required autofocus autocomplete="city">
                <option class="form-control" value="">انتخاب شهر</option>
            </select>
            {{-- <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                required autofocus autocomplete="city" /> --}}
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
            {{-- @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror --}}
        </div>

        <!-- position -->
        <div class="mt-4">
            <x-input-label for="position" :value="__('پست سازمانی')" />
            <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')"
                required autofocus autocomplete="position" />
            <x-input-error :messages="$errors->get('position')" class="mt-2" />
            {{-- @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror --}}
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('ایمیل')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            {{-- @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror --}}
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('کلمه عبور')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            {{-- @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror --}}
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('تکرار رمز عبور')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('آیا از قبل اکانت دارید؟') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('ثبت نام') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="province"]').on('change', function() {
            var provinceID = $(this).val();
            console.log(provinceID);
            if (provinceID) {
                $.ajax({
                    url: '/get_city/' + encodeURI(provinceID),
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="' +
                                value.code + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city"]').empty();
            }
        });
    });
</script>
