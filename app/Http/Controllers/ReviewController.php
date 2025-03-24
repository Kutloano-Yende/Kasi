<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $validated['user_id'] = Auth::id();
        $validated['restaurant_id'] = $order->restaurant_id;
        $validated['order_id'] = $order->id;

        Review::create($validated);
        return redirect()->back()->with('success', 'Review submitted successfully');
    }
}
