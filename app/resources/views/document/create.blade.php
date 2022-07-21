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
                        <form action=" {{ route('document.store') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Libelle du document</label>
                                        <input type="text" name="name" required id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Algorithme et Programmation 1" aria-describedby="helpId">
                                        @error('name')
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('name') }}
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
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('lien') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="type" class="form-label">Type du document</label>
                                        <select class="form-select" name="type" @error('type') is-invalid @enderror"
                                            id="type" required>
                                            @forelse ($types as $type)
                                                <option value="{{ $type->code }}">{{ $type->name }}
                                                </option>
                                            @empty
                                                <option selected>Aucun type de document</option>
                                            @endforelse
                                        </select>
                                        @error('type')
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('type') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Fichier
                                            <small id="helpId" class="form-text text-primary">
                                                Seuls les fichiers au format pdf,jpg,png sont acceptés
                                            </small>
                                        </label>
                                        <input type="file" @error('type') is-invalid @enderror" name="file"
                                            id="file" class="form-control" placeholder="" aria-describedby="helpId">
                                        @error('file')
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('file') }}
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
                                            @forelse ($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->libelle }}
                                                </option>
                                            @empty
                                                <option selected>Aucune classe</option>
                                            @endforelse
                                        </select>
                                        @error('classe')
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('classe') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cours" class="form-label">Cours</label>
                                        <select class="form-select" @error('cours') is-invalid @enderror" name="cours"
                                            id="cours" required>
                                            @forelse ($cours as $cour)
                                                <option value="{{ $cour->id }}">{{ $cour->name }} (
                                                    {{ $cour->classe->libelle }} )
                                                </option>
                                            @empty
                                                <option selected>Aucun cours</option>
                                            @endforelse
                                        </select>
                                        @error('cours')
                                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('cours') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        {{-- <textarea class="form-control" name="description" id="description" rows="3"></textarea> --}}
                                        <textarea class="ckeditor form-control" @error('description') is-invalid @enderror" name="description"></textarea>
                                        @error('description')
                                            <small id="helpId" class="form-text text-danger">
                                                {{ $errors->first('description') }}
                                            </small>
                                        @enderror
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
