<?php

namespace App\Http\Controllers\Api\V1;

use App\Custom\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\AnneeAcademique;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\Document;
use App\Models\Type;
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
        $documents = Document::where('user_id', Auth::id())->simplePaginate(6);
        $types = Type::all();
        $classes = Classe::whereRelation('responsableClasse', 'user_id', Auth::id())->get();
        $cours = Cour::whereRelation('classe', function ($query) {
            $query->whereRelation('responsableClasse', 'user_id', Auth::id());
        })->get();
        return view('document.index', compact('documents', 'types', 'classes', 'cours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'classe' => 'required',
            'cours' => 'required',
            'type' => 'required',
            'file' => 'nullable|mimes:pdf,jpg,png',
            'description' => 'nullable|string',
        ]);
        DB::beginTransaction();
        try {
            $document = new Document();
            $document->name = $request->name;

            if ($request->exists('file')) {
                $file = $request->file;
                $filename = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('documents', $filename);
                $document->file = $filename;
            }

            $document->description = $request->description;
            $document->user_id = Auth::id();
            $document->cour_id = $request->cours;
            $document->classe_id = $request->classe;
            $document->type_id = $request->type;
            $document->save();
            session()->flash('storeDocument', 'Document enregistré avec succès');
            DB::commit();
            return redirect()->route('document.index');
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
        $types = Type::all();
        $classes = Classe::whereRelation('responsableClasse', 'user_id', Auth::id())->get();
        $cours = Cour::whereRelation('classe', function ($query) {
            $query->whereRelation('responsableClasse', 'user_id', Auth::id());
        })->get();
        return view('document.edit', compact('types', 'classes', 'cours', 'document'));
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
        $request->validate([
            'name' => 'required|min:2',
            'classe' => 'required',
            'cours' => 'required',
            'type' => 'required',
            'file' => 'nullable|mimes:pdf,jpg,png',
            'description' => 'nullable|string',
        ]);
        DB::beginTransaction();
        try {
            $document->name = $request->name;
            $document->file = $request->file;
            $document->lien = $request->lien;
            $document->description = $request->description;
            $document->user_id = Auth::id();
            $document->cour_id = $request->cours;
            $document->classe_id = $request->classe;
            $document->type_id = $request->type;
            $document->update();
            DB::commit();
            return redirect()->route('document.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        DB::beginTransaction();
        try {
            $document->deleteOrFail();
            DB::commit();
            session()->flash('deleteDocument', 'Document supprimé avec succès');
            return redirect()->route('document.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return back();
        }
    }

    public function search(Request $request)
    {
        return back();
        $types = Type::all();
        $anneeAcademiques = AnneeAcademique::all();
        return view('cours.show', compact('types', 'anneeAcademiques'));
    }

    public function findCourseDocument(Request $request)
    {
        $documents = Document::where('cour_id', $request->id)->with('user', 'type')->inRandomOrder()->get();
        return CustomResponse::buildSuccessResponse($documents);
    }

    public function paginate($itemPerPage, Request $request)
    {
        $documents = Document::where('cour_id', $request->id)->with('user')->paginate($itemPerPage);
        return CustomResponse::buildSuccessResponse($documents);
    }
}
