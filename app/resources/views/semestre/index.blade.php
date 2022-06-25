@extends('./layouts/app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <a href=" {{ route('semestre.create') }} " class="btn btn-primary"> <i class="fa fa-plus-circle"
                        aria-hidden="true"></i> Nouveau
                    semestre</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Nom</th>
                            <th scope="col" class="text-center">Code</th>
                            <th scope="col" colspan="3" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="d-none">
                            {{ $i = 1 }}
                        </div>
                        @forelse ($semestres as $semestre)
                            <tr>
                                <th scope="row" class="text-center">{{ $i++ }}</th>
                                <td class="text-center">{{ $semestre->nom }}</td>
                                <td class="text-center">{{ $semestre->code }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary"> <i class="fa fa-eye"
                                            aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-warning"> <i class="fa fa-pencil"
                                            aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-danger"> <i class="fa fa-trash"
                                            aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <p>
                                Aucun semestre
                            </p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
