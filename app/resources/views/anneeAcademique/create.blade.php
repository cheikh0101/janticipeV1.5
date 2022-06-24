@extends('./layouts/app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Création d'Année Académique
                        </h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" method="POST" action=" {{ route('') }} ">
                            @csrf
                            <div class="col-md-6">
                                <label for="" class="form-label">Année Début</label>
                                <input type="date" name="" required class="form-control" id="">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Année Début</label>
                                <input type="date" name="" required class="form-control" id="">
                            </div>
                            <div class="col-md-2">
                                <label for="" class="form-label">Code</label>
                                <input type="text" name="" required class="form-control" id="">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
