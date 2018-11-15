@extends('layouts.master')

@section('title','LRI | Liste des équipes')

@section('header_page')
	<h1>
        Equipes
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Equipes</li>
      </ol>
@endsection

@section('asidebar')

		<li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li class="active">
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
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row">
            <div class="box-header col-xs-11">
              <legend><center><h2><b>EQUIPES</b></h2></center></legend>
            </div>
            
          </div>
          </div>
            
            <!-- /.box-header -->
          <div class="box-body">

            @if(Auth::user()->role->nom == 'admin' )
            <div class=" pull-right" style="padding-bottom: 20px">
                <a href="{{url('equipes/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> <i class="fa fa-group"></i> Nouvelle équipe</a>
            </div>
            @endif

            <div class="row" >
              <div class="col-xs-12">
              @foreach($equipes as $equipe)
              

                <div class="col-xs-6">
                  <div class="box box-widget widget-user">
                    <div class="box-tools pull-right">
                      @if(Auth::user()->role->nom == 'admin' )

                 <!--      <form action="{{ url('equipes/'.$equipe->id)}}" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                      <button type="submit" class="btn btn-box-tool"><i class="fa fa-times"></i>
                      </button>
                      </form> -->


                      <a href="#supprimer{{ $equipe->id }}Modal" role="button" class="btn btn-box-tool" data-toggle="modal"><i class="fa fa-times"></i></a>
                      <div class="modal fade" id="supprimer{{ $equipe->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $equipe->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $equipe->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('equipes/'.$equipe->id)}}"  method="POST">
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
                    </div>

                    <div class="widget-user-header bg-aqua-active">
                      <a class="users-list-name1" href="{{ url('equipes/'.$equipe->id.'/details')}}"><h3 class="widget-user-username">{{$equipe->intitule}}</h3></a>
                      <h5 class="widget-user-desc">{{$equipe->achronymes}}</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="{{asset($equipe->chef->photo)}}" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
                        @foreach($nbr as $nbrs)
                        @if($nbrs->equipe_id == $equipe->id)
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">
                             
                             {{$nbrs->total}}
                            
                          </h5>
                            <span class="description-text">Membres</span>
                          </div>
                        </div>
                        @endif
                         @endforeach

                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">Chef d'équipe</h5>
                            <span class="description-text"><a href="{{url('membres/'.$equipe->chef_id.'/details')}}" style="color: black">{{$equipe->chef->name}} {{$equipe->chef->prenom}}</a></span>
                          </div>
                        </div>

                        <!-- <div class="col-sm-4">
                          <div class="description-block">
                            <h5 class="description-header">20</h5>
                            <span class="description-text">Publications</span>
                          </div>
                        </div> -->
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>

             
              @endforeach
            </div>
          </div>
            <!-- /.box-body -->
        </div>
        
      </div>
    </div>
  </div>

@endsection