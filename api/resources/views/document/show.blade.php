@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <div class="card">
                    <div class="card-header">
                        A propos du document
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 border">
                                <h4 class="card-title">Nom</h4>{{ $document->name }}
                            </div>
                            <div class="col-md-6 border">
                                <h4 class="card-title">Lien</h4>{{ $document->lien }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 border">
                                <h4 class="card-title">Visionner</h4>{{ $document->file }}
                            </div>
                            <div class="col-md-6 border">
                                <h4 class="card-title">Description</h4>{!! $document->description !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 border">
                                <h4 class="card-title">Classe</h4>{{ $document->classe->libelle }}
                            </div>
                            <div class="col-md-6 border">
                                <h4 class="card-title">Cours</h4>{{ $document->cour->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 border">
                                <h4 class="card-title">Publié le</h4>{{ $document->created_at }}
                            </div>
                            <div class="col-md-6 border">
                                <h4 class="card-title">Publié par:</h4>{{ $document->user->name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
