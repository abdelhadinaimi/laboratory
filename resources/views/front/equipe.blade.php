@extends('layouts.frontMaster')

@section('title',$equipe->intitule)

@section('content')

    @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        @yield('title')    
    @endcomponent
    <div id="service-page-1">
        <div class="layer-stretch">
            <div class="row layer-wrapper">
                <div class="text-center">
                    <div class="theme-material-card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" href="#description" role="tab" data-toggle="tab"
                                    aria-selected="true">Description</a></li>
                            <li class="nav-item"><a class="nav-link" href="#membres" role="tab" data-toggle="tab"
                                    aria-selected="false">Membres</a></li>
                            <li class="nav-item"><a class="nav-link" href="#projets" role="tab" data-toggle="tab"
                                    aria-selected="false">Projets</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <div class="p-2">
                                    <h1>Description</h1>
                                    <div class="theme-img"><img src="{{ asset('uploads/'.$equipe->achronymes.'.jpg')}}" alt=""></div>
                                    <p class="font-18">{{$equipe->resume}}</p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="membres">
                                <div class="p-2">
                                    <h1>Membres de l'equipe</h1>
                                    <h2>Chef d'équipe</h2>
                                   
                                    <div class="p-2"> 
                                        <a href="{{url('/front/profiles/'.$chef->id)}}">
                                            <img src="{{asset($chef->photo)}}" class="rounded-circle trobon-image"/>
                                        </a>
                                        <a href="{{url('/front/profiles/'.$equipe->id)}}"><h4>{{$chef->name}} {{$chef->prenom}}</h4></a>
                                    </div>

                                    <h3>Chercheurs</h3>
                                    <div class="row">
                                        @foreach($membres as $membre)
                                            @if($membre->id != $equipe->chef_id)
                                                <div class="col-md-6 col-lg-4 p-2"> 
                                                    <a href="{{url('/front/profiles/'.$membre->id)}}">
                                                        <img src=" {{asset($membre->photo)}}" class="rounded-circle trobon-image"/>
                                                    </a>
                                                    <a href="{{url('/front/profiles/'.$membre->id)}}"><h4>{{$membre->name}} {{$membre->prenom}}</h4></a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                        
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="projets">
                                <div class="p-2">
                                    <h5>Projets</h5>
                                    <p class="font-14">Natus aspernatur ut totam quis et, repellat maiores voluptas
                                        dolore sed aliquam delectus doloremque atque dolorum accusantium a. Officia
                                        neque quas error veritatis sed, id earum voluptas! Ea, eum, ratione!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection