@extends('./layouts/app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Création d'un ue
                        </h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" method="POST" action=" {{ route('ue.store') }} ">
                            @csrf
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" name="nom" required class="form-control" id="nom">
                            </div>
                            <div class="col-md-6">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" name="code" required class="form-control" id="code">
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
