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

          <h3 style="width: 100%;text-align: center;">Laboratoire de recherche en Informatique de Tlemcen [LRIT]</h3>
          <div class="row layer-wrapper">
                      <div class="col-md-12">
                                      <img style="width:100%;height: 100%;" class="img-fluid img-thumbnail" src="{{asset('/labo3.jpg')}}">

                      </div>

          </div>
            <div class="row">
            <div class="col-md-8">
            <h5>
            Le laboratoire de Recherche en Informatique de Tlemcen (LRIT), agréé en Novembre 2014, est un laboratoire de recherche en informatique se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications, ainsi qu'à la mise en œuvre et la validation des solutions au travers de partenariats académiques comme les laboratoires de Génie biomédical, de Télécommunications et d’Automatique.
            Le laboratoire de Recherche en Informatique de Tlemcen (LRIT), agréé en Novembre 2014, est un laboratoire de recherche en informatique se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications, ainsi qu'à la mise en œuvre et la validation des solutions au travers de partenariats académiques comme les laboratoires de Génie biomédical, de Télécommunications et d’Automatique.Le laboratoire de Recherche en Informatique de Tlemcen (LRIT), agréé en Novembre 2014, est un laboratoire de recherche en informatique se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications, ainsi qu'à la mise en œuvre et la validation des solutions au travers de partenariats académiques comme les laboratoires de Génie biomédical, de Télécommunications.
             </h5>
            </div>
            <div class="col-md-4">
                <img class="img-thumbnail" src="{{asset('/labo2.jpg')}}">
                <img class="img-thumbnail" src="{{asset('/labo6.jpg')}}">

            </div>
            </div>
            <div class="row">
            <div class="col-md-8">
                <img class="img-fluid img-thumbnail" src="{{asset('/labo5.jpg')}}">
            </div>
            <div class="col-md-4">
            <h5>
            Le laboratoire de Recherche en Informatique de Tlemcen (LRIT), agréé en Novembre 2014, est un laboratoire de recherche en informatique se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications, ainsi qu'à la mise en œuvre et la validation des solutions au travers de partenariats académiques comme les laboratoires de Génie biomédical.</h5>
            </div>
            
            </div>
        </div>
</div>
    </div><!-- End Blog List Section -->
@stop