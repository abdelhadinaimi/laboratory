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
            <div class="text-center" style="width:100%;">
                <div class="theme-material-card">
                    <div class="box-body">
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
                        <hr/>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Partenaires</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">{{ $projet->partenaires }}</p>
                            </div>
                        </div>
                        <hr/>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Chef De Projet</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">{{ $projet->chef->name ." " . $projet->chef->prenom}}</p>
                            </div>
                        </div>
                        <hr/>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong>Membres</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">{{ $projet->type }}</p>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">{{ $projet->type }}</p>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">{{ $projet->type }}</p>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop