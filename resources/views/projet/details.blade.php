@extends('layouts.master')

 @section('title','LRI | Détails projet')

@section('header_page')
      <h1>
        Projet
        <small>Détails</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('projets')}}">Projets</a></li>
        <li class="active">Détails</li>
      </ol>
@endsection

@section('asidebar')
<li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li ><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>

         <li>
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>

       
        <li class=" active">
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>

        @if(Auth::user()->role->nom == 'admin' )

          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
          @endif
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
                <div class="row container">
                  <div class="col-md-3">
                    <strong>Titre</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$projet->intitule}}

                    </p>
                  </div>
                </div>
                <div class="row container">
                  <div class="col-md-3">
                    <strong>Résumé</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                     {{$projet->resume}}
                    </p>
                  </div>
                </div>
                <div class="row container">
                  <div class="col-md-3">
                    <strong>Type</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$projet->type}}
                    </p>
                  </div>
                </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-group  margin-r-5"></i>Partenaires</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$projet->partenaires}}
                    </p>
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-user  margin-r-5"></i>Chef du projet</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="{{url('membres/'.$projet->chef_id.'/details')}}">{{$projet->chef->name}} {{$projet->chef->prenom}}</a>
                  </div>

                <strong><i class="margin-r-5"></i></strong>
                  <hr>

                <div class="col-md-3">
                  <strong><i class="fa fa-group  margin-r-5"></i>Membres du projet</strong>                
                 </div>
                  <div class="col-md-9">
                    @foreach($membres as $membre)
                    <ul>
                        <li><a href="{{url('membres/'.$membre->id.'/details')}}">{{ $membre->name }} {{ $membre->prenom }}</a></li>
                    </ul>
                    @endforeach

                  </div>  

                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                @if($projet->lien)
                <div class="row">
                <div class="col-md-3">
                  <strong><i class="fa fa-link  margin-r-5"></i>Lien</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="#">{{$projet->lien}}</a>
                  </div> 
                </div> 
                @endif
                @if($projet->detail)
                <div class="row" style="margin-top: 10px">
                <div class="col-md-3">
                  <strong><i class="fa fa-link  margin-r-5"></i>Details</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="{{asset($projet->detail)}}">Lien fichier</a>
                  </div> 
                </div> 
                @endif
              
              
            <!-- /.box-body -->
            </div>
          
         </div><!-- /.container -->
      </div>
</div>
@endsection