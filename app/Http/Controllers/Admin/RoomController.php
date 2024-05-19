<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = Room::all();
        return view('admin.pages.room.index', compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotel = Hotel::all();
        return view('admin.pages.room.create', compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'price' => 'required',
            'hotel_id' => 'required',
            'image' => 'required | mimes:jpg,png,jpeg,gif,svg | max:2048',
        ]);
        $room = new Room();
        $room->type = $request->type;
        $room->capacity = $request->capacity;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->hotel_id = $request->hotel_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = time() . $file->getClientOriginalName();
            $file->move('uploads/room', $newName);
            $room->image = 'uploads/room/' . $newName;
        }
        $room->save();
        return redirect('/admin/room')->with('success', 'Room created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::find($id);
        $hotel = Hotel::all();
        return view('admin.pages.room.edit', compact('room', 'hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'price' => 'required',
            'hotel_id' => 'required',
        ]);
        $room = Room::find($id);
        $room->type = $request->type;
        $room->capacity = $request->capacity;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->hotel_id = $request->hotel_id;
        if ($request->hasFile('image')) {
            //delete previous image
            if ($room->image) {
                if (file_exists($room->image)) {
                    unlink($room->image);
                }
            }
            $file = $request->file('image');
            $newName = time() . $file->getClientOriginalName();
            $file->move('uploads/room', $newName);
            $room->image = 'uploads/room/' . $newName;
        }
        $room->update();
        return redirect('/admin/room')->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        if ($room->image) {
            if (file_exists($room->image)) {
                unlink($room->image);
            }
        }
        $room->delete();
        return redirect('/admin/room')->with('success', 'Room deleted successfully');
    }
}
