import { Head, Link } from '@inertiajs/react';

export default function Welcome({ auth }) {
    return (
        <>
            <Head title="Kasi Restaurant - Traditional & Modern Cuisine" />
            <div className="bg-warmth-50 min-h-screen">
                {/* Navigation */}
                <nav className="fixed w-full bg-white/90 backdrop-blur-sm shadow-sm z-50">
                    <div className="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
                        <div className="flex items-center space-x-2">
                            <span className="text-xl md:text-2xl font-bold text-orange-600">Kasi</span>
                        </div>
                        <div className="flex space-x-2 md:space-x-4">
                            {auth.user ? (
                                <Link href={route('dashboard')} className="px-3 md:px-4 py-2 text-sm md:text-base rounded-full bg-orange-600 text-white hover:bg-orange-700">
                                    Dashboard
                                </Link>
                            ) : (
                                <>
                                    <Link href={route('login')} className="px-3 md:px-4 py-2 text-sm md:text-base text-gray-600 hover:text-orange-600">
                                        Log in
                                    </Link>
                                    <Link href={route('register')} className="px-3 md:px-4 py-2 text-sm md:text-base rounded-full bg-orange-600 text-white hover:bg-orange-700">
                                        Register
                                    </Link>
                                </>
                            )}
                        </div>
                    </div>
                </nav>

                {/* Hero Section */}
                <div className="pt-16 md:pt-20">
                    <div className="max-w-7xl mx-auto px-4 py-12 md:py-20">
                        <div className="text-center">
                            <h1 className="text-3xl md:text-5xl font-bold text-gray-800 mb-4 md:mb-6">Experience Traditional Flavors</h1>
                            <p className="text-lg md:text-xl text-gray-600 mb-6 md:mb-8 px-4">Where every dish tells a story of heritage and innovation</p>
                            <button className="w-full md:w-auto px-6 md:px-8 py-3 bg-orange-600 text-white rounded-full text-base md:text-lg hover:bg-orange-700">
                                View Our Menu
                            </button>
                        </div>
                    </div>
                </div>

                {/* Featured Dishes */}
                <div className="bg-white py-10 md:py-16">
                    <div className="max-w-7xl mx-auto px-4">
                        <h2 className="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">Featured Dishes</h2>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-4">
                            {[
                                { name: 'Signature Dish 1', price: 'R24.99', description: 'Traditional recipe with a modern twist', image: '/images/traditional-food.jpg' },
                                { name: 'Chef Special', price: 'R29.99', description: 'Seasonal ingredients, crafted with passion', image: '/images/grilled-platter.jpg' },
                                { name: 'Local Favorite', price: 'R19.99', description: 'Community\'s most loved dish', image: '/images/Spatlo01.jpg' },
                            ].map((dish) => (
                                <div key={dish.name} className="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                                    {dish.image ? (
                                        <img src={dish.image} alt={dish.name} className="w-full h-auto max-h-60 md:max-h-72 object-contain"/>
                                    ) : (
                                        <div className="h-40 md:h-48 bg-gray-200"></div>
                                    )}
                                    <div className="p-4 md:p-6">
                                        <h3 className="text-lg md:text-xl font-semibold mb-2">{dish.name}</h3>
                                        <p className="text-sm md:text-base text-gray-600 mb-3 md:mb-4">{dish.description}</p>
                                        <span className="text-orange-600 font-bold text-base md:text-lg">{dish.price}</span>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>

                {/* Call to Action */}
                <div className="bg-orange-50 py-10 md:py-16">
                    <div className="max-w-7xl mx-auto px-4 text-center">
                        <h2 className="text-2xl md:text-3xl font-bold mb-3 md:mb-4">Ready to Experience Kasi?</h2>
                        <p className="text-base md:text-xl text-gray-600 mb-6 md:mb-8">Book your table now and embark on a culinary journey</p>
                        <button className="w-full md:w-auto px-6 md:px-8 py-3 bg-orange-600 text-white rounded-full text-base md:text-lg hover:bg-orange-700">
                            Make a Reservation
                        </button>
                    </div>
                </div>
            </div>
        </>
    );
}
