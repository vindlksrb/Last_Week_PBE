<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Http\Request $request, \App\Models\Ticket $ticket)
    {
        $request->validate(['message' => 'required|string']);

        $ticket->comments()->create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'message' => $request->message,
        ]);

        return back()->with('success', 'Comment posted.');
    }
}
