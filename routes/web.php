<?php

use App\Http\Middleware\RoleBaseMiddleware;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\HotelBookingController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\VisitorController;
use App\Models\Destination;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\Package;
use App\Models\Room;
use App\Models\Visit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $hotels = Hotel::all();
    $packages = Package::all();
    $destination = Destination::all();
    return view('frontend.pages.home', compact('hotels', 'packages', 'destination'));
});

Route::middleware([RoleBaseMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('/admin/province', ProvinceController::class);
    Route::resource('/admin/city', CityController::class);
    Route::resource('/admin/destination', DestinationController::class);
    Route::resource('/admin/facility', FacilityController::class);
    Route::resource('/admin/guide', GuideController::class);
    Route::resource('/admin/hotel', HotelController::class);
    Route::resource('/admin/package', PackageController::class);
    Route::resource('/admin/room', RoomController::class);
    Route::post('/bookroom', [HotelBookingController::class, 'store']);
    Route::post('/visitor', [VisitorController::class, 'store']);
    Route::get('/admin/destinationBooking', function () {
        $booking = Visit::all();
        return view('admin.pages.Bookings.destinationBooking', compact('booking'));
    });
    Route::get('/admin/hotelBooking', function () {
        $booking = HotelBooking::with('hotel', 'user', 'package', 'room')->get();
        return view('admin.pages.Bookings.hotelBooking', compact('booking'));
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//

Route::get('destination/{id}', function ($id) {
    $destination = Destination::find($id);
    return view('frontend.pages.Destination', compact('destination'));
});

Route::get('Gallery', function () {
    return view('frontend.pages.Gallery');
});

Route::get('/hotel/{id}', function ($id) {
    //get hotel with packages and services and rooms
    $hotel = Hotel::with('packages', 'services', 'rooms')->find($id);
    return view('frontend.pages.HotelBooking', compact('hotel'));
});

Route::get('/book/{id}/room', function ($id) {
    $room = Room::find($id);
    return view('frontend.pages.Room', compact('room'));
});

Route::get('/book/{id}/package', function ($id) {
    $package = Package::find($id);
    return view('frontend.pages.Package', compact('package'));
});
