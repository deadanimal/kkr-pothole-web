<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use Illuminate\Http\Request;

class JalanController extends Controller
{
    public function index()
    {
        $jalan = Jalan::all();
        return $jalan;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $jalan = new Jalan;
        $jalan->save();
        return $jalan;
    }

    public function show(Aduan $aduan)
    {
        return $jalan;
    }

    public function edit(Aduan $aduan)
    {
        //
    }

    public function update(Request $request, Aduan $aduan)
    {
        $jalan->save();
        return $jalan;
    }

    public function destroy(Aduan $aduan)
    {
        //
    }
}
