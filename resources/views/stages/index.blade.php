@extends('layouts.master')
@section('title','LRI | Liste des Stages')
  @section('header_page')
      <h1>
        Stages
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('theses')}}">Stages</a></li>
      </ol>
  @endsection
@section('asidebar')
       @component('components.sidebar',['active' => 'Stages']) @endcomponent
@endsection

@section('content')
               
                          @component('components.compStages')
                                @endcomponent
                  
 @endsection

@section('scripts')
<script type="text/javascript" src="{{asset('js/stage.js')}}"></script>
@endsection