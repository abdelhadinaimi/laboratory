
@extends('layouts.master')

@section('title','LRI | Trombinoscope')

@section('header_page')
    <h1>
        Membres
        <small>Trombinoscope</small>
   </h1>
       <ol class="breadcrumb">
          <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{url('membres')}}">Membres</a></li>
          <li class="active">Trombinoscope</li>
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
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
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

        
        <li>
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

    
                <legend><center><h2><b>TROMBINOSCOPE</b></h2></center></legend><br>
    <div class="row">
      <div class="col-md-12">
        <div style="padding-top: 30px">

         @foreach($membres as $membre)
            <div class="col-md-2 col-sm-4 col-xs-6" style="padding-top: 30px;" >
              
               <a href="{{url('membres/'.$membre->id.'/details')}}">
                <img style="height: 200px width:200px; " class="img-thumbnail img-responsive img-circle" src="{{asset($membre->photo)}}" alt="User profile picture" title="{{($membre->name)}} {{($membre->prenom)}}"></a>
              
            </div>
        @endforeach
            
        </div>
      </div> 
    </div>
    @endsection
