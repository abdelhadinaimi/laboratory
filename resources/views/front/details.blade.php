@extends('layouts.frontMaster')

@section('title','' . e($actualite->titre) . ' détails')

@section('content')
   <div class="page-ttl">
        <div class="layer-stretch">
            <div class="page-ttl-container">
                <h1>{{$actualite->titre}}</h1>
                <p><a href="/front">Home</a> &#8594; <a href="/front/actualites">Actualité</a> &#8594; <span>{{$actualite->titre}}</span></p>
            </div>
        </div>
    </div>
<div id="service-page-1">
        <div class="layer-stretch">
            <div class="row layer-wrapper">
                <div class="col-lg-12 text-center">
                    <div class="theme-material-card">
                        <div class="service-post">
                        	<div>{!!$actualite->content!!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection