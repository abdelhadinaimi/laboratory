@extends('layouts.frontMaster')

@section('title',$equipe->intitule)

@section('content')

    @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        <a href="/front/equipes">Equipes</a> &#8594;@yield('title')    
    @endcomponent
    <div id="service-page-1">
        <div class="layer-stretch">
            <div class="row layer-wrapper">
                <div class="text-center" style="width:100%;">
                    <div class="theme-material-card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" href="#description" role="tab" data-toggle="tab"
                                    aria-selected="true">Description</a></li>
                            <li class="nav-item"><a class="nav-link" href="#membres" role="tab" data-toggle="tab"
                                    aria-selected="false">Membres</a></li>
                            <li class="nav-item"><a class="nav-link" href="#projets" role="tab" data-toggle="tab"
                                    aria-selected="false">Projets</a></li>
                            <li class="nav-item"><a class="nav-link" href="#partenaires" role="tab" data-toggle="tab"
                                    aria-selected="false">Partenaires</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <div class="p-2">
                                    <h5>Description</h5>
                                    <div class="theme-img"><img src="{{ asset('uploads/'.$equipe->achronymes.'.jpg')}}" alt=""></div>
                                    <p class="font-18">{{$equipe->resume}}</p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="membres">
                                <div class="p-2">
                                    <h5>Membres de l'equipe</h5>
                                    <div class="row">
                                        <div class="col-sm-2 p-2"> 
                                            <a href="{{url('/front/profiles/'.$chef->id)}}">
                                                <img src=" {{asset($chef->photo)}}" class="img-thumbnail rounded trobon-image"/>
                                            </a>
                                            <a href="{{url('/front/profiles/'.$chef->id)}}"><p class="">{{$chef->name}} {{$chef->prenom}}</p></a>
                                            <p>Chef d'equipe</p>
                                        </div>
                                        @foreach($membres as $membre)
                                            @if($membre->id != $equipe->chef_id)
                                                <div class="col-sm-2 p-2"> 
                                                    <a href="{{url('/front/profiles/'.$membre->id)}}">
                                                        <img src=" {{asset($membre->photo)}}" class="img-thumbnail rounded trobon-image"/>
                                                    </a>
                                                    <a href="{{url('/front/profiles/'.$membre->id)}}"><p class="">{{$membre->name}} {{$membre->prenom}}</p></a>
                                                    <p>{{$membre->grade}}</p>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>  
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="projets">
                                <div class="p-2">
                                    <h5>Projets</h5>
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

                            <div role="tabpanel" class="tab-pane" id="partenaires">
                                <div class="p-2">
                                    <h5>Partenaires</h5>
                                    <div class="row">
                                        @foreach($partenaires as $partenaire)
                                                <div class="col-sm-4 p-2"> 
                                                    <img src="{{asset($partenaire->photo)}}" class="img-thumbnail trobon-image"/>
                                                    <p class="font-18">{{$partenaire->nom}}</p>
                                                    
                                                </div>
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