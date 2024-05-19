<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $package = Package::all();
        return view('admin.pages.packages.index', compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotel = Hotel::all();
        return view('admin.pages.packages.create',compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hotel_id' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
            'image' => 'required | mimes:jpg,png,jpeg,gif,svg | max:2048',
        ]);
        $package = new Package();
        $package->name = $request->name;
        $package->hotel_id = $request->hotel_id;
        $package->description = $request->description;
        $package->start_date = $request->start_date;
        $package->end_date = $request->end_date;
        $package->price = $request->price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = time() . $file->getClientOriginalName();
            $file->move('uploads/package', $newName);
            $package->image = 'uploads/package/' . $newName;
        }
        $package->save();
        return redirect('/admin/package')->with('success', 'Package created successfully');
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
        $package = Package::find($id);
        $hotel = Hotel::all();
        return view('admin.pages.packages.edit', compact('package', 'hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'hotel_id' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
        ]);
        $package = Package::find($id);
        $package->name = $request->name;
        $package->hotel_id = $request->hotel_id;
        $package->description = $request->description;
        $package->start_date = $request->start_date;
        $package->end_date = $request->end_date;
        $package->price = $request->price;
        if ($request->hasFile('image')) {
            //delete previous image
            if ($package->image) {
                if (file_exists($package->image)) {
                    unlink($package->image);
                }
            }
            $file = $request->file('image');
            $newName = time() . $file->getClientOriginalName();
            $file->move('uploads/package', $newName);
            $package->image = 'uploads/package/' . $newName;
        }
        $package->update();
        return redirect('/admin/package')->with('success', 'Package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::find($id);
        if ($package->image) {
            if (file_exists($package->image)) {
                unlink($package->image);
            }
        }
        $package->delete();
        return redirect('/admin/package')->with('success', 'Package deleted successfully');
    }
}
