@extends('layouts.frontMaster')

@section('title','Présentation')
@section('content')

    @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        @yield('title')    
    @endcomponent
    <div class="layer-stretch"> 
        <div class="row layer-wrapper" style="padding: 50px;">
                        <div class="theme-material-card" style="padding: 30px;">

     
            <div class="row">
            <div class="col-md-12">
            {!! $labo->presentation !!}
            </div>
      
            </div>
 
        </div>
</div>
    </div><!-- End Blog List Section -->
@stop