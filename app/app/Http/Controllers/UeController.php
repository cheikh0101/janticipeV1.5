<?php

namespace App\Http\Controllers;

use App\Models\Ue;
use Illuminate\Http\Request;

class UeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ues = Ue::all();
        return view('ue.index', compact('ues'));
    }

    public function create()
    {
        return view('ue.create');
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
     * @param  \App\Models\Ue  $ue
     * @return \Illuminate\Http\Response
     */
    public function show(Ue $ue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ue  $ue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ue $ue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ue  $ue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ue $ue)
    {
        //
    }
}
