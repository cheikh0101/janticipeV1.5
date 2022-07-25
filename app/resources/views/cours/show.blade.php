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
            <div class="row">
                <div class="col-md-4">
                    @csrf
                    <div class="mb-3">
                        <label for="anneeAcademique" class="form-label">Année Académique</label>
                        <select class="form-control" name="anneeAcademique" id="anneeAcademique">
                            @foreach ($anneeAcademiques as $anneeAcademique)
                                <option value=" {{ $anneeAcademique->id }} ">{{ $anneeAcademique->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-control" name="type" id="type">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Recherche</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row mt-2" data-aos="zoom-in" data-aos-delay="100">
            @forelse ($cour->documents as $document)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-2">
                    <div class="card" style="width: 18rem;">
                        <img src="../assets/img/a.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $document->name }} </h5>
                            <p class="card-text">{!! $document->description !!}</p>
                            <a href="#" class="btn btn-primary">Visionner</a>
                        </div>
                    </div>
                </div> <!-- End Course Item-->
            @empty
                <p>
                    Aucun document pour ce cours
                </p>
            @endforelse
        </div>
    </div>
@endsection
