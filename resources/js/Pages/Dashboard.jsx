import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard() {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-orange-600">
                    Restaurant Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        {/* Today's Summary Card */}
                        <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div className="border-b border-gray-200 bg-orange-50 p-4">
                                <h3 className="text-lg font-semibold text-orange-600">Today's Summary</h3>
                            </div>
                            <div className="p-6">
                                <div className="flex flex-col space-y-4">
                                    <div className="flex justify-between">
                                        <span className="text-gray-600">Reservations</span>
                                        <span className="font-semibold">12</span>
                                    </div>
                                    <div className="flex justify-between">
                                        <span className="text-gray-600">Orders</span>
                                        <span className="font-semibold">45</span>
                                    </div>
                                    <div className="flex justify-between">
                                        <span className="text-gray-600">Revenue</span>
                                        <span className="font-semibold text-green-600">$1,234.56</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Popular Dishes Card */}
                        <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div className="border-b border-gray-200 bg-orange-50 p-4">
                                <h3 className="text-lg font-semibold text-orange-600">Popular Dishes</h3>
                            </div>
                            <div className="p-6">
                                <div className="flex flex-col space-y-4">
                                    <div className="flex items-center justify-between">
                                        <span className="text-gray-600">Signature Dish 1</span>
                                        <span className="rounded-full bg-orange-100 px-3 py-1 text-sm text-orange-600">24 orders</span>
                                    </div>
                                    <div className="flex items-center justify-between">
                                        <span className="text-gray-600">Chef Special</span>
                                        <span className="rounded-full bg-orange-100 px-3 py-1 text-sm text-orange-600">18 orders</span>
                                    </div>
                                    <div className="flex items-center justify-between">
                                        <span className="text-gray-600">Local Favorite</span>
                                        <span className="rounded-full bg-orange-100 px-3 py-1 text-sm text-orange-600">15 orders</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Quick Actions Card */}
                        <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div className="border-b border-gray-200 bg-orange-50 p-4">
                                <h3 className="text-lg font-semibold text-orange-600">Quick Actions</h3>
                            </div>
                            <div className="p-6">
                                <div className="flex flex-col space-y-4">
                                    <button className="rounded-lg bg-orange-600 px-4 py-2 text-white hover:bg-orange-700">
                                        Manage Reservations
                                    </button>
                                    <button className="rounded-lg bg-orange-600 px-4 py-2 text-white hover:bg-orange-700">
                                        Update Menu
                                    </button>
                                    <button className="rounded-lg bg-orange-600 px-4 py-2 text-white hover:bg-orange-700">
                                        View Orders
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
