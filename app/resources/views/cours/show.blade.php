@extends('./template')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Document en libre accès</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8">
                    <h3>{{ $cour->name }}</h3>
                </div>
                <div class="col-lg-4">
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Niveau</h5>
                        <p>{{ $cour->classe->niveau->libelle }}</p>
                    </div>
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Spécialité</h5>
                        <p>{{ $cour->classe->specialite->libelle }}</p>
                    </div>
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Nombre de documents</h5>
                        <p>{{ count($cour->documents) }}</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Cource Details Section -->

    <div class="container mb-5">
        <form action="/guest/document/search/" method="post" autocomplete="on">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="anneeAcademique" class="form-label">Année Académique</label>
                        <select class="form-control" name="anneeAcademique" id="anneeAcademique">
                            @foreach ($anneeAcademiques as $anneeAcademique)
                                <option value=" {{ $anneeAcademique->code }} ">{{ $anneeAcademique->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-control" name="type" id="type">
                            @foreach ($types as $type)
                                <option value="{{ $type->code }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-4 mb-4 d-grid gap-2"><label for=""></label>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </div>
            </div>
        </form>
        @forelse ($cour->documents as $document)
            <div class="row">
                <div class="col mb-2">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../assets/img/.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="bg-light mb-2 d-flex justify-content-between align-items-center">
                                        <p>Libellé:</p>
                                        <p>{{ $document->name }}</p>
                                    </div>
                                    <div class="bg-light mb-2 d-flex justify-content-between align-items-center">
                                        <p>Type:</p>
                                        <ul>
                                            @foreach ($document->typeDocuments as $typeDocument)
                                                <li>
                                                    {{ $typeDocument->type->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="bg-light mb-2 d-flex justify-content-between align-items-center">
                                        @if (!empty($document->lien))
                                            <p>Lien:</p>
                                            <p>
                                                <a href="{{ $document->lien }}" target="_blank">Visionner</a>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="bg-light mb-2 d-flex justify-content-between align-items-center">
                                        @if (!empty($document->file))
                                            <p>Visionner:</p>
                                            <p>
                                                <a href="{{ $document->file }}" target="_blank">Visionner</a>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="bg-light mb-2 d-flex justify-content-between align-items-center">
                                        @if (!empty($document->description))
                                            <p>Description:</p>
                                            {!! $document->description !!}
                                        @endif
                                    </div>
                                    <div class="bg-light mb-2 d-flex justify-content-between align-items-center">
                                        <p>Publié par:</p>
                                        <p>{{ $document->user->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>
                Aucun document pour ce cours
            </p>
        @endforelse
    </div>
@endsection
