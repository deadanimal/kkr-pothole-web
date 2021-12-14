<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

use App\Mail\RegisterVerification;
use App\Models\Gambar;
use App\Mail\RegisterAdmin;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function register_user(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'string|min:8',
        // ]);

        $checkemail = User::where('email',$request->email)->first();
        if($checkemail == null) {
            $checkdoc = User::where('doc_no',$request->doc_no)->first();
            if($checkdoc != null) {
                return response()->json(['message' => "faildoc"]);
            }else{
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'telefon' => $request->telefon,
                    'doc_no' => $request->doc_no,
                    'doc_type' => $request->doc_type,
                    'gambar_id' => $request->gambar_id,
                ]);

                $token = $user->createToken('auth_token')->plainTextToken;

                $verifymaillink="https://kkr-pothole-stg.prototype.com.my/confirm-email/".$user->id;

                $maildata = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'link' => $verifymaillink
                ];

                Mail::to($request->email)->send(new \App\Mail\RegisterVerification($maildata));

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'message' => 'success'
                ]);
            }
        }else{
            $del_pic = Gambar::where('id',$request->gambar_id);
            $del_pic->delete();

            return response()->json(['message' => "failemail"]);
        }
    }
    public function register_admin(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        // ]);

        $checkemail = User::where('email',$request->email)->first();
        if($checkemail == null) {
            $checkdoc = User::where('doc_no',$request->doc_no)->first();
            if($checkdoc != null) {
                return response()->json(['message' => "faildoc"]);
            }else{
                $fourRandom = rand(1000,9999);
                $defpassword = "MyPotHoles".$fourRandom;

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($defpassword),
                    'telefon' => $request->telefon,
                    'doc_no' => $request->doc_no,
                    'doc_type' => $request->doc_type,
                    'organisasi' => $request->organisasi,
                    'jawatan' => $request->jawatan,
                    'role' => $request->role,
                    'gambar_id' => $request->gambar_id,
                ]);
                $role = "";
                if($request->role == "admin"){
                    $role = "Admin Jalan";
                }
                if($request->role == "super_admin"){
                    $role = "Admin Jalan";
                }
                $token = $user->createToken('auth_token')->plainTextToken;


                $verifymaillink="https://kkr-pothole-stg.prototype.com.my/confirm-email/".$user->id;

                    $maildata = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'role' => $role,
                        'password' => $defpassword,
                        'link' => $verifymaillink
                    ];

                    Mail::to($request->email)->send(new \App\Mail\RegisterAdmin($maildata));

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'message' => 'success'
                ]);
            }
        }else{
            $del_pic = Gambar::where('id',$request->gambar_id);
            $del_pic->delete();

            return response()->json(['message' => "failemail"]);
        }


    }

    //use this method to signin users
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(
                [
                    'message' => 'Sila masukkan emel dan kata laluan yang sah.',
                ],
                401,
            );
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        if($user->email_verified_at == null){
            return response()->json(
                [
                    'message' => 'Sila aktifkan akaun anda di email yang didaftarkan.',
                ],
                405,
            );
        } else if($user->is_active == 0){
            return response()->json(
                [
                    'message' => 'Akaun ini tidak boleh dicapai aksesnya',
                ],
                405,
            );
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'data' => $user
        ]);
    }

    // this method signs out users by removing tokens
    public function logout()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();

        return [
            'message' => 'Tokens Revoked',
        ];
    }

    public function get_auth_user(Request $request)
    {
        //dd($request->bearer_token);
        $token_from_fe = $request->bearer_token;
        $token = PersonalAccessToken::findToken($token_from_fe);
        $user = $token->tokenable;

        return response()->json($user);
    }
}
