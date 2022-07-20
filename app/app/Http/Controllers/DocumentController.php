<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cour;
use App\Models\Document;
use App\Models\Type;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::where('user_id', Auth::id())->simplePaginate(10);
        return view('document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $classes = Classe::whereRelation('responsableClasse', 'user_id', Auth::id())->get();
        $cours = Cour::whereRelation('classe', function ($query) {
            $query->whereRelation('responsableClasse', 'user_id', Auth::id());
        })->get();
        return view('document.create', compact('types', 'classes', 'cours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required',
            'classe' => 'required',
            'cours' => 'required',
            'type' => 'required',
            'file' => 'mimes:pdf,jpg,png',
            'lien' => 'url',
            'description' => 'nullable|string',
        ]);
        if ($validators->fails()) {
            return back();
        }
        DB::beginTransaction();
        try {
            $document = new Document();
            $document->name = $request->name;
            $document->file = $request->file;
            $document->lien = $request->lien;
            $document->description = $request->description;
            $document->user_id = Auth::id();
            $document->cour_id = $request->cours;
            $document->classe_id = $request->classe;
            $document->save();

            $type = Type::whereCode($request->type)->first();

            $typeDocument = new TypeDocument();
            $typeDocument->user_email = auth()->user()->email;
            $typeDocument->document_id = $document->id;
            $typeDocument->type_id = $type->id;
            $typeDocument->save();
            DB::commit();
            return route('document.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('document.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
