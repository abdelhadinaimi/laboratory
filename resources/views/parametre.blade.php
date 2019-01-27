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
                            <input  name="nom" class="form-control" value="@if($labo->nom) {{$labo->nom}} @endif" placeholder="Le nom" type="text">
                          </div>
                        </div>
                  </div>
                  <div class="form-group ">
                        <label class="col-xs-4 control-label">Adresse</label>  
                        <div class="col-xs-8 inputGroupContainer">
                          <div style="width: 50%">
                            <input  name="adresse" class="form-control" value="@if($labo->adresse) {{$labo->adresse}} @endif" placeholder="Adresse" type="text">
                          </div>
                        </div>
                  </div>   
                  <div class="form-group ">
                        <label class="col-xs-4 control-label">N°TEL</label>  
                        <div class="col-xs-8 inputGroupContainer">
                          <div style="width: 50%">
                            <input  name="numtel" class="form-control" value="@if($labo->numtel) {{$labo->numtel}} @endif" placeholder="Téléphone" type="text">
                          </div>
                        </div>
                  </div>
                  <div class="form-group ">
                        <label class="col-xs-4 control-label">Email</label>  
                        <div class="col-xs-8 inputGroupContainer">
                          <div style="width: 50%">
                            <input  name="email" class="form-control" value="@if($labo->email) {{$labo->email}} @endif" placeholder="Email" type="text">
                          </div>
                        </div>
                  </div>
                  <div class="form-group ">
                        <label class="col-xs-4 control-label">Lien Google Map</label>  
                        <div class="col-xs-8 inputGroupContainer">
                          <div style="width: 50%">
                            <input  name="map" class="form-control" value="@if($labo->lienMap) {{$labo->lienMap}} @endif" placeholder="Lien Google Map" type="text">
                          </div>
                        </div>
                  </div>  
                  <div class="form-group ">
                        <label class="col-xs-4 control-label">Lien Facebook</label>  
                        <div class="col-xs-8 inputGroupContainer">
                          <div style="width: 50%">
                            <input  name="facebook" class="form-control" value="@if($labo->facebook) {{$labo->facebook}} @endif" placeholder="facebook" type="text">
                          </div>
                        </div>
                  </div> 
                  <div class="form-group ">
                        <label class="col-xs-4 control-label">Lien Twitter</label>  
                        <div class="col-xs-8 inputGroupContainer">
                          <div style="width: 50%">
                            <input  name="twitter" class="form-control" value="@if($labo->twitter) {{$labo->twitter}} @endif" placeholder="Lien Twitter" type="text">
                          </div>
                        </div>
                  </div>
                  <div class="form-group ">
                        <label class="col-xs-4 control-label">Lien LinkedIn</label>  
                        <div class="col-xs-8 inputGroupContainer">
                          <div style="width: 50%">
                            <input  name="linkedin" value="@if($labo->linkedin) {{$labo->linkedin}} @endif" class="form-control" placeholder="Lien LinkedIn" type="text">
                          </div>
                        </div>
                  </div> 
                   <div class="form-group" style="padding-top: 20px">
                              <label class="col-md-4 control-label">Logo</label>  
                              <div class="col-md-8 inputGroupContainer">
                              <input name="logo" type="file" accept="image/*">
                             </div>
                     </div>
                     <div class="form-group" style="padding-top: 20px">
                              <label class="col-md-4 control-label">Présentation Accueil</label>  
                              <div  class="col-md-8 inputGroupContainer">
                              <textarea rows="10" name="preAccueil" style="width: 50%">{{$labo->presentationIndex}}</textarea>
                             </div>
                     </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Présentation</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('content')) has-error @endif" >
                        <div style="width: 70%">
                          <textarea name="presentation" class="form-control" rows="3" placeholder="Entrez ..." id="summernote">{{$labo->presentation}}</textarea>


                        </div>
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
@section('scripts')
<script>
$(document).ready(function() {
var IMAGE_PATH = '{{ public_path(("/uploads/photo/")) }}';

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content')     }
});
$('#summernote').summernote({
    height: 600,
    onImageUpload: function(files) {
        data = new FormData();
        data.append("image", files[0]);
        $.ajax({
            data: data,
            type: "POST",
            url: '{{ public_path(("/uploads/photo/")) }}',
            cache: false,
            contentType: false,
            processData: false,
            success: function(filename) {
                var file_path = IMAGE_PATH + filename;
                console.log(file_path);
                $('#summernote').summernote("insertImage", file_path);
            }
        });
    }
  });
});
</script>
@endsection