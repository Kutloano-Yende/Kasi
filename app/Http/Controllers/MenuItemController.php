<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $menuItems = $restaurant->menuItems;
        return view('menu-items.index', compact('restaurant', 'menuItems'));
    }

    public function store(Request $request, Restaurant $restaurant)
    {
        $this->authorize('update', $restaurant);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menu-items', 'public');
            $validated['image'] = $path;
        }

        $restaurant->menuItems()->create($validated);
        return redirect()->back()->with('success', 'Menu item added successfully');
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $this->authorize('update', $menuItem->restaurant);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menu-items', 'public');
            $validated['image'] = $path;
        }

        $menuItem->update($validated);
        return redirect()->back()->with('success', 'Menu item updated successfully');
    }
}
