<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Models\Gambar;
use App\Models\Negeri;
use Illuminate\Http\Request;

class ApiJalan extends Controller
{
    public function index()
    {
        $jalan = Jalan::all();
        return response()->json($jalan);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $jalan = new Jalan;
        $jalan->name = $request->name;
        $jalan->detail = $request->detail;
        $jalan->start_date = $request->start_date;
        $jalan->end_date = $request->end_date;
        $jalan->response_party = $request->response_party;
        $jalan->alamat = $request->alamat;
        $jalan->daerah = $request->daerah;

        $selected_negeri = Negeri::where('id',$request->negeri)->first();
        $jalan->negeri = $selected_negeri->nama_negeri;
        $jalan->poskod = $request->poskod;
        $jalan->status = $request->status;
        $jalan->admin_id = $request->admin_id;
        $jalan->gambar_id = $request->gambar_id;
        $jalan->save();

        return response()->json($jalan);
    }

    public function show(Jalan $jalan)
    {
        return $jalan;
    }

    public function edit(Jalan $jalan)
    {
        //
    }

    public function update(Request $request, Jalan $jalan)
    {
        $jalan->name = $request->name;
        $jalan->detail = $request->detail;
        $jalan->start_date = $request->start_date;
        $jalan->end_date = $request->end_date;
        $jalan->response_party = $request->response_party;
        $jalan->alamat = $request->alamat;
        $jalan->daerah = $request->daerah;
        $jalan->negeri = $request->negeri;
        $jalan->poskod = $request->poskod;
        $jalan->status = $request->status;
        $jalan->admin_id = $request->admin_id;
        $jalan->save();

        return response()->json($jalan);
    }

    public function destroy(Jalan $jalan)
    {
        $jalan->delete();
        $gambar = Gambar::where('id',$jalan->gambar_id)->first();
        $gambar->delete();
        return response()->json($jalan);
    }
}

