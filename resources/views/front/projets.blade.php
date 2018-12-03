@extends('layouts.frontMaster')

@section('title','Projets')
<!-- Affiche moi toutes Les publications -->
@section('content')

    @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        @yield('title')    
    @endcomponent
    <div class="layer-stretch">
        <div class="row layer-wrapper">
            <div class="text-center">
                <div class="theme-material-card">
                    <div class="row">
                        @foreach ($projets as $projet)                                         
                            @component('components.projet',[
                                'projet' => $projet,
                                    'size' => 4
                                ])
                            @endcomponent
                        @endforeach
                    </div>
                    {{$projets->links('vendor.pagination.default')}}
                </div>
            </div>
        </div>
    </div><!-- End Blog List Section -->
@stop