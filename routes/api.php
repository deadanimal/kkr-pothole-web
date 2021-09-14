<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AduanController;
Route::resource('aduan', AduanController::class);

use App\Http\Controllers\JalanController;
Route::resource('jalan', JalanController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
