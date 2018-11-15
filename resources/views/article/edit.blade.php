@extends('layouts.master')

@section('title','LRI | Modifier un article')

@section('header_page')
	<h1>
        Articles
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('articles')}}">Articles</a></li>
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
            <li ><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li class="active"><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>
      
         <li class="active">
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


    <div class="row" style="padding-top: 30px">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action=" {{url('articles/'. $article->id) }}" method="post"  id="contact_form">
              <input type="hidden" name="_method" value="PUT">
            	{{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier article</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Titre</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="titre" class="form-control" type="text" value="{{ $article->titre }}">
                          </div>
                        </div>
                  </div>  

                  <div class="form-group">
                      <label class="col-md-3 control-label">Résumé</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <textarea name="resume" class="form-control" rows="3">{{ $article->resume }}</textarea>
                        </div>
                      </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Type</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <select name="type" class="form-control select">
                              <option>{{ $article->type }}</option>
                              <option>Poster</option>
                              <option>Article court</option>
                              <option>Article long</option>
                              <option>Publication(Revue)</option>
                              <option>Chapitre d'un livre</option>
                              <option>Livre</option>
                              <option>Brevet</option>
                            </select>
                          </div>
                        </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Membres</label>
                    <div class="col-md-9 inputGroupContainer">
                      <div style="width: 70%">
                        <select name="membre[]" class="form-control select2" multiple="multiple" data-placeholder="Selectionnez les Membres Internes">
                          <option>
                             @foreach ($article->users as $user) 
                              <option value="{{$user->id}}" selected>
                                  {{ $user->name }} {{ $user->prenom }}
                              </option>
                            @endforeach
                          </option>
                         @foreach($membres as $membre)
                              <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                   

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Ville</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="ville" class="form-control" value="{{ $article->lieu_ville }}" type="text" >
                          </div>
                        </div>
                  </div> 

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Pays</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="pays" class="form-control" value="{{ $article->lieu_pays }}" type="text">
                          </div>
                        </div>
                  </div> 


                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Nom de la conférence</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="conference" class="form-control" type="text" value="{{ $article->conference }}">
                          </div>
                        </div>
                  </div> 

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Nom du journal</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="journal" class="form-control"  value="{{ $article->journal }}"type="text">
                          </div>
                        </div>
                  </div> 

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">ISSN</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="issn" class="form-control" value="{{ $article->ISSN }}" type="numbers">
                          </div>
                        </div>
                  </div> 

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">ISBN</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="isbn" value="{{ $article->ISBN }}" class="form-control" type="numbers">
                          </div>
                        </div>
                  </div> 

                   <div class="form-group ">
                        <label class="col-xs-3 control-label">Mois</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input type="text" name="mois" value="{{ $article->mois }}" class="form-control pull-right">
                          </div>
                        </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Année</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input type="text" name="annee" value="{{ $article->annee }}" class="form-control pull-right">
                          </div>
                        </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">DOI</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="doi"  value="{{ $article->doi }}" class="form-control" placeholder="URL" type="text">
                          </div>
                        </div>
                  </div> 

                  <div class="form-group">
                      <label class="col-md-3 control-label">Détails</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <input name="detail" type="file" id="exampleInputFile" value="{{asset('$article->detail')}}">
                        </div>
                      </div>
                  </div>
                  

              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{ url('articles')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>


@endsection