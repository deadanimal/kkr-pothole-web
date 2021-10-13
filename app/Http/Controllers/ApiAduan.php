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
        Aduan::create([
            'tajuk' => $request->tajuk,
            'keterangan' => $request->keterangan,
            'kategori_jalan' => $request->kategori_jalan,
            'gambar_id' => $request->gambar_id,
            'lokasi' => $request->lokasi, //GeoJSON
            'daerah' => $request->daerah,
            'negeri' => $request->negeri,
            'pengadu_id' => $request->pengadu_id,
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
        $aduan->update([
            'tajuk' => $request->tajuk,
            'keterangan' => $request->keterangan,
            'kategori_jalan' => $request->kategori_jalan,
            'gambar_id' => $request->gambar_id,
            'lokasi' => $request->lokasi, //GeoJSON
            'daerah' => $request->daerah,
            'negeri' => $request->negeri,
            'pengadu_id' => $request->pengadu_id,
        ]);

        return response()->json($aduan);
    }

    public function destroy(Aduan $aduan)
    {
        $aduan->delete();
        return response()->json($aduan);
    }
}
