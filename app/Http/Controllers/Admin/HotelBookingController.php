<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'total_amount' => 'required',
        ]);

        $booking = new HotelBooking();
        $booking->hotel_id = $request->hotel_id;
        $booking->user_id = Auth::user()->id;
        $booking->room_id = $request->room_id;
        $booking->package_id = $request->package_id;
        $booking->check_in_date = $request->check_in_date;
        $booking->check_out_date = $request->check_out_date;
        $booking->total_amount = $request->total_amount;
        $booking->booking_code = 'nepalwonder' . rand(1111, 99999).$request->hotel_id;

        $booking->save();
        return redirect()->back()->with('success','booking created successfully');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
