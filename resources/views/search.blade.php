@extends('layouts.master')

@section('title','LRI | Resultat de la recherche')

@section('header_page')
    <h1>
        Recherche
   </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
@endsection

@section('asidebar')
  <li class="active" >
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
        
        <li >
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        
      
          @if(Auth::user()->role->nom == 'admin' )

          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètre</span></a>
          </li>
          @endif
          
@endsection
@section('content')
 <div class="row">
      <div class="col-xs-12">
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
            <div class="box-header col-xs-9">
              <h2 class="box-title">Le résultat de la rechereche</h2>
            </div>
          </div>
          </div>
            <!-- /.box-header -->
        <div class="box-body">
              
          @if(count($equipes) > 0)
            @if(isset($equipes))
              <h3>Equipes:</h3><br>
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Achronyme</th>
                  <th>inttitulé</th>
                  <th>Chef</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($equipes  as $equipe)
                  <tr>
                    <td>{{$equipe->achronymes}}</td>
                    <td>{{$equipe->intitule}}</td>
                    <td><a href="{{url('membres/'.$equipe->chef_id.'/details')}}">{{$equipe->chef->name}} {{$equipe->chef->prenom}}</a></td>
                    <td>
                      <div class="btn-group">
                       
                            <a href="{{ url('equipes/'.$equipe->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>
                         
                      </div>
                    </td>
                  </tr>
                  @endforeach
                   
                </tbody>
                <tfoot>
                <tr>
                  <th>Achronyme</th>
                  <th>inttitulé</th>
                  <th>Chef</th>
                  <th>Action</th>
                  
                </tr>
                </tfoot>
              </table>
            @endif
          @endif

          @if(count($membres) > 0)
            @if(isset($membres))

            <h3>Membres:</h3><br>
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Grade</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($membres  as $membre)
                  <tr>
                    <td>{{$membre->name}}</td>
                    <td>{{$membre->prenom}}</td>
                    <td>{{$membre->email}}</td>
                    <td>{{$membre->grade}}</td>
                    <td>
                      <div class="btn-group">
                        
                        <form action="{{ url('membres/'.$membre->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <a href="{{ url('membres/'.$membre->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>
                             @if(Auth::id() == $membre->id || Auth::user()->role->nom == 'admin' )
                            <a href="{{url('membres/'.$membre->id.'/edit')}}" class="btn btn-default">
                              <i class="fa fa-edit"></i>
                            </a>
                            @endif
                            @if(Auth::id() != $membre->id && Auth::user()->role->nom != 'membre' )
                            <!-- <button  type="submit" class="btn btn-danger ">
                                <i class="fa fa-trash-o"></i>
                            </button> -->

                             <a href="#supprimer{{ $membre->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                          <div class="modal fade" id="supprimer{{ $membre->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $membre->id }}ModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                        <!--   <h5 class="modal-title" id="supprimer{{ $membre->id }}ModalLabel">Supprimer</h5> -->
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body text-center">
                                          Voulez-vous vraiment effectuer la suppression ? 
                                      </div>
                                      <div class="modal-footer">
                                          <form class="form-inline" action="{{ url('membres/'.$membre->id)}}"  method="POST">
                                              @method('DELETE')
                                              @csrf
                                          <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                              <button type="submit" class="btn btn-danger">Oui</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>

                            @endif
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                   
                </tbody>
                <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Grade</th>
                  <th>Action</th>
                  
                </tr>
                </tfoot>
              </table>
            @endif
            @endif

            @if(count($theses) > 0)
              @if(isset($theses))
              <h3>Theses:</h3><br>
              <table class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Encadreur</th>
                  <th>CoEncadreur</th>
                  <th>Date Soutenance</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($theses as $these)
                  <tr>
                    <td>{{$these->titre}}</td>
                    <td>{{$these->sujet}}</td>
                    <td>{{$these->user->name}} {{$these->user->prenom}}</td>
                    <td>{{$these->encadreur_int}}{{$these->encadreur_ext}}</td>
                    <td>{{$these->coencadreur_int}}{{$these->coencadreur_ext}}</td>
                    <td>{{$these->date_soutenance}}</td>
                    <td>
                      
                      <form action="{{ url('theses/'.$these->id)}}" method="post"> 

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <a href="{{ url('theses/'.$these->id.'/details')}}" class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                      @if(Auth::id() == $these->user->id || Auth::user()->role->nom == 'admin' )
                      <a href="{{ url('theses/'.$these->id.'/edit')}}" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                      </a>
                      @endif
                       @if(Auth::id() != $these->user->id && Auth::user()->role->nom != 'membre' )
                      <!-- <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button> -->

                       <a href="#supprimer{{ $these->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $these->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $these->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $these->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('theses/'.$these->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endif
                      </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Encadreur</th>
                  <th>CoEncadreur</th>
                  <th>Date_Soutenance</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
              @endif
            @endif

            @if(count($articles) > 0)
              @if(isset($articles))
              <h3>Articles:</h3><br>
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Titre</th>
                  <th>Année</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($articles as $article)
                  <tr>
                    <td>{{$article->type}}</td>
                    <td>{{$article->titre}}</td>
                    <td>{{$article->annee}}</td>
                    <td>
                      <div class="btn-group">
                        <form action="{{ url('articles/'.$article->id)}}" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="{{ url('articles/'.$article->id.'/details')}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $article->deposer )
                        <a href="{{ url('articles/'.$article->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if( Auth::user()->role->nom != 'membre' || Auth::user()->id == $article->deposer )
                        <!-- <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button> -->

                         <a href="#supprimer{{ $article->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $article->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $article->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $article->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('articles/'.$article->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>

                        @endif
                        </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                  
                 </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  <th>Type</th>
                  
                  <th>Année</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
              @endif
            @endif

            @if(count($projets) > 0)
              @if(isset($projets))
              <h3>Projets:</h3><br>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Intitulé</th>
                  <th>Type</th>
                  <th>Partenaires</th>
                  <th>Chef</th>
                  <th>Membres</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($projets as $projet)
                  <tr>
                    <td>{{ $projet->intitule }}</td>
                    <td>{{ $projet->type }}</td>
                    <td>{{ $projet->partenaires }}</td>
                    <td><a href="{{url('membres/'.$projet->chef_id.'/details')}}">{{ $projet->chef->name}} {{ $projet->chef->prenom}}</a></td>
                    <td>
                      @foreach ($projet->users as $user) 
                      <ul>
                          <li><a href="{{url('membres/'.$user->id.'/details')}}">{{ $user->name }} {{ $user->prenom }}</a></li>
                      </ul>
                    @endforeach

                    </td>
                    <td>


                      <form action="{{ url('projets/'.$projet->id)}}" method="post"> 

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <a href="{{ url('projets/'.$projet->id.'/details')}} " class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                      @if(Auth::user()->role->nom != 'membre' )
                      <a href="{{ url('projets/'.$projet->id.'/edit')}}" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                      </a>
                      @endif
                      @if(Auth::user()->role->nom != 'membre' )
                      <!-- <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button> -->
                       <a href="#supprimer{{ $projet->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $projet->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $projet->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $projet->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('projets/'.$projet->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>


                      @endif
                      </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach

                  


                </tbody>
                <tfoot>
                 <tr>
                  <th>Intitulé</th>
                  <th>Type</th>
                  <th>Partenaires</th>
                  <th>Chef</th>
                  <th>Membres</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
              @endif
            @endif


            </div>
            <!-- /.box-body -->
            @if((count($equipes) == 0)&&(count($membres) == 0) && (count($theses) == 0) && (count($articles)== 0) && (count($projets) == 0))
              <p style="margin-left: 100px; margin-bottom: 50px">Aucune information trouvée</p>
            @endif
          </div>        
      </div>     
    </div>
@endsection