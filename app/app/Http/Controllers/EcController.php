<?php

namespace App\Http\Controllers;

use App\Models\Ec;
use Illuminate\Http\Request;

class EcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecs = Ec::all();
        return view('ec.index', compact('ecs'));
    }

    public function create()
    {
        return view('ec.create');
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
     * @param  \App\Models\Ec  $ec
     * @return \Illuminate\Http\Response
     */
    public function show(Ec $ec)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ec  $ec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ec $ec)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ec  $ec
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ec $ec)
    {
        //
    }
}
