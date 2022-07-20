@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Nouveau Document
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('document.store') }} " method="post">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Libelle du document</label>
                                        <input type="text" name="name" required id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Algorithme et Programmation 1" aria-describedby="helpId">
                                        @error('name')
                                            <small id="helpId" class="form-text text-muted"> {{ $errors->first('name') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Lien vers le document</label>
                                        <input type="url" name="lien" id="lien"
                                            class="form-control @error('lien') is-invalid @enderror " placeholder=""
                                            aria-describedby="helpId">
                                        @error('lien')
                                            <small id="helpId" class="form-text text-muted"> {{ $errors->first('lien') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="type" class="form-label">Type du document</label>
                                        <select class="form-select" name="type" id="type" required>
                                            <option selected>Choisissez un type</option>
                                            @forelse ($types as $type)
                                                <option value="{{ $type->code }}">{{ $type->name }}
                                                </option>
                                            @empty
                                                <option selected>Aucun type de document</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Fichier</label>
                                        <input type="file" accept="pdf,jpg,png" name="file" id="file"
                                            class="form-control" placeholder="" aria-describedby="helpId">
                                        @error('file')
                                            <small id="helpId" class="form-text text-muted"> {{ $errors->first('file') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="classe" class="form-label">Classe</label>
                                        <select class="form-select" name="classe" id="classe" required>
                                            <option selected>Choisissez une classe</option>
                                            @forelse ($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->libelle }}
                                                </option>
                                            @empty
                                                <option selected>Aucune classe</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cours" class="form-label">Cours</label>
                                        <select class="form-select" name="cours" id="cours" required>
                                            <option selected>Choisissez un cours</option>
                                            @forelse ($cours as $cour)
                                                <option value="{{ $cour->id }}">{{ $cour->name }} (
                                                    {{ $cour->classe->libelle }} )
                                                </option>
                                            @empty
                                                <option selected>Aucun cours</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        {{-- <textarea class="form-control" name="description" id="description" rows="3"></textarea> --}}
                                        <textarea class="ckeditor form-control" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary btn-block">
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
