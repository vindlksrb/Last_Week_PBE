<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = \Illuminate\Support\Facades\Auth::user()->is_admin
            ? \App\Models\Ticket::with('user', 'category')->latest()->get()
            : \Illuminate\Support\Facades\Auth::user()->tickets()->with('category')->latest()->get();

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('tickets.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|max:2048', // 2MB Max
        ]);

        $imagePath = $request->file('image')->store('tickets', 'public');

        \App\Models\Ticket::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'image_path' => $imagePath,
            'status' => 'pending',
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Ticket $ticket)
    {
        // Authorize: Admin or Owner
        if (!\Illuminate\Support\Facades\Auth::user()->is_admin && \Illuminate\Support\Facades\Auth::user()->id !== $ticket->user_id) {
            abort(403);
        }

        $ticket->load(['comments.user', 'category', 'user']);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\Illuminate\Http\Request $request, \App\Models\Ticket $ticket)
    {
        // Only Admin can update status
        if (!\Illuminate\Support\Facades\Auth::user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,in_progress,resolved',
        ]);

        $ticket->update(['status' => $request->status]);

        return back()->with('success', 'Status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
