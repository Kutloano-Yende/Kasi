<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Restaurants') }}
            </h2>
            @auth
                <a href="{{ route('restaurants.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Restaurant
                </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($restaurants as $restaurant)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @if($restaurant->featured_image)
                            <img src="{{ Storage::url($restaurant->featured_image) }}" alt="{{ $restaurant->name }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <h3 class="text-xl font-semibold">{{ $restaurant->name }}</h3>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                                    <span class="ml-1">{{ number_format($restaurant->reviews->avg('rating'), 1) }}</span>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-600">{{ Str::limit($restaurant->description, 100) }}</p>
                            <div class="mt-4">
                                <a href="{{ route('restaurants.show', $restaurant) }}" class="text-blue-600 hover:text-blue-800">View Menu →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
