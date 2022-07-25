<?php

namespace App\Http\Controllers;

use App\Models\AnneeAcademique;
use App\Models\Cour;
use App\Models\Type;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cour::simplePaginate(10);
        return view('cours.index', compact('cours'));
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
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function show(Cour $cour)
    {
        $types = Type::all();
        $anneeAcademiques = AnneeAcademique::all();
        return view('cours.show', compact('cour', 'types', 'anneeAcademiques'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function edit(Cour $cour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cour $cour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cour $cour)
    {
        //
    }

    public function search(Request $request)
    {
        $request->validate([
            'motCle' => 'required|min:2'
        ]);
        $motCle = $request->motCle;
        $cours = Cour::where('name', 'like', '%' . $motCle . '%')->simplePaginate(10);
        return view('cours.index', compact('cours'));
    }
}
