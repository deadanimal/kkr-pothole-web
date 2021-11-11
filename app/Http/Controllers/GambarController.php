<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
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

    return ['success' => true,
            'gambar_id'=> $img->id];

    }

    public function show(Gambar $gambar){
        return $gambar;
    }
}
