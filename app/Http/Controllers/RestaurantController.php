<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('reviews')->get();
        return view('restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'operating_hours' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('restaurants', 'public');
            $validated['featured_image'] = $path;
        }

        $validated['user_id'] = Auth::id();
        Restaurant::create($validated);

        return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully');
    }

    public function show(Restaurant $restaurant)
    {
        $restaurant->load(['menuItems', 'reviews.user']);
        return view('restaurants.show', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant)
    {
        $this->authorize('update', $restaurant);
        return view('restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $this->authorize('update', $restaurant);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'operating_hours' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('restaurants', 'public');
            $validated['featured_image'] = $path;
        }

        $restaurant->update($validated);
        return redirect()->route('restaurants.show', $restaurant)->with('success', 'Restaurant updated successfully');
    }
}
