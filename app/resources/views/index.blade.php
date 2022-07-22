@extends('template')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Apprendre aujourd'hui,<br>Apprendre demain</h1>
            <h2>Tous mes cours en un seul endroit</h2>
            <a href="/guest/cours" class="btn-get-started">Mes Cours <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Pourquoi choisir {{ config('app.name') }}?</h3>
                            <p>
                                Avez-vous déjà voulu anticiper sur certains cours sans avoir les supports?
                                Avez-vous déjà voulu revoir vos cours des années passées et il s'avère que vous avez perdu
                                les documents?
                                Avec {{ config('app.name') }}, tout ceci est désormais possible.
                            </p>
                            <div class="text-center">
                                <a href="/about" class="more-btn">PLUS <i class="fa fa-angle-right"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fa fa-recycle" aria-hidden="true"></i>
                                        <h4>Organiser</h4>
                                        <p>Spécialité, Niveau, Cours... ont été pris en compte</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fa fa-recycle" aria-hidden="true"></i>
                                        <h4>Simple</h4>
                                        <p>En quelques clics seulement nous obtenons le document dont on a besoin</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fa fa-recycle" aria-hidden="true"></i>
                                        <h4>Fiable</h4>
                                        <p>Documents publiés par les responsables de classe
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts mb-4">
            <div class="container">
                <div class="row counters">
                    <div class="col-lg-3 col-6 text-center">
                        <span>{{ $specialite ?? '' }}</span>
                        <h4>Spécialités</h4>
                    </div>
                    <div class="col-lg-3 col-6 text-center">
                        <span>{{ $classe }}</span>
                        <h4>Classes</h4>
                    </div>
                    <div class="col-lg-3 col-6 text-center">
                        <span> {{ $cm }} </span>
                        <h4>CM</h4>
                    </div>
                    <div class="col-lg-3 col-6 text-center">
                        <span>{{ $examens }}</span>
                        <h4>Examens</h4>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->
    </main>

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 footer-contact">
                        <h3>{{ config('app.name') }}</h3>
                        <a name="" id="" class="btn btn-primary" href="/contact" role="button">Nous
                            écrire <i class="fa fa-file-text" aria-hidden="true"></i> </a>
                    </div>
                    <div class="col-md-9 footer-newsletter">
                        <h4>Boite à lettres</h4>
                        <p>
                            Pour être informer de toutes nouveautés merci de renseigner votre email
                        </p>
                        <form action=" {{ route('new-email') }} " method="post">
                            @csrf
                            <input type="email" name="email" placeholder="janticipe0101@gmail.com"
                                @error('email') is-invalid @enderror" required><input type="submit" value="S'inscrire">
                        </form>
                        @error('email')
                            <small id="helpId" class="form-text text-danger"> {{ $errors->first('email') }}
                            </small>
                        @enderror
                        @if (isset($infoMessage))
                            <p class="alert alert-{{ $alert }}">
                                {{ $infoMessage }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
