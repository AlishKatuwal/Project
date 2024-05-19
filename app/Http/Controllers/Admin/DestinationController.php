<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destination = Destination::all();
        return view('admin.pages.destination.index', compact('destination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.pages.destination.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'images*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm |max:100000',
            'city_id' => 'required',
            'address' => 'required',
            'location' => 'required',
        ]);
        $destination = new Destination();
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->city_id = $request->city_id;
        $destination->address = $request->address;
        $destination->location = $request->location;
        // images 
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $newName = time() . $file->getClientOriginalName();
                $file->move('uploads/destination', $newName);
                $data = [
                    'path' => 'uploads/destination/' . $newName,
                    'type' => $file->getClientMimeType()
                ];
                $images[] = $data;
            }
        }
        $destination->images = json_encode($images);
        // video
        if ($request->hasFile('video')) {
            $newName = time() . $request->file('video')->getClientOriginalName();
            $request->file('video')->move('uploads/destination', $newName);
            $destination->video = 'uploads/destination/' . $newName;
        }
        $destination->save();
        return redirect('/admin/destination')->with('success', 'Destination created successfully');
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
        $destination = Destination::find($id);
        $cities = City::all();
        return view('admin.pages.destination.edit', compact('destination', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'images*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm |max:10000',
            'city_id' => 'required',
            'address' => 'required',
            'location' => 'required',
        ]);
        $destination = Destination::find($id);
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->city_id = $request->city_id;
        $destination->address = $request->address;
        $destination->location = $request->location;
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $newName = time() . $file->getClientOriginalName();
                $file->move('uploads/destination', $newName);
                $data = [
                    'images' => 'uploads/destination/' . $newName,
                    'type' => $file->getClientMimeType()
                ];
                $content[] = $data;
            }
            $destination->images = json_encode($images);
        }
        // video
        if ($request->hasFile('video')) {
            $newName = time() . $request->file('video')->getClientOriginalName();
            $request->file('video')->move('uploads/destination', $newName);
            $destination->video = 'uploads/destination/' . $newName;
        }
        $destination->update();
        return redirect('/admin/destination')->with('success', 'Destination updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destination = Destination::find($id);
        if ($destination->images) {
            foreach (json_decode($destination->images) as $image) {
                $filePath = public_path($image->path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }
        if ($destination->video) {
            $filePath = public_path($destination->video);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $destination->delete();
        return redirect('/admin/destination')->with('success', 'Destination deleted successfully');
    }
}
