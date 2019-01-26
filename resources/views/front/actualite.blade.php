@extends('layouts.frontMaster')

@section('title','Actualite')

@section('content')
   @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        @yield('title')    
    @endcomponent
  <!-- Start Blog List Section -->
    <div class="layer-stretch">
        <div class="layer-wrapper">
            <div class="row">
                <div class="col-lg-8 text-center">
                            <!-- // -->
                            @foreach($actualites as $actualite)
                                 @component('components.actualite',[
                                'actualite' => $actualite])
                                 @endcomponent
                            @endforeach

                 {{$actualites->links('vendor.pagination.default')}}
                </div>
                <div class="col-lg-4">
                    <div class="theme-material-card text-center">
                    <form action="" method="GET">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                            <input class="mdl-textfield__input" type="text" id="sidebar-search" name="term">
                            <label class="mdl-textfield__label" for="sidebar-search">Rechercher</label>
                            <button class="fa fa-search search-button"></button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div><!-- End Blog List Section -->
    </div>
@endsection