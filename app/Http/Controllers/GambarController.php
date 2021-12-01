<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Aduan;
use Illuminate\Http\Request;

class GambarController extends Controller
{

    public function index()
    {
        $gambar = Gambar::all();
        return response()->json($gambar);
    }
    //File Upload Function
    public function uploadimage(Request $request)
    {

    $img = new Gambar();
    $img->url = $request['img'];
    $img->filename = $request['filename'];
    $img->save();

    $aduan = Aduan::where('gambar_id',$img->id)->get();

    return ['success' => true,
            'gambar_id'=> $img->id];

    }

    public function update(Request $request, Gambar $img){
        $img->url = $request['img'];
        $img->filename = $request['filename'];
        $img->save();
        return ['success' => true,
            'gambar_id'=> $img->id];


    }

    public function show(Gambar $gambar){
        return $gambar;
    }
}
