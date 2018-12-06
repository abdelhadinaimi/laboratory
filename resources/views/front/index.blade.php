@extends('layouts.frontMaster')

@section('title','Accueil')


@section('content')
    <!-- Start Slider Section -->
    <div id="slider" class="slider-1">
        <div class="flexslider slider-wrapper">
            <ul class="slides">     
                <li>
                    <div class="slider-info">
                        <h1 class="animated fadeInDown">Bienvenue au LRIT</h1>
                        <p class="animated fadeInDown">Le laboratoire de Recherche en Informatique de Tlemcen (LRIT), agréé en Novembre 2014, est un laboratoire de recherche en informatique se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications, ainsi qu'à la mise en œuvre et la validation des solutions au travers de partenariats académiques comme les laboratoires de Génie biomédical, de Télécommunications et d’Automatique.</p>
                    </div>
                    <div class="slider-backgroung-image" style="background-image: url(uploads/slide.jpg);"></div>

                <li>
                    <div class="slider-info">
                        <h2>Laboratoire de Recherche en Informatique de Tlemcen</h2>
                        <p>Le laboratoire de recherche est doté d'un conseil de laboratoire chargé d`élaborer des programmes et d'établir des états prévisionnels des recettes et des dépenses  présentés par le directeur du laboratoire. Il est doté de l'autonomie de gestion et soumis au contrôle financier à posteriori. Il est financé par les subventions du FNRSDT. Le laboratoire de recherche peut trouver ses propres sources de financement, dans le respect de la réglementation, en rapport avec ses activités de recherche par la conclusion de contrats de prestation de service avec des tiers.</p>
                    </div>
                    <div class="slider-backgroung-image" style="background-image: url(uploads/slide-2.jpg);"></div>

                </li>
                <li>
                    <div class="slider-info">
                        <h2>Laboratoire de Recherche en Informatique de Tlemcen</h2>
                        <p>laboratoire de recherche peut trouver ses propres sources de financement, dans le respect de la réglementation, en rapport</p>
                    </div>
                    <div class="slider-backgroung-image" style="background-image: url(uploads/slide-2.jpg);"></div>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Slider Section -->
 <div class="colored-background">
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl layer-ttl-white">
                    <!-- latest actualité-->
                    <h3>Actualité</h3>
                </div>
                  <div class="layer-container">
                    <div id="hm-doctor-slider" class="owl-carousel owl-theme theme-owl-dot">
                        @foreach($latestActs as $latestAct)
                        <div class="hm-doctor">
                            <img class="img-responsive" src="{{asset($latestAct->photo)}}" alt="">
                            <h6>{{$latestAct->titre}}</h6>
                            <p>{{$latestAct->description}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <a class="pull-right" id="layer-suite" href="{{url('front/actualites')}}"><h3>Lire la suite</h3></a>
            </div>
        </div>
    </div>
<!-- Start Testimonial Section -->
    <div id="testimonial" >
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl layer-ttl-white">
                    <!-- latest projects-->
                    <h3>Projects</h3>
                </div>
                <div class="layer-container">
                    <div id="testimonial-slider" class="owl-carousel owl-theme theme-owl-dot">
                    	@foreach($projets as $projet)
                        <div class="testimonial-block">
                            <h1>{{$projet->type}}</h1>
                            <div class="paragraph-medium paragraph-white">
                                <i class="fa fa-quote-left"></i>
                               {{$projet->resume}}
                            </div>
                           <h3>par <a>{{$projet->name}} {{$projet->prenom}}</a></h3>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Testimonial Section -->

    @endsection