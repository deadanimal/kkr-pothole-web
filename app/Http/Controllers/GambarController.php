<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Aduan;
use CURLFile;
use Illuminate\Http\Request;

class GambarController extends Controller
{

    public function index()
    {
        $gambar = Gambar::all();
        return response()->json($gambar);
    }
    //File Upload Function
    public function upload_image(Request $request)
    {


    $img = new Gambar();
    $img->url = $request['img'];
    $img->filename = $request['filename'];
    $img->save();

    $aduan = Aduan::where('gambar_id',$img->id)->get();




    return ['success' => true,
            'gambar_id'=> $img->id,
        ];

    }

    public function update(Request $request, Gambar $gambar)
    {
        $gambar->url = $request->img;
        $gambar->filename = $request->filename;
        $gambar->save();

        return ['success' => true,
            'gambar_id'=> $gambar->id];
    }

    public function show(Gambar $gambar){
        return $gambar;
    }

}
