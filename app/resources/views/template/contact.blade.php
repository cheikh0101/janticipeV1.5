@extends('template')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Remarques et Suggestions sont les bienvenues</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col">
                @if (isset($infoMessage))
                    @if (isset($alert))
                        <div class="alert alert-{{ $alert }}" role="alert">
                            {{ $infoMessage }}
                        </div>
                    @endif
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>
                            Formulaire de contact
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('contact/message') }} " method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="objet" class="form-label">Objet du message</label>
                                <input type="text" minlength="5" required class="form-control" name="objet"
                                    id="objet" aria-describedby="helpId" placeholder="Demande d'informations">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" required class="form-control" name="email" id="email"
                                    aria-describedby="helpId" placeholder="cheikh@gmail.com">
                                <small id="helpId" class="form-text text-muted">Adresse mail</small>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea required minlength="5" class="form-control" name="message" id="message" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer mon message <i class="fa fa-send"
                                    aria-hidden="true"></i> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 173px;"></div>
@endsection
