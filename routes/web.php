<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\A1HeaderInvokeProfile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
//    return redirect('/login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
//        Route::get('/', function () {
//            return view('dashboard');
//        })->name('dashboard');

//    Route::get('user/profile', function () {
//        return view('profile/information');
//    })->name('profile.information');

    Route::get('user/security', function () {
        return view('profile/security');
    })->name('profile.security');

//    Route::get('user/information', function () {
//        return view('profile/information');
//    })->name('profile.information');

    Route::get('user/profile', function () {
        return view('profile/information');
    })->name('profile.show');








});
