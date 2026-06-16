<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function showChat($roomId) 
    {
        $room = Room::findOrFail($roomId);
        
        $messages = Message::where('room_id', $roomId)
                           ->with('user')
                           ->orderBy('created_at', 'asc')
                           ->get();

        return view('chat', compact('messages', 'room'));
    }

    public function sendMessage(Request $request, $roomId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        $message = new Message();
        $message->user_id = Auth::id();
        $message->room_id = $roomId;
        $message->content = $request->content;
        $message->save();

        return redirect()->back()->with('success', 'Message sent!');
        
    }
}