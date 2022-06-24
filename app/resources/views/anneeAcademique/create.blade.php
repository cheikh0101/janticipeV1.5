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
                        <form class="row g-3" method="POST" action=" {{ route('anneeAcademique.store') }} ">
                            @csrf
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="annee_debut" class="form-label">Année Début</label>
                                    <select class="form-control" name="annee_debut" id="annee_debut">
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="annee_fin" class="form-label">Année Début</label>
                                <select class="form-control" name="annee_fin" id="annee_fin">
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                </select>
                            </div>
                            <div class="col-md-2">
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
