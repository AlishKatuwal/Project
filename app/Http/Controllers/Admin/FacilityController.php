<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Hotel;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facility = Facility::all();
        return view('admin.pages.facility.index', compact('facility'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotel = Hotel::all();
        return view('admin.pages.facility.create', compact('hotel'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hotel_id' => 'required',
        ]);
        $facility = new Facility();
        $facility->name = $request->name;
        $facility->hotel_id = $request->hotel_id;
        $facility->save();
        return redirect('/admin/facility')->with('success', 'Facility created successfully');
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
        $facility = Facility::find($id);
        $hotel = Hotel::all();
        return view('admin.pages.facility.edit', compact('facility', 'hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'hotel_id' => 'required',
        ]);
        $facility = Facility::find($id);
        $facility->name = $request->name;
        $facility->hotel_id = $request->hotel_id;
        $facility->update();
        return redirect('/admin/facility')->with('success', 'Facility updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $facility = Facility::find($id);
        $facility->delete();
        return redirect('/admin/facility')->with('success', 'Facility deleted successfully');
    }
}
