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

    @component('components.sidebar',['active' => 'Equipes']) @endcomponent

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
         <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Équipe</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="statPie" style="height:230px"></canvas>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="stat-equipe-article" style="height:230px"></canvas>
              </div>
            </div>
        </div>
        </div>
        
      </div>
    </div>
  </div>

@endsection