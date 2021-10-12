<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;

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
        $aduan->complaint_title = $request->complaint_title;
        $aduan->complaint_detail = $request->complaint_detail;
        $aduan->gambar_aduan_path = $request->gambar_aduan_path;
        $aduan->latitud_aduan = $request->latitud_aduan;
        $aduan->langitud_aduan = $request->langitud_aduan;
        $aduan->kategori_jalan_aduan = $request->kategori_jalan_aduan;
        $aduan->negeri_aduan = $request->negeri_aduan;
        $aduan->id_pengguna = $request->id_pengguna;
        $aduan->save();
        
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
        $aduan->save();
        return $aduan;
    }

    public function destroy(Aduan $aduan)
    {
        //
    }
}
