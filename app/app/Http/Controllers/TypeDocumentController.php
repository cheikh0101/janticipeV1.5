<?php

namespace App\Http\Controllers;

use App\Models\TypeDocument;
use Illuminate\Http\Request;

class TypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeDocuments = TypeDocument::all();
        return view('typeDocument.index', compact('typeDocuments'));
    }

    public function create()
    {
        return view('typeDocument.create');
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
            'nom' => 'required|unique:ues',
            'code' => 'required|unique:ues',
        ]);
        $typeDocument = new TypeDocument();
        $typeDocument->code = $request->code;
        $typeDocument->nom = $request->nom;
        $typeDocument->save();
        return redirect()->route('typeDocument.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function show(TypeDocument $typeDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDocument $typeDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeDocument $typeDocument)
    {
        //
    }
}
