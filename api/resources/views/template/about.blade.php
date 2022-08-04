@extends('template')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Tout ce qu'il faut savoir</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about mt-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="../assets/img/b.jpg" class="img-fluid" alt="">
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
                        <li><i class="fa fa-check-circle" aria-hidden="true"></i> Organiser: Les ressources dans le domaine
                            de l'enseignement supérieur sont nombreuses.
                            Pour une meilleure navigabilité nous avons regrouper les documents en fonction des spécialités
                            de chaque apprenant tout en prenant compte du niveau d'étude. De plus pour chaque document lui
                            correspond un type, exemple cours magistral.</li>
                        <li><i class="fa fa-check-circle" aria-hidden="true"></i> Simple: Entre les cours et les td
                            l'apprenant n'a pas de temps à perdre. Raison pour laquelle
                            nous avons simplifiée la plateforme au maximum histoire d'offrir une meilleure navigabilité. Si
                            toutes fois vous avez des suggestions ou remarques,
                            <a href="/contact">veuillez nous contacter</a>.
                        </li>
                        <li><i class="fa fa-check-circle" aria-hidden="true"></i> Fiable: Nous avons porté le choix sur les
                            responsables de classe
                            afin de fournir les documents. Tout ceci pour vous permettre d'avoir les documents qui sont en
                            phase avec votre programme.</li>
                    </ul>
                    <p>
                        Avec {{ config('app.name') }} non seulement je valide les unités d'enseignement
                        mais aussi j'ai plus de connaissances.
                    </p>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
