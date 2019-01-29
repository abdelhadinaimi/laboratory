@extends('layouts.master')

@section('title','LRI | Ajouter une équipe')

@section('header_page')

      <h1>
        Thèses
        <small>Nouvelle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('equipes')}}">Equipes</a></li>
        <li class="active">Ajouter</li>
      </ol>

@endsection

@section('asidebar')
  @component('components.sidebar',['active' => 'Equipes']) @endcomponent
  @endsection
@section('content')

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action=" {{url('equipes')}} " method="post"  id="contact_form">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouvelle équipe</b></h2></center></legend><br>

                  <div class="form-group">
                        <label class="col-xs-3 control-label">Intitulé (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('intitule')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="intitule" class="form-control" placeholder="intitule" type="text" value="{{old('titre')}}">
                              <span class="help-block">
                                @if($errors->get('intitule'))
                                  @foreach($errors->get('intitule') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                              
                          </div>
                        </div>
                  </div>  

                  <div class="form-group">
                      <label class="col-md-3 control-label">Achronymes</label>
                      <div class="col-md-9 inputGroupContainer" >
                        <div style="width: 70%">
                          <input  name="achronymes" class="form-control" placeholder="intitule" type="text" value="{{old('achronymes')}}">
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label">Résumé (*)</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('resume')) has-error @endif" >
                        <div style="width: 70%">
                          <textarea name="resume" class="form-control" rows="3" placeholder="Entrez ...">{{old('resume')}}</textarea>

                            <span class="help-block">
                                @if($errors->get('resume'))
                                  @foreach($errors->get('resume') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                        </div>
                      </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Chef de l'équipe (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('chef_id')) has-error @endif">
                          <div style="width: 70%">
                            <select name="chef_id" class="form-control select2">
                              <option></option>
                               @foreach($membres as $membre)
                              <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
                               @endforeach
                            </select>

                            <span class="help-block">
                                @if($errors->get('chef_id'))
                                  @foreach($errors->get('chef_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>  

                 <div class="form-group">
                      <label class="col-md-3 control-label">Axes de recherche</label>
                      <div class="col-md-9 inputGroupContainer" >
                        <div style="width: 70%">
                          <textarea name="axes_recherche" class="form-control" rows="3" placeholder="Entrez ...">{{old('axes_recherche')}}</textarea>
                        </div>
                      </div>
                  </div>
                  

              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('equipes')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>

@endsection