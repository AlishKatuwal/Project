<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $city = City::all();
        return view('admin.pages.city.index',compact('city'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $province = Province::all();
        return view('admin.pages.city.create',compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $city = new City();
        $city->name = $request->name;
        $city->province_id = $request->province_id;
        $city->save();
        return redirect('admin/city')->with('status', 'city created.');
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
        $province = Province::all();
        $city = City::find($id);
        return view('admin.pages.city.edit',compact('province','city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $city = City::find($id);
        $city->name = $request->name;
        $city->province_id = $request->province_id;
        $city->save();
        return redirect('admin/city')->with('status', 'city updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect('admin/city')->with('status', 'city deleted.');
    }
}
