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

    public function sispaa_attach(Request $request){
        $ch = curl_init();
        $dir = $request->file('file')->store('test');

        $json = ['sispaa_id' => 'TRKKR.800116','attachment' => 'http://127.0.0.1:8000/storage/'.$dir];

        $body = array('sispaa_id' => 'TRKKR.800116','attachment'=> new CURLFILE($dir));
        $headers = array(
        // 'Accept: application/json',
        // 'Content-Type: multipart/form-data',
        'Authorization: BPA-KKR-API-TEST');

        curl_setopt($ch, CURLOPT_URL, 'https://gateway.spab.gov.my/aduan-api/v1/attach/');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        // dd($test);

        $res = json_decode(curl_exec($ch));
        return [$res, $dir];
    }
}
