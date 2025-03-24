<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $message = new Message([
            'message' => $validated['message'],
            'sender_id' => Auth::id(),
            'receiver_id' => $order->restaurant->user_id,
            'order_id' => $order->id
        ]);

        $message->save();
        return redirect()->back()->with('success', 'Message sent successfully');
    }

    public function markAsRead(Message $message)
    {
        $this->authorize('update', $message);
        $message->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

    public function getOrderMessages(Order $order)
    {
        $messages = $order->messages()->with(['sender', 'receiver'])->get();
        return view('messages.order', compact('order', 'messages'));
    }
}
