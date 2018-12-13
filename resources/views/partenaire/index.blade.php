@extends('layouts.master')
@section('title','LRI | Liste des thèses')
  @section('header_page')
      <h1>
        Partenaires
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('theses')}}">Partenaires</a></li>
      </ol>
  @endsection
@section('asidebar')
       @component('components.sidebar',['active' => 'Partenaires']) @endcomponent
@endsection

@section('content')
               <ul class="nav nav-tabs">
                    <li class="nav-item active"><a  href="#partenaires" role="tab" data-toggle="tab"
                                    aria-selected="true">Partenaires</a></li>
                    <li class="nav-item"><a  href="#contacts" role="tab" data-toggle="tab"
                                    aria-selected="false">Contacts</a></li>
              </ul>
              <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="partenaires">
                        @component('partenaire.partTab') @endcomponent
                    </div>
                    <div role="tabpanel" class="tab-pane" id="contacts">
                        @component('partenaire.contTab') @endcomponent
                    </div>
              </div>
 @endsection


@section('scripts')
<script src="{{ asset('js/partenaire.js')}}"></script>
<script src="{{ asset('js/contacts.js')}}"></script>
@endsection