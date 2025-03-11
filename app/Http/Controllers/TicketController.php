<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function schedule()
    {
        return response()->json(Ticket::where('status', 'approved')->with('room', 'user')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time'
        ]);

        return Ticket::create([
            'user_id' => auth()->id(),
            'room_id' => $validated['room_id'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'status' => 'pending'
        ]);
    }

    public function approve(Ticket $ticket)
    {
        $this->authorize('approve', $ticket);
        $ticket->update([
            'status' => 'approved',
            'approved_by' => auth()->id()
        ]);
        return response()->json(['message' => 'Permintaan disetujui!']);
    }

}
