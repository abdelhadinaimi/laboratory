@extends('layouts.frontMaster')

@section('title','Equipes De Recherche')

@section('content')

    @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        @yield('title')    
    @endcomponent

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