<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aduan;
use App\Models\PBT;
use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiAduan extends Controller
{
    public function index()
    {
        $aduan = Aduan::all();
        return response()->json($aduan);
    }

    public function get_aduan_by_user($id){

        $aduan = Aduan::where('pengadu_id', $id)->get();
        if(!empty($aduan)){
            foreach ($aduan as $ad) {
                $this->get_status_sispaa($ad->sispaa_id);
            }
        }

        return response()->json($aduan);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $aduan = new Aduan;
        $latestRef = Aduan::orderBy('created_at','DESC')->first();
        if(empty($latestRef)){
            $aduan->reference_id = 'MPOTKKR.'.str_pad(1, 7, "0", STR_PAD_LEFT);
        } else {
            $aduan->reference_id = 'MPOTKKR.'.str_pad($latestRef->id + 1, 7, "0", STR_PAD_LEFT);
        }
        $aduan->title = $request->title;
        $aduan->detail = $request->detail;
        $aduan->latitud = $request->latitud;
        $aduan->langitud = $request->langitud;
        $aduan->address = $request->address;
        $aduan->response_party = $request->response_party;
        $aduan->nama_jalan = $request->nama_jalan;
        $aduan->pbt_code = $request->pbt_code;
        $aduan->complaint_type = $request->complaint_type;
        $aduan->complaint_category = $request->complaint_category;
        $aduan->complaint_category_code = $request->complaint_category_code;
        $aduan->gambar_id = $request->gambar_id;
        $aduan->pengadu_id = $request->pengadu_id;

        $user = User::where('id', $request->pengadu_id)->first();

        $res = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'BPA-KKR-API-TEST'
        ])->post('https://gateway.spab.gov.my/aduan-api/v1/newcase',
        [
            'complainant_name' => $user->name,
            'complainant_doc_no' => $user->doc_no,
            'complainant_doc_type' => $user->doc_type,
            'complainant_company' => $user->organisasi,
            'complainant_mobile' => $user->telefon,
            'complainant_email' => $user->email,
            'complaint_title' => $request->title,
            'complaint_detail' => $request->detail,
            'location_latitute' => $request->latitud,
            'location_longtitute' => $request->langitud,
            'location_address' => $request->address,
            'reference_id' => $aduan->reference_id,
            'pbt_code' => $aduan->pbt_code,
            'complaint_type' => 'CMP',
            'complaint_category' => ''
        ]);


        // return[$res['data'], $aduan, $user];

        if($res['data']['status'] === 200){
            $aduan->sispaa_id = $res['data']['sispaaid'];
            $aduan->save();
            return ['success' => true,
            $aduan];
        } else if($res['data']['status'] === 409){
            return ['failed' => true,
            $aduan];
        }


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
        $aduan->title = $request->title;
        $aduan->detail = $request->detail;
        $aduan->latitud = $request->latitud;
        $aduan->langitud = $request->langitud;
        $aduan->address = $request->address;
        $aduan->response_party = $request->response_party;
        $aduan->nama_jalan = $request->nama_jalan;
        $aduan->pbt_code = $request->pbt_code;
        $aduan->complaint_type = $request->complaint_type;
        $aduan->complaint_category = $request->complaint_category;
        $aduan->complaint_category_code = $request->complaint_category_code;
        $aduan->status_code = $request->status_code;
        $aduan->status_desc = $request->status_desc;
        $aduan->save();

        return response()->json($aduan);
    }

    public function destroy(Aduan $aduan)
    {
        $aduan->delete();
        $gambar = Gambar::where('id',$aduan->gambar_id)->first();
        $gambar->delete();
        return response()->json($aduan);
    }

    public function get_pbt(Request $request)
    {
        $pbt_code = PBT::where('pbt_itegur_nama', $request->pbt_nama)->first();

        if(!empty($pbt_code)){
            return response()->json(['kod' => $pbt_code->pbt_itegur_kod]);
        } else if($request->pbt_nama === 'JKR') {
            return response()->json(['kod' => 'JKR']);
        } else if($request->pbt_nama === 'PLUS') {
            return response()->json(['kod' => 'LLM']);
        }else {
            return response()->json(['kod' => 'KKR']);
        }

    }

    public function get_status_sispaa($val)
    {
        $json = ['sispaa_id' => [$val]];

        $ch = curl_init();
            $headers = array(
            // 'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: BPA-KKR-API-TEST'

            );
            curl_setopt($ch, CURLOPT_URL, 'https://gateway.spab.gov.my/aduan-api/v1/status/');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $body = json_encode($json);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Timeout in seconds
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);

            $resp = json_decode(curl_exec($ch));
            if($resp->data == null){
                return ['message' => 'Error, Data cannot be synced with SISPAA API!'];
            }
            $res = $resp->data->result[0];

            if($res->response_code == 200){

                $aduan = Aduan::where('sispaa_id',$res->sispaa_id)->update([
                    'status_code' => $res->status_code,
                    'status_desc' => $res->status_desc,
                    'nota' => $res->notes,
                ]);

            return $aduan;
            }


    }

    public function aduan_by_month_year(Request $request){

        $aduan = Aduan:: whereMonth('created_at', $request->bulan)
        ->whereYear('created_at', $request->tahun)
        ->get();

        return $aduan;
    }


}
