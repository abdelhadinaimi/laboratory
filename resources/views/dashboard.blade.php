 @extends('layouts.master')

@section('title','LRI | Dashboard')

@section('header_page')
    <h1>
        Dashboard
   </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
@endsection

@section('asidebar')
  @component('components.sidebar',['active' => 'Dashboard']) @endcomponent        
@endsection

@section('content')
  <div class="row" style="padding-bottom: 30px">
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
           <div class="small-box bg-aqua">
                <div class="inner">
                   <h3>{{$membres}}</h3>
                   <p>Membres</p>
                </div>
            <div class="icon">
            <i class="ion-person"></i>
            </div>
           <a href="{{url('membres')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                              <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
               <h3>{{$equipes}}<sup style="font-size: 20px"></sup></h3>
               <p>Equipes</p>
            </div>
            <div class="icon">
               <i class="ion-ios-people"></i>
            </div>
            <a href="{{url('equipes')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                          <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
           <div class="small-box bg-yellow">
              <div class="inner">
                 <h3>{{$theses}}</h3>
                 <p>Thèses en cours</p>
              </div>
              <div class="icon">
               <i class="fa fa-clipboard"></i>
              </div>
              <a href="{{url('theses')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
           </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$articles}}</h3>

              <p>Articles</p>
            </div>
            <div class="icon">
              <i class="ion-ios-paper"></i>
            </div>
            <a href="{{url('articles')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


                          <!-- ./col -->
  </div>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Projet par equipes (en cours)</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="chart">
        <canvas id="barChart" style="height:230px"></canvas>
      </div>
    </div>
            <!-- /.box-body -->
  </div>
@endsection

