<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semestres = Semestre::all();
        return view('semestre.index', compact('semestres'));
    }

    public function create()
    {
        return view('semestre.create');
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
            'nom' => 'required|unique:semestres',
            'code' => 'required|unique:semestres',
        ]);
        DB::beginTransaction();
        try {
            $semestre = new Semestre();
            $semestre->user_email = auth()->user()->email;
            $semestre->code = $request->code;
            $semestre->nom = $request->nom;
            $semestre->saveOrFail();
        } catch (\Throwable $th) {
            DB::rollback();
            return back();
        }
        return redirect()->route('semestre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function show(Semestre $semestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semestre $semestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semestre $semestre)
    {
        //
    }
}
