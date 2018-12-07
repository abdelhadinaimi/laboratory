@extends('layouts.master')

 @section('title','LRI | Détails thèse')

@section('header_page')
    <h1>
      Thèse
      <small>Détails</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="{{url('theses')}}">Thèses</a></li>
      <li class="active">Détails</li>
    </ol>
@endsection

@section('asidebar')
      @component('components.sidebar',['active' => 'Thèses']) @endcomponent

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
                  <div class="col-md-3">
                    <strong>Titre</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $these->titre}}
                    </p>
                  </div>
                  <div class="col-md-3">
                    <strong>Sujet</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $these->sujet}}
                    </p>
                  </div>
                  
                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Présenté par</strong>
                  </div>
                  <div class="col-md-9">
                    <a href="{{url('membres/'.$these->user_id.'/details')}}">{{$these->user->name}} {{$these->user->prenom}}</a>
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Encadreur</strong>
                  </div>
                  <div class="col-md-9">
                    {{ $these->encadreur_int}}
                    {{ $these->encadreur_ext}}
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Coencadreur</strong>
                  </div>
                  <div class="col-md-9">
                    {{ $these->coencadreur_int }}
                    {{ $these->coencadreur_ext }}
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-calendar margin-r-5"></i>Date d'inscription</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $these->date_debut}}
                    </p>
                  </div>

                <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                  <strong><i class="fa fa-calendar margin-r-5"></i>Date de soutenance</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $these->date_soutenance}}
                    </p>
                  </div>

                   <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  @if($these->detail)
                   <div class="col-md-3">
                    
                  <strong><i class="fa fa-calendar margin-r-5"></i>Détails</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <a href="{{asset( $these->detail)}}">Lien fichier</a>
                    </p>
                  </div>
                  @endif
   
              
            </div>
            <!-- /.box-body -->
          </div>
          
         </div><!-- /.container -->
       </div>
      </div>
@endsection