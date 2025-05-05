<?php

namespace App\Http\Controllers;

use App\Models\Negeri;
use Illuminate\Http\Request;

class NegeriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $negeri = Negeri::all();

        return response()->json($negeri);
        // return $negeri;
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
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function show(Negeri $negeri)
    {
        return response()->json($negeri);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Negeri $negeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negeri $negeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Negeri $negeri)
    {
        //
    }
}
