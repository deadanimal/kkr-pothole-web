<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AduanController;
Route::resource('aduan', AduanController::class);

use App\Http\Controllers\JalanController;
Route::resource('jalan', JalanController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
