<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Pays;
use App\Models\ResponsableClasse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reponsableClasses = ResponsableClasse::where('user_id', Auth::id())->get();
        $nbreDocuments = Document::where('user_id', Auth::id())->count();
        return view('home', compact('reponsableClasses', 'nbreDocuments'));
    }
}
