@extends('layouts.master')

@section('title','LRI | Modifier un actualite')

@section('header_page')

      <h1>
        Actualité
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('Actualite')}}">Actualité</a></li>
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
        
        <li class="active">
          <a  href="{{url('actualites')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Actualite</span>
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

            <form class="well form-horizontal" action=" {{url('actualites')}} " method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier actualite</b></h2></center></legend><br>

                  <div class="form-group">
                        <label class="col-xs-3 control-label">Titre (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('titre')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="titre" class="form-control" placeholder="Titre" type="text" value="{{$actualite->titre}}">
                          </div>
                        </div>
                  </div>  
                  <div class="form-group">
                        <label class="col-xs-3 control-label">Description (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('description')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="description" class="form-control" placeholder="description" type="text" value="{{$actualite->description}}">
                          </div>
                        
                        </div>
                  </div>  

                  <div class="form-group">
                      <label class="col-md-3 control-label">Contenu (*)</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('content')) has-error @endif" >
                        <div style="width: 70%">
                          <textarea name="content" class="form-control" rows="3" placeholder="Entrez ..." id="summernote">
                          	{{$actualite->content}}
                          </textarea>


                        </div>
                      </div>
                  </div>


                  <div class="form-group">
                      <label class="col-md-3 control-label">Photo</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <input name="img" type="file" value="{{asset('$actualite->photo')}}" >
                        </div>
                      </div>
                  </div>
                  

              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('actualites')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>

@endsection