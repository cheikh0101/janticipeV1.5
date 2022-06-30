@extends('template')
@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about mt-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="../assets/img/a.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>Plateforme d'apprentissage de nouvelle génération pour le monde universitaire.</h3>
                    <p class="fst-italic">
                        {{ config('app.name') }} est l'outil parfait pour les étudiants qui veulent tout avoir en un seul
                        endroit. Ne perdez plus vos
                        documents !
                        Vous pouvez conserver tous vos documents nécessaires au cours.
                    </p>
                    <ul>
                        <li><i class="fa fa-check-circle" aria-hidden="true"></i> Ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.</li>
                        <li><i class="fa fa-check-circle" aria-hidden="true"></i> Duis aute irure dolor in reprehenderit in
                            voluptate velit.
                        </li>
                        <li><i class="fa fa-check-circle" aria-hidden="true"></i> Ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis
                            aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat
                            nulla pariatur.</li>
                    </ul>
                    <p>
                        Avec {{ config('app.name') }} non seulement je valide les unités d'enseignement
                        mais aussi j'ai plus de connaissance.
                    </p>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
