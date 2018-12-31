 @extends('layouts.master')

 @section('title','LRI | Détails actualites')

@section('header_page')
 	<h1>
    Actualite
    <small>Détails</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="{{url('actualite')}}">Actualite</a></li>
    <li class="active">Détails</li>
  </ol>
@endsection

@section('asidebar')
@component('components.sidebar',['active' => 'Actualites']) @endcomponent
@endsection

@section('content')
<div class="row">
      <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                    <strong>Titre</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$actualite->titre}}
                    </p>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Résumé</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $actualite->description }}
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <strong>content</strong>
                  </div>
                  <div class="col-md-9" style="
    border: 2px solid #3c8dbc;
">

                      {!! $actualite->content !!}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
