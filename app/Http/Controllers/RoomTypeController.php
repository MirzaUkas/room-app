<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomTypes = RoomType::orderBy('id','desc')->paginate(5);
        return view('admin.home', compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_type' => 'required'
        ]);
        $input = $request->all();
        RoomType::create($input);

        return redirect()->route('admin.home')->with('success','Room Type Has Been inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomType $roomType)
    {
        return view('room_types.show',compact('rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $roomType)
    {
        return view('room_types.edit',compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'room_type' => 'required'
        ]);
        $input = $request->all();
        $roomType->update($input);

        return redirect()->route('admin.home')->with('success','Room Type Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomType $roomType)
    {
        $roomType->delete();
        return redirect()->route('admin.home')->with('success','Room Type Has Been deleted successfully');
    }
}
