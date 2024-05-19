<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\RoomController;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $hotels = Hotel::all();
    return view('frontend.pages.home',compact('hotels'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::resource('/admin/province', ProvinceController::class);
Route::resource('/admin/city', CityController::class);
Route::resource('/admin/destination', DestinationController::class);
Route::resource('/admin/facility', FacilityController::class);
Route::resource('/admin/guide',GuideController::class);
Route::resource('/admin/hotel', HotelController::class);
Route::resource('/admin/package', PackageController::class);
Route::resource('/admin/room', RoomController::class);

//

