<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Register Your Restaurant</h2>
        <p class="text-gray-600">Join our platform and reach more customers</p>
    </div>

    <form method="POST" action="{{ route('register.owner') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="role" value="restaurant_owner">

        <!-- Personal Information -->
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-900">Personal Information</h3>

            <div>
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required placeholder="e.g., +27 123 456 789" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- Restaurant Information -->
        <div class="mt-8 space-y-4">
            <h3 class="text-lg font-semibold text-gray-900">Restaurant Information</h3>

            <div>
                <x-input-label for="restaurant_name" :value="__('Restaurant Name')" />
                <x-text-input id="restaurant_name" class="block mt-1 w-full" type="text" name="restaurant_name" :value="old('restaurant_name')" required />
                <x-input-error :messages="$errors->get('restaurant_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="restaurant_type" :value="__('Restaurant Type')" />
                <select id="restaurant_type" name="restaurant_type" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                    <option value="">Select type</option>
                    <option value="fast_food">Fast Food</option>
                    <option value="casual_dining">Casual Dining</option>
                    <option value="fine_dining">Fine Dining</option>
                    <option value="cafe">Café</option>
                    <option value="buffet">Buffet</option>
                </select>
                <x-input-error :messages="$errors->get('restaurant_type')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address" :value="__('Restaurant Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required placeholder="Full street address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Restaurant Description')" />
                <textarea id="description" name="description" rows="3" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="logo" :value="__('Restaurant Logo')" />
                <input type="file" id="logo" name="logo" accept="image/*" class="block mt-1 w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100" />
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>
        </div>

        <!-- Account Security -->
        <div class="mt-8 space-y-4">
            <h3 class="text-lg font-semibold text-gray-900">Account Security</h3>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="mt-6">
            <label class="inline-flex items-center">
                <input type="checkbox" name="terms" class="rounded border-gray-300 text-orange-600 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                <span class="ml-2 text-sm text-gray-600">I agree to the <a href="#" class="text-orange-600 hover:text-orange-700">Terms and Conditions</a></span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="bg-orange-600 hover:bg-orange-700">
                {{ __('Register Restaurant') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
