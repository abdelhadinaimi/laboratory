@extends('layouts.master')

@section('title','LRI | Modifier un actualite')

@section('header_page')

      <h1>
        Actualité
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('Actualite')}}">Actualité</a></li>
        <li class="active">Modifier</li>
      </ol>
@endsection
@section('asidebar')
@component('components.sidebar',['active' => 'Actualites']) @endcomponent
@endsection

@section('content')

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action=" {{url('actualites/'.$actualite->id) }} " method="post"  id="contact_form" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier actualite</b></h2></center></legend><br>

                  <div class="form-group">
                        <label class="col-xs-3 control-label">Titre (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('titre')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="titre" class="form-control" placeholder="Titre" type="text" value="{{$actualite->titre}}">
                          </div>
                        </div>
                  </div>  
                  <div class="form-group">
                        <label class="col-xs-3 control-label">Description (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('description')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="description" class="form-control" placeholder="description" type="text" value="{{$actualite->description}}">
                          </div>
                        
                        </div>
                  </div>  

                  <div class="form-group">
                      <label class="col-md-3 control-label">Contenu (*)</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('content')) has-error @endif" >
                        <div style="width: 70%">
                          <textarea name="content" class="form-control" rows="3" placeholder="Entrez ..." id="summernote">
                          	{{$actualite->content}}
                          </textarea>


                        </div>
                      </div>
                  </div>


                  <div class="form-group">
                      <label class="col-md-3 control-label">Photo</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <input name="img" type="file">
                        </div>
                      </div>
                  </div>
                  

              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('actualites')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
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
    height: 400,
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