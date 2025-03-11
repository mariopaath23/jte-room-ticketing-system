<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Room::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:rooms',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1'
        ]);

        return Room::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($room);
    }
}
