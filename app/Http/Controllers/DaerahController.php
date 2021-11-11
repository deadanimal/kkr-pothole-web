<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daerah = Daerah::all();
        return response()->json($daerah);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function show(Daerah $daerah)
    {
        return response()->json($daerah);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function edit(Daerah $daerah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daerah $daerah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daerah $daerah)
    {
        //
    }

    public function getDaerah($id)
    {
        $daerah = Daerah::where('negeri_id', $id)->get();
        return response()->json($daerah);
    }

    public function getJKR(Request $request)
    {
        $daerah = Daerah::where('nama_daerah', $request->nama_daerah)->get();

        return $daerah;
    }
}
