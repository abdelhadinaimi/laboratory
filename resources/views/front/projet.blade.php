@extends('layouts.frontMaster')

@section('title',$projet->intitule)

@section('content')

    @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        <a href="/front/projets">Projets</a>&#8594; @yield('title')
    @endcomponent
    <div class="layer-stretch">
        <div class="row layer-wrapper">
            <div style="width:100%;">
                <div class="theme-material-card">
                    <div class="box-body">
                    <img src="{{asset($projet->photo)}}" class="img-thumbnail centered-image" style="max-height:600px;margin-bottom:20px;"/>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Titre</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">{{ $projet->intitule }}</p>
                            </div>
                            
                        </div>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Résumé</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">{{ $projet->resume }}</p>
                            </div>
                            
                        </div>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Type</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">{{ $projet->type }}</p>
                            </div>
                        </div>
                        @if($partenaires)
                        <hr/>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Partenaires</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">
                                    @foreach($partenaires as $part)
                                    {{$part->nom . ", "}}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        @endif
                        <hr/>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Chef De Projet</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted"><a href="{{ url('front/profiles/'.$projet->chef->id)}}">{{ $projet->chef->name ." " . $projet->chef->prenom}}</a></p>
                            </div>
                        </div>
                        <hr/>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Membres</strong>
                            </div>
                            <div class="col-md-9">
                                <ul>
                                    @foreach($projet->users as $user)
                                    <li><a href="{{url('front/profiles/'.$user->id)}}">{{ $user->name . " " . $user->prenom}}</a></li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <hr/>

                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Membres Externes</strong>
                            </div>
                            <div class="col-md-9">
                                
                                    @foreach($contacts as $contact)
                                  <ul>
                                      <li>{{ $contact->nom }} {{ $contact->prenom }}</li>
                                  </ul>
                                @endforeach
                                
                            </div>
                        </div>
                        <hr/>
                        @if($projet->lien)
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Lien</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted"><a href="{{ url($projet->lien)}}">{{$projet->lien}}</a></p>
                            </div>
                        </div>
                        @endif
                        @if($projet->detail)
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Detail</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted"><a href="{{ url($projet->detail)}}">Lien Fichier</a></p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop