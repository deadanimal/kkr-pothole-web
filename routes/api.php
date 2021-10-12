<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiAduanController;
Route::resource('aduan', ApiAduanController::class);

use App\Http\Controllers\ApiJalanController;
Route::resource('jalan', ApiJalanController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
