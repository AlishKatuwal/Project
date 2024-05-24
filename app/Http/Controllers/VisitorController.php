<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function  store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'place' => 'required',
            'total_visitor' => 'required',
            'arrival' => 'required',
            'leaving' => 'required',
        ]);

        $visitor = new Visit();

        $visitor->name = $request->name;
        $visitor->email = $request->email;
        $visitor->place = $request->place;
        $visitor->total_visitor = $request->total_visitor;
        $visitor->arrival = $request->arrival;
        $visitor->leaving = $request->leaving;
        $visitor->save();
        return redirect()->back()->with('success', 'Added successfully');
    }
}
