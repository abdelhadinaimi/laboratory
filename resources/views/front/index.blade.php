@extends('layouts.frontMaster')

@section('title','Accueil')


@section('content')
    <!-- Start Slider Section -->
    <div id="slider" class="slider-1">
        <div class="flexslider slider-wrapper">
            <ul class="slides">
                <li>
                    <div class="slider-info">
                        <h2>Bienvenue au {{$labo->nom}}</h2>
                        <p><b>{{$labo->presentationIndex}}</b></p>
                    </div>
                    <img src="{{ asset('uploads/indexWall.jpg')}}" alt="" />
                    <div class="slider-button slider-appointment">
                        <a href="/front/presentation" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect animated fadeInUp">Plus sur LRIT<i class="fa fa-external-link"></i></a>
                    </div>
                </li>
             
            </ul>
            
        </div>
    </div>
    <!-- End Slider Section -->
       <div id="hm-blog" class="layer-stretch">
        <div class="layer-wrapper layer-bottom-10">
            <div class="layer-ttl">
                <h3>Actualités récentes</h3>
            </div>
            <div class="row">
                
                @foreach($latestActs as $act)
                <div class="col-md-4">
                    <div class="blog-list-block">
                        <div class="blog-list-picture">
                            <div class="theme-img theme-img-scalerotate">
                                <img style="min-width: 300px;max-width: 300px;max-height: 200px;min-height: 200px;" src="{{asset($act->photo)}}" alt="">
                            </div>
                        </div>
                        <div class="blog-list-ttl">
                            <h3><a href="/front/actualites/{{$act->id}}/details">{{$act->titre}}</a></h3>
                        </div>
                        <div class="blog-list-meta">
                            <p>{{explode(' ',$act->created_at)[0]}}</p>
                        </div>  
                        
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="row justify-content-center">
            <a href="/front/actualites" style="border-style: solid;border-width: thin;padding: 5px;">+ Plus d'actualités</a>
            </div>
        </div>
    </div>
<!-- Start Testimonial Section -->
     
     <!-- Start Emergency Section -->
    <div id="testimonial" class="colored-background">
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl layer-ttl-white">
                    <h3>Nos publications</h3>
                </div>
                <div class="layer-container">
                    <div id="testimonial-slider" class="owl-carousel owl-theme theme-owl-dot">
                    
                       @foreach($latestArticles as $article)
                    
                        <div class="testimonial-block" style="color: white">
                            <div class="paragraph-medium paragraph-white" style="color: white">
                                <a style="color: white;font-size: 25px;" href="{{$article->detail}}">{{$article->titre}}</a>
                            </div>
                            <div class="paragraph-medium paragraph-white" style="color: white">
                                {{$article->resume}}
                            </div>
                            <div class="paragraph-medium paragraph-white" style="color: white">
                            Par 
                            @foreach($article->users as $user)
                            
                                <a style="color: white;font-size: 15px;" href="/front/profiles/{{$user->id}}">{{$user->prenom}} {{$user->name}},</a>
                            @endforeach
                                </div>

                            <p>Le {{explode(' ',$article->created_at)[0]}}</p>
                        </div>
                         
                        @endforeach
                        
                    </div>
                </div>

            </div>
            <div style="padding: 10px;" class="row justify-content-center">
            <a href="/front/publications" style="border-style: solid;border-width: thin;color: white;padding: 5px;">+ Plus de publications</a>
            </div>
        </div>
    </div>
  <div id="hm-blog" class="layer-stretch">
        <div class="layer-wrapper layer-bottom-10">
            <div class="layer-ttl">
                <h3>Nos projets</h3>
            </div>
            <div class="row justify-content-center">
                
                @foreach($projets as $projet)
                <div class="col-md-4">
                    <div class="blog-list-block">
                        <div class="blog-list-picture">
                            <div class="theme-img theme-img-scalerotate">
                                <img style="min-width: 300px;max-width: 300px;max-height: 200px;min-height: 200px;" src="{{asset($projet->photo)}}" alt="">
                            </div>
                        </div>
                        <div class="blog-list-ttl">
                            <h3><a style="font-size: 20px;" href="/front/projet/{{$projet->id}}">{{$projet->intitule}}</a></h3>
                        </div>
                        <div class="blog-list-meta">
                        </div>  
                        
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="row justify-content-center">
            <a href="/front/projets" style="border-style: solid;border-width: thin;padding: 5px;">+ Plus de projets</a>
            </div>
        </div>
    </div>

    @endsection