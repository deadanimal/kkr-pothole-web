<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
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
        $jalan->detail = $request->detail;
        $jalan->alamat = $request->alamat;
        $jalan->daerah = $request->daerah;
        $jalan->negeri = $request->negeri;
        $jalan->poskod = $request->poskod;
        $jalan->status = $request->status;
        $jalan->admin_id = $request->admin_id;
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
        $jalan->detail = $request->detail;
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
        return response()->json($jalan);
    }
}

