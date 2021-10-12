<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiAduan;
Route::resource('aduan', ApiAduan::class);

use App\Http\Controllers\ApiJalan;
Route::resource('jalan', ApiJalan::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
