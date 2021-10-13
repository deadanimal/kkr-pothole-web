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
        $aduan->kategori_jalan = $request->kategori_jalan;
        $aduan->gambar_id = $request->gambar_id;
        $aduan->lokasi = $request->lokasi; //GeoJSON
        $aduan->daerah = $request->daerah;
        $aduan->negeri = $request->negeri;
        $aduan->pengadu_id = $request->pengadu_id;
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
        $aduan = Aduan::where('id', $aduan->id)->first();
        $aduan->tajuk = $request->tajuk;
        $aduan->keterangan = $request->keterangan;
        $aduan->kategori_jalan = $request->kategori_jalan;
        $aduan->gambar_id = $request->gambar_id;
        $aduan->lokasi = $request->lokasi; //GeoJSON
        $aduan->daerah = $request->daerah;
        $aduan->negeri = $request->negeri;
        $aduan->pengadu_id = $request->pengadu_id;
        $aduan->save();

        return response()->json($aduan);
    }

    public function destroy(Aduan $aduan)
    {
        $aduan->delete();
        return response()->json($aduan);
    }
}
