<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiAduan;

use App\Http\Controllers\ApiJalan;
use App\Http\Controllers\ApiUser;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\GambarController;
use App\Http\Controllers\NegeriController;

// Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
//register new user
Route::post('/register/user', [AuthController::class, 'register_user']);
Route::post('/register/admin', [AuthController::class, 'register_admin']);
//login user
Route::post('/login', [AuthController::class, 'login']);
//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::post('/auth/user', function(Request $request) {
    //     return $request->user();
    // });
});
Route::post('/logout', [AuthController::class, 'logout']);
// Route::get('/profile', function(Request $request) {
//     return auth()->user();
// });
Route::post('/auth/user', [AuthController::class, 'get_auth_user']);
Route::get('/user/admin', [ApiUser::class, 'admin_show']);
Route::get('/user/superadmin', [ApiUser::class, 'superadmin_show']);
Route::get('getdaerah/{id}', [DaerahController::class, 'get_daerah']);
Route::post('get_jkr', [DaerahController::class, 'get_jkr']);

Route::post('/get_pbt', [ApiAduan::class, 'get_pbt']);
Route::post('/get_status_sispaa', [ApiAduan::class, 'get_status_sispaa']);
Route::get('/get_aduan_by_user/{id}', [ApiAduan::class, 'get_aduan_by_user']);

Route::resource('aduan', ApiAduan::class);
Route::resource('jalan', ApiJalan::class);
Route::resource('user', ApiUser::class);

Route::resource('negeri', NegeriController::class);
Route::resource('daerah', DaerahController::class);
Route::resource('gambar', GambarController::class);

Route::post('/upload_image', [GambarController::class, 'upload_image']);

Route::post('/user/forgot', [ApiUser::class, 'forgot_user']);
