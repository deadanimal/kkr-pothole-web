<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('user', function () {
    $users = User::all();
    return response()->json($users);
});

Route::get('confirm-email', function () {
    $users = User::where('id',5)->first();
    $users->email_verified_at = 1;
    $users->save();
});

Route::get('send-mail', function () {
   
    $user = [
        'name' => 'Mail from ItSolutionStuff.com',
        'doc_no' => 'This is for testing email using smtp'
    ];

    //Mail::to($validatedData['email'])->send(new RegisterVerification($user));
    Mail::to('naqib.jai.an@gmail.com')->send(new \App\Mail\RegisterVerification($user));
   
    //dd("Email is Sent.");
});

require __DIR__.'/auth.php';
