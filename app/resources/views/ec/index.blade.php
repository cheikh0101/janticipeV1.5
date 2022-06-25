@extends('./layouts/app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <a href=" {{ route('ec.create') }} " class="btn btn-primary"> <i class="fa fa-plus-circle"
                        aria-hidden="true"></i> Nouveau
                    ec</a>
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
                        @forelse ($ecs as $ec)
                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td class="text-center">{{ $ec->nom }}</td>
                                <td class="text-center">{{ $ec->code }}</td>
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
                                Aucun ec
                            </p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
