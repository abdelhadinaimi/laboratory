@extends('layouts.frontMaster')

@section('title','Contact')

@section('content')

    @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        @yield('title')    
    @endcomponent
    <div class="layer-stretch">
        <div class="row layer-wrapper">
            <div style="width:100%;">
                <div class="theme-material-card">
                    <div class="box-body">
                        <div class="row container">
                            <div class="col-md-3">
                                <strong><i class="fa fa-phone"></i>  Telephone</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">+213 43 34 43 34</p>
                            </div>
                        </div>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong><i class="fa fa-phone"></i>  Fax</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">+213 43 34 43 34</p>
                            </div>
                        </div>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong><i class="fa fa-envelope-o"></i>  E-Mail</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted"><a href="mailto:lrit@univ-tlemcen.dz">lrit@univ-tlemcen.dz</a></p>
                            </div>
                        </div>
                        <div class="row container">
                            <div class="col-md-3">
                                <strong><i class="fa fa-home"></i>  Address</strong>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">Université de Tlemcen Rue Luis Pasteur, Rocade(Nouveau pole), Tlemcen, Algérie </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection