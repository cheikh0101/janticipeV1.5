@extends('./template')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Cours en libre accès</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col col-lg-6 col-md-6">
                <form action="/guest/cours/search" method="post" autocomplete="on">
                    @csrf
                    <div class="mb-3">
                        <label for="motCle" class="form-label">Rechercher un cours</label>
                        <input type="text" class="form-control" name="motCle" id="motCle" aria-describedby="helpId"
                            placeholder="ex: algorithme">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @forelse ($cours as $cour)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <h5 class="card-header">{{ $cour->name }}</h5>
                        <div class="card-body">
                            <h5 class="card-title">{{ $cour->classe->niveau->libelle }}</h5>
                            <p class="card-text">
                                Spécialité: {{ $cour->classe->specialite->libelle }}
                            </p>
                            <a href="/guest/cours/details" class="btn btn-primary">PLUS <i class="fa fa-angle-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <p>
                    Aucun cours disponible
                </p>
            @endforelse
            {{ $cours->links() }}
        </div>
    </div>
@endsection
