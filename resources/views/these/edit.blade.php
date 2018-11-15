@extends('layouts.master')

@section('title','LRI | Modifier une thèse')

@section('header_page')
      <h1>
        Thèses
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('theses')}}">Thèse</a></li>
        <li class="active">Modifier</li>
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
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>
         <li class="active">
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

 

 <div class="row">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action="{{url('theses/'. $these->id) }}" method="post"  id="contact_form" >
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier thèse</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Titre</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('titre')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="titre" class="form-control" placeholder="Titre" type="text" value="{{ $these->titre}}">
                            <span class="help-block">
                                @if($errors->get('titre'))
                                  @foreach($errors->get('titre') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>  

                  <div class="form-group">
                      <label class="col-md-3 control-label">Sujet</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('sujet')) has-error @endif">
                        <div style="width: 70%">
                          <textarea name="sujet" class="form-control" rows="3" placeholder="Entrez ...">{{ $these->sujet}}
                          </textarea>
                          <span class="help-block">
                                @if($errors->get('sujet'))
                                  @foreach($errors->get('sujet') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Présenté par</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('user_id')) has-error @endif">
                          <div style="width: 70%">
                            <select name="user_id" class="form-control select2" >
                              <option value="{{$these->user->id}}">{{$these->user->name}} {{$these->user->prenom}}</option>
                              @foreach($membres as $membre)
                              <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
                               @endforeach
                            </select>
                            <span class="help-block">
                                @if($errors->get('user_id'))
                                  @foreach($errors->get('user_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>  

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Encadreur (membre interne)</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <select name="encadreur_int" class="form-control select2">
                              <option>{{$these->encadreur_int}}</option>
                              @foreach($membres as $membre)
                              <option value="{{$membre->name}} {{$membre->prenom}}">{{$membre->name}} {{$membre->prenom}}</option>
                               @endforeach
                            </select>
                          </div>
                        </div>
                  </div> 

                   <div class="form-group ">
                        <label class="col-xs-3 control-label">Encadreur externe</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input name="encadreur_ext" name="titre" class="form-control" placeholder="Nom" type="text" value="{{ $these->encadreur_ext}}">
                          </div>
                        </div>
                  </div> 

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">CoEncadreur (membre interne)</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <select name="coencadreur_int" class="form-control select2">
                              <option>{{$these->encadreur_ext}}</option>
                              @foreach($membres as $membre)
                              <option value="{{$membre->name}} {{$membre->prenom}}">{{$membre->name}} {{$membre->prenom}}</option>
                               @endforeach
                            </select>
                          </div>
                        </div>
                  </div> 
                  <div class="form-group ">
                        <label class="col-xs-3 control-label">CoEncadreur externe</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input name="coencadreur_ext" class="form-control" placeholder="Nom" type="text" value="{{ $these->coencadreur_ext }}">
                          </div>
                        </div>
                  </div>

                   <div class="form-group ">
                        <label class="col-xs-3 control-label">Date d'inscription</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('date_debut')) has-error @endif"">
                          <div style="width: 70%">
                            <input name="date_debut" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{ $these->date_debut}}">
                            <span class="help-block">
                                @if($errors->get('date_debut'))
                                  @foreach($errors->get('date_debut') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>

                   <div class="form-group ">
                        <label class="col-xs-3 control-label">Date de soutenance</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input name="date_soutenance" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{ $these->date_soutenance}}">
                          </div>
                        </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label">Détails</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <input type="file" id="exampleInputFile" value="{{asset('$these->detail') }}">
                        </div>
                      </div>
                  </div>

              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('theses')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>

@endsection

 