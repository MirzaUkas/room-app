<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderBy('id', 'desc')->paginate(5);
        return view('admin.home', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomTypes = RoomType::all();
        return view('rooms.create', ['roomTypes' => $roomTypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required',
            'room_type_id' => 'required|not_in:0',
            'area' => 'required',
            'price' => 'required',
            'facility' => 'required',
        ]);
        $input = $request->all();
        Room::create($input);

        return redirect()->route('admin.home')->with('success', 'Room Has Been inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $roomTypes = RoomType::all();
        return view('rooms.edit', ['roomTypes' => $roomTypes, 'room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_name' => 'required',
            'room_type_id' => 'required',
            'area' => 'required',
            'price' => 'required',
            'facility' => 'required',
        ]);
        $input = $request->all();
        $room->update($input);

        return redirect()->route('admin.home')->with('success', 'Room Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.home')->with('success', 'Room Has Been deleted successfully');
    }
}