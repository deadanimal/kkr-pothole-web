<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;

class ApiUser extends Controller
{
    public function index()
    {
        $users = User::where('is_active', 1)->get();
        return response()->json($users);
    }

    public function show(User $user)
    {
        return $user;
    }

    public function edit(User $user)
    {
        //
    }

    public function profile()
    {
        $users = Auth::user();
        return response()->json($users);
    }

    public function admin_show()
    {
        $users = User::where('role','admin')->get();
        return response()->json($users);
    }

    public function superadmin_show()
    {
        $users = User::where('role','super_admin')->get();
        return response()->json($users);
    }

    public function update(Request $request, User $user)
    {
        if($request->password){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'telefon' => $request->telefon,
                'organisasi' => $request->organisasi,
                'jawatan' => $request->jawatan,
                'doc_no' => $request->doc_no,
                'doc_type' => $request->doc_type,
                'gambar_id' => $request->gambar_id,
                'password' => Hash::make($request->password)
            ]);
        } else{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'telefon' => $request->telefon,
                'organisasi' => $request->organisasi,
                'jawatan' => $request->jawatan,
                'doc_no' => $request->doc_no,
                'doc_type' => $request->doc_type,
                'gambar_id' => $request->gambar_id,
            ]);
        }
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->update([
            'is_active' => 0,
        ]);
        // $user->delete();
        return response()->json($user);
    }

    public function forgot_user(Request $request){

        $user = User::where('email',$request->email)->first();
        if($user != null) {
            $fourRandom = rand(1000,9999);
            $defpassword = "MyPotHoles".$fourRandom;

            $maildata = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $defpassword
            ];

            Mail::to($request->email)->send(new \App\Mail\ForgotPassword($maildata));

            $user->password = Hash::make($defpassword);
            $user->save();
            $header = "Berjaya";
            $response = "Kata laluan sementara telah dihantar ke e-mel ".$user->email.". Sila semak e-mel anda dan bagi tujuan keselamatan, sila kemas kini kepada kata laluan yang baharu.";

        }else{
            $header = "Tidak Berjaya";
            $response = "E-mel yang diberikan belum wujud. Mohon daftar sebagai pengguna untuk menggunakan aplikasi MyPotholes.";
        }

        return response()->json(['message' => $response,
    'title' => $header]);

    }
}
