@extends('layouts.master')

@section('title','LRI | Paramétre')

@section('header_page')
    <h1>
        Paramètres
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="{{url('parametre')}}">Paramètres</a></li>
        
      </ol>
@endsection

@section('asidebar')
  @component('components.sidebar',['active' => 'Paramètres']) @endcomponent

@endsection

@section('content')

<div class="row">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action=" {{url('parametre')}}" method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Informations du Laboratoire</b></h2></center></legend><br>
              <div class="form-group ">
                        <label class="col-xs-4 control-label">Nom du labo</label>  
                        <div class="col-xs-8 inputGroupContainer">
                          <div style="width: 50%">
                            <input  name="nom" class="form-control" placeholder="Le nom" type="text">
                          </div>
                        </div>
                  </div>  

             
                   <div class="form-group" style="padding-top: 20px">
                              <label class="col-md-4 control-label">Logo</label>  
                              <div class="col-md-8 inputGroupContainer">
                              <input name="logo" type="file" accept="image/*">
                             </div>
                     </div>
                    

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('parametre')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>


@endsection
