<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request, Restaurant $restaurant)
    {
        $validated = $request->validate([
            'delivery_address' => 'required',
            'contact_number' => 'required',
            'items' => 'required|array',
            'items.*.menu_item_id' => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1'
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'restaurant_id' => $restaurant->id,
            'delivery_address' => $validated['delivery_address'],
            'contact_number' => $validated['contact_number'],
            'status' => 'pending',
            'total_amount' => 0
        ]);

        $total = 0;
        foreach ($validated['items'] as $item) {
            $menuItem = $restaurant->menuItems()->findOrFail($item['menu_item_id']);
            $subtotal = $menuItem->price * $item['quantity'];
            $total += $subtotal;

            $order->orderItems()->create([
                'menu_item_id' => $menuItem->id,
                'quantity' => $item['quantity'],
                'unit_price' => $menuItem->price,
                'subtotal' => $subtotal
            ]);
        }

        $order->update(['total_amount' => $total]);
        return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $this->authorize('update', $order->restaurant);

        $validated = $request->validate([
            'status' => 'required|in:confirmed,preparing,ready,delivered,cancelled'
        ]);

        $order->update($validated);
        return redirect()->back()->with('success', 'Order status updated successfully');
    }

    public function index()
    {
        $orders = Auth::user()->orders()->with('restaurant')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function restaurantOrders(Restaurant $restaurant)
    {
        $this->authorize('update', $restaurant);
        $orders = $restaurant->orders()->with('user', 'orderItems.menuItem')->latest()->get();
        return view('restaurants.orders', compact('restaurant', 'orders'));
    }
}
