@extends('layouts.frontMaster')

@section('title','Equipes de recherche')


@section('content')
        <div class="page-ttl">
        <div class="layer-stretch">
            <div class="page-ttl-container">
                <h1>@yield('title')</h1>
                <p><a href="#">Accueil</a> &#8594; <span>@yield('title')</span></p>
            </div>
        </div>
    </div><!-- End Page Title Section -->
   <div id="service-page" class="layer-stretch">
        <div class="layer-wrapper text-center">
            <div class="row">
            
            @foreach($equipes as $equipe)
                <div class="col-md-6 col-lg-4">
                    <div class="theme-block theme-block-hover">
                        <div class="theme-block-picture">
                            <img src="{{ asset('uploads/'.$equipe->achronymes.'.jpg')}}" alt="">
                        </div>
                        <div class="theme-block-data service-block-data">
                            <div class="service-icon"><i class="fa fa-book"></i></div>
                            <h4><a href="{{ url('front/equipes/'.$equipe->id)}}">{{$equipe->intitule}}</a></h4>
                            <p class="paragraph-small paragraph-black service-description">
                                <span>{{ str_limit($equipe->resume, $limit = 150, $end = '...') }}</span>
                                <a href="{{ url('front/equipes/'.$equipe->id)}}">(Read More)</a>
                            </p>
                        </div>
                    </div>
                </div>            
            @endforeach
            </div>
        </div>
    </div><!-- End Service List Section -->


@endsection