@extends('layouts.master')
@section('title','LRI | Liste des thèses')
  @section('header_page')
      <h1>
        Materiels
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('theses')}}">Materiels</a></li>
      </ol>
  @endsection
@section('asidebar')
       @component('components.sidebar',['active' => 'Materiels']) @endcomponent
@endsection

@section('content')
               <ul class="nav nav-tabs">
                    <li class="nav-item active"><a  href="#categories" role="tab" data-toggle="tab"
                                    aria-selected="true">Categories</a></li>
                    <li class="nav-item"><a  href="#materiels" role="tab" data-toggle="tab"
                                    aria-selected="false">Materiels</a></li>
                    <li class="nav-item"><a  href="#affectationsMembre" role="tab" data-toggle="tab"
                                    aria-selected="false">Affectations aux membres</a></li>
                    <li class="nav-item"><a  href="#affectationsEquipes" role="tab" data-toggle="tab"
                                    aria-selected="false">Affectations aux équipes</a></li>
              </ul>
              <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="categories">
                                @component('components.compCateg') @endcomponent
                    </div>
                    <div role="tabpanel" class="tab-pane" id="materiels">
                          @component('components.compMater')
                                @endcomponent
                    </div>
                    <div role="tabpanel" class="tab-pane" id="affectationsMembre">


                          @component('components.compAffectMembre')
                                @endcomponent

                    </div>
                      <div role="tabpanel" class="tab-pane" id="affectationsEquipes">

                          @component('components.compAffectEquipe')
                                @endcomponent
                    </div>
              </div>
 @endsection

@section('scripts')
<script type="text/javascript" src="{{asset('js/categorie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/materiel.js')}}"></script>
@endsection