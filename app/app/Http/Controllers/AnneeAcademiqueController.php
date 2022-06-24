<?php

namespace App\Http\Controllers;

use App\Models\AnneeAcademique;
use Illuminate\Http\Request;

class AnneeAcademiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anneeAcademiques = AnneeAcademique::all();
        return view('anneeAcademique.index', compact('anneeAcademiques'));
    }

    public function create()
    {
        return view('anneeAcademique.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'hello';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnneeAcademique  $anneeAcademique
     * @return \Illuminate\Http\Response
     */
    public function show(AnneeAcademique $anneeAcademique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnneeAcademique  $anneeAcademique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnneeAcademique $anneeAcademique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnneeAcademique  $anneeAcademique
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnneeAcademique $anneeAcademique)
    {
        //
    }
}
