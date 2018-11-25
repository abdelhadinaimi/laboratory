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
                                    <h2>Description</h2>
                                    <div class="theme-img"><img src="{{ asset('uploads/'.$equipe->achronymes.'.jpg')}}" alt=""></div>
                                    <p class="font-18">{{$equipe->resume}}</p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="membres">
                                <div class="p-2">
                                    <h2>Membres de l'equipe</h2>
                                    <h3>Chef d'équipe</h3>
                                   
                                    <div class="p-2"> 
                                        <a href="{{url('/front/profiles/'.$chef->id)}}">
                                            <img src="{{asset($chef->photo)}}" class="rounded-circle trobon-image"/>
                                        </a>
                                        <a href="{{url('/front/profiles/'.$chef->id)}}"><h4>{{$chef->name}} {{$chef->prenom}}</h4></a>
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
                                <div class="p-2" style="min-width: 80vw;">
                                    <h2>Projets</h2>
                                    <div class="row">
                                        @foreach ($projets as $projet)                                         
                                            @component('components.projet',[
                                                'projet' => $projet,
                                                'size' => 4
                                                ])
                                            @endcomponent
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection