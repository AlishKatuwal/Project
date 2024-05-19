<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel = Hotel::all();
        return view('admin.pages.hotel.index', compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $city = City::all();
        return view('admin.pages.hotel.create', compact('user', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'address' => 'required',
            'city_id' => 'required',
            'description' => 'required',
            'image' => 'required | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'gallery*' => 'required | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'user_id' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
        ]);
        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->type = $request->type;
        $hotel->address = $request->address;
        $hotel->city_id = $request->city_id;
        $hotel->description = $request->description;
        $hotel->user_id = $request->user_id;
        $hotel->rating = 4.5;
        $hotel->contact_email = $request->contact_email;
        $hotel->contact_phone = $request->contact_phone;
        // image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = time() . $file->getClientOriginalName();
            $file->move('uploads/hotel', $newName);
            $hotel->image = 'uploads/hotel/' . $newName;
        }
        // gallery
        $content = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $newName = time() . $file->getClientOriginalName();
                $file->move('uploads/destination', $newName);
                $data = [
                    'path' => 'uploads/destination/' . $newName,
                    'type' => $file->getClientMimeType()
                ];
                $content[] = $data;
            }
            $hotel->gallery = json_encode($content);
        }
        $hotel->save();
        return redirect('/admin/hotel')->with('success', 'Hotel created successfully');
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
        $hotel = Hotel::find($id);
        $user = User::all();
        $city = City::all();
        return view('admin.pages.hotel.edit', compact('hotel', 'user', 'city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'address' => 'required',
            'city_id' => 'required',
            'description' => 'required',
            'image' => 'nullable | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'gallery*' => 'nullable | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'user_id' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
        ]);
        $hotel = Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->type = $request->type;
        $hotel->address = $request->address;
        $hotel->city_id = $request->city_id;
        $hotel->description = $request->description;
        $hotel->user_id = $request->user_id;
        $hotel->rating = 4.5;
        $hotel->contact_email = $request->contact_email;
        $hotel->contact_phone = $request->contact_phone;
        // image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = time() . $file->getClientOriginalName();
            $file->move('uploads/hotel', $newName);
            $hotel->image = 'uploads/hotel/' . $newName;
        }
        // gallery
        $content = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $newName = time() . $file->getClientOriginalName();
                $file->move('uploads/destination', $newName);
                $data = [
                    'path' => 'uploads/destination/' . $newName,
                    'type' => $file->getClientMimeType()
                ];
                $content[] = $data;
            }
        }
        $hotel->gallery = json_encode($content);
        $hotel->update();
        return redirect('/admin/hotel')->with('success', 'Hotel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::find($id);
        if ($hotel->image) {
            if (file_exists($hotel->image)) {
                unlink($hotel->image);
            }
        }
        // gallery
        if ($hotel->gallery) {
            $gallery = json_decode($hotel->gallery);
            foreach ($gallery as $image) {
                if (file_exists($image->path)) {
                    unlink($image->path);
                }
            }
        }
        $hotel->delete();
        return redirect('/admin/hotel')->with('success', 'Hotel deleted successfully');
    }
}
