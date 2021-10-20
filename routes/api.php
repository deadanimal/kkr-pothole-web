<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiAduan;
use App\Http\Controllers\AuthController;

Route::resource('aduan', ApiAduan::class);

use App\Http\Controllers\ApiJalan;
Route::resource('jalan', ApiJalan::class);

//register new user
Route::post('/register', [AuthController::class, 'registerUser']);
//login user
Route::post('/login', [AuthController::class, 'login']);
//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/user', function () {
    $users = User::all();
        return response()->json($users);
});
