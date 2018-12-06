@extends('layouts.master')
@section('title','LRI | Liste des thèses')
  @section('header_page')
      <h1>
        Materiels
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('theses')}}">Materiels</a></li>
      </ol>
  @endsection
@section('asidebar')
       @component('components.sidebar',['active' => 'Materiels']) @endcomponent
@endsection

@section('content')
               <ul class="nav nav-tabs">
                    <li class="nav-item active"><a  href="#categories" role="tab" data-toggle="tab"
                                    aria-selected="true">Categories</a></li>
                    <li class="nav-item"><a  href="#materiels" role="tab" data-toggle="tab"
                                    aria-selected="false">Materiels</a></li>
              </ul>
              <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="categories">
                                @component('components.compCateg') @endcomponent
                    </div>
                    <div role="tabpanel" class="tab-pane" id="materiels">
                          
                    </div>
              </div>
 @endsection