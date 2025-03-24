<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $restaurant->name }}
            </h2>
            @can('update', $restaurant)
                <a href="{{ route('restaurants.edit', $restaurant) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit Restaurant
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Menu Items</h3>
                            @foreach($restaurant->menuItems as $item)
                                <div class="border-b py-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-medium">{{ $item->name }}</h4>
                                            <p class="text-gray-600">{{ $item->description }}</p>
                                        </div>
                                        <div class="text-right">
                                            <span class="font-bold">R{{ number_format($item->price, 2) }}</span>
                                            @auth
                                                <button onclick="addToCart({{ $item->id }})" class="block mt-2 text-sm bg-green-500 text-white px-3 py-1 rounded">
                                                    Add to Cart
                                                </button>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-4">Restaurant Details</h3>
                            <div class="space-y-4">
                                <p><strong>Address:</strong> {{ $restaurant->address }}</p>
                                <p><strong>Phone:</strong> {{ $restaurant->phone_number }}</p>
                                <p><strong>Hours:</strong> {{ $restaurant->operating_hours }}</p>

                                <div class="mt-6">
                                    <h4 class="font-medium mb-2">Reviews</h4>
                                    @foreach($restaurant->reviews as $review)
                                        <div class="border-b py-3">
                                            <div class="flex items-center">
                                                <div class="flex text-yellow-400">
                                                    @for($i = 0; $i < $review->rating; $i++)
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                        </svg>
                                                    @endfor
                                                </div>
                                                <span class="ml-2 text-sm text-gray-600">{{ $review->user->name }}</span>
                                            </div>
                                            <p class="mt-1 text-gray-600">{{ $review->comment }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function addToCart(menuItemId) {
            // Add your cart functionality here
            alert('Item added to cart!');
        }
    </script>
    @endpush
</x-app-layout>
