<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
    // $img->save();

    // $aduan = Aduan::where('gambar_id',$img->id)->get();

    $imgfile = $request->file('file');

    $res = Http::withHeaders([
        'Authorization' => 'BPA-KKR-API-TEST',
        // 'Content-Type' => 'multipart/form-data'
    ])->post('https://gateway.spab.gov.my/aduan-api/v1/attach',
    [
        'sispaa_id' => 'TRKKR.800000',
        'attachment' => $imgfile
    ]);


    return  $res['data'];

    }

    public function show(Gambar $gambar){
        return $gambar;
    }
}
