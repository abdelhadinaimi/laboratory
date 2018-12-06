@extends('layouts.frontMaster')

@section('title','' . e($actualite->titre) . ' détails')

@section('content')
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