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
        $aduan->tajuk = $request->tajuk;
        $aduan->keterangan = $request->keterangan;
        $aduan->gambar_id = $request->gambar_id;
        $aduan->lokasi = $request->lokasi;
        $aduan->kategori_jalan = $request->kategori_jalan_aduan;
        $aduan->negeri = $request->negeri;
        $aduan->pengadu_id = $request->pengadu_id;
        $aduan->save();
        
        return $aduan;
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
