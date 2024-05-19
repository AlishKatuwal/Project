<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Guide;
use App\Models\User;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guide = Guide::all();
        return view('admin.pages.guide.index', compact('guide'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $destination = Destination::all();
        return view('admin.pages.guide.create', compact('user', 'destination'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'destination_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'photo' => 'required | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'description' => 'required',
            'price' => 'required',
            'is_available' => 'nullable',
        ]);
        $guide = new Guide();
        $guide->user_id = $request->user_id;
        $guide->destination_id = $request->destination_id;
        $guide->name = $request->name;
        $guide->email = $request->email;
        $guide->contact = $request->contact;
        $guide->description = $request->description;
        $guide->price = $request->price;
        $guide->is_available = $request->is_available ? 1 : 0;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $newName = time() . $file->getClientOriginalName();
            $file->move('uploads/guide', $newName);
            $guide->photo = 'uploads/guide/' . $newName;
        }
        $guide->save();
        return redirect('/admin/guide')->with('success', 'Guide created successfully');
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
        $guide = Guide::find($id);
        $user = User::all();
        $destination = Destination::all();
        return view('admin.pages.guide.edit', compact('guide', 'user', 'destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'destination_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'photo' => 'nullable | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'description' => 'required',
            'price' => 'required',
            'is_available' => 'nullable',
        ]);
        $guide = Guide::find($id);
        $guide->user_id = $request->user_id;
        $guide->destination_id = $request->destination_id;
        $guide->name = $request->name;
        $guide->email = $request->email;
        $guide->contact = $request->contact;
        $guide->description = $request->description;
        $guide->price = $request->price;
        $guide->is_available = $request->is_available ? 1 : 0;
        if ($request->hasFile('photo')) {
            //delete previous photo
            if ($guide->photo) {
                if (file_exists($guide->photo)) {
                    unlink($guide->photo);
                }
            }
            $file = $request->file('photo');
            $newName = time() . $file->getClientOriginalName();
            $file->move('uploads/guide', $newName);
            $guide->photo = 'uploads/guide/' . $newName;
        }
        $guide->update();
        return redirect('/admin/guide')->with('success', 'Guide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guide = Guide::find($id);
        if ($guide->photo) {
            if (file_exists($guide->photo)) {
                unlink($guide->photo);
            }
        }
        $guide->delete();
        return redirect('/admin/guide')->with('success', 'Guide deleted successfully');
    }
}
