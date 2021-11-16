<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aduan;
use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiAduan extends Controller
{
    public function index()
    {
        $aduan = Aduan::all();
        return response()->json($aduan);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $aduan = new Aduan;
        $aduan->title = $request->title;
        $aduan->detail = $request->detail;
        $aduan->latitud = $request->latitud;
        $aduan->langitud = $request->langitud;
        $aduan->address = $request->address;
        $aduan->nama_jalan = $request->nama_jalan;
        $aduan->gambar_id = $request->gambar_id;
        $aduan->pengadu_id = $request->pengadu_id;
        $aduan->save();

        $user = User::where('id', $request->pengadu_id)->first();

        $res = response()->json([
            'complainant_name' => $user->name,
            'complainant_doc_no' => $user->doc_no,
            'complainant_doc_type' => $user->doc_type,
            'complainant_company' => $user->organisasi,
            'complainant_mobile' => $user->telefon,
            'complainant_email' => $user->email,
            'complaint_title' => $request->title,
            'complaint_detail' => $request->detail,
            'location_latitute' => $request->latitud,
            'location_longtitute' => $request->langitud,
            'location_address' => $request->address,
            'reference_id' => 'KKR-0000023',
            'pbt_code' => 'KKRPBT-0000001',
            'complaint_type' => 'CMP',
            'complaint_category' => ''
        ]);

        return response()->json($aduan);
    }

    public function show(Aduan $aduan)
    {
        return $aduan;
    }

    public function edit(Aduan $aduan)
    {
        //
    }

    public function update(Request $request, Aduan $aduan)
    {
        $aduan->title = $request->title;
        $aduan->detail = $request->detail;
        $aduan->kategori_jalan = $request->kategori_jalan;
        $aduan->gambar_id = $request->gambar_id;
        $aduan->latitud = $request->latitud;
        $aduan->langitud = $request->langitud;
        $aduan->daerah = $request->daerah;
        $aduan->negeri = $request->negeri;
        $aduan->pengadu_id = $request->pengadu_id;
        $aduan->save();

        return response()->json($aduan);
    }

    public function destroy(Aduan $aduan)
    {
        $aduan->delete();
        $gambar = Gambar::where('id',$aduan->gambar_id)->first();
        $gambar->delete();
        return response()->json($aduan);
    }
}
