<?php

namespace App\Http\Controllers;

use App\Models\Ec;
use App\Models\Ue;
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
        $ues = Ue::all();
        return view('ec.create', compact('ues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|unique:ecs',
            'code' => 'required|unique:ecs',
            'ue_id' => 'required|unique:ecs',
        ]);
        $ec = new Ec();
        $ec->user_email = auth()->user()->email;
        $ec->code = $request->code;
        $ec->nom = $request->nom;
        $ec->ue_id = $request->ue_id;
        $ec->save();
        return redirect()->route('ec.index');
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
