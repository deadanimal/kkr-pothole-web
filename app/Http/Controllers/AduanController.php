<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    public function index()
    {
        $aduan = Aduan::all();
        return $aduan;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $aduan = new Aduan;

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
