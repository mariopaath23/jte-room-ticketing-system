<?php

namespace App\Http\Controllers;

use App\Models\Room;

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


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:rooms',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1'
        ]);

        return Room::create($validated);
        return response()->json($room, 201);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(['message' => 'Ruangan berhasil dihapus!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($room);
    }
}
