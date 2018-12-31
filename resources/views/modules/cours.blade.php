
 @extends('layouts.master')

@section('title','LRI | Modules')

@section('header_page')
  <span id="modId" role="{{$module->id}}"></span>
     <h1>
       Module
       <small>{{$module->libelle}}</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li class="active">Modules</a></li>
       <li class="active">{{$module->libelle}}</a></li>
     </ol>

@endsection

@section('asidebar')
@component('components.sidebar',['active' => 'cours']) @endcomponent

 @endsection

@section('content')


  <div class="row">
     <div class="col-md-12">
       <div class="box col-xs-12">
           <div class="container" style="padding-top: 30px">
              <div class="row" style="padding-bottom: 20px">
                  <div class="box-header col-xs-12">
                      <h3 class="box-title">Liste des cours - {{$module->libelle}}</h3>
                      <div class="pull-right">
                         <div class="div-action pull pull-right">
                             <button class="btn btn-primary button1" data-toggle="modal" data-target="#addCour"> <i class="glyphicon glyphicon-plus-sign"></i>  Ajouter Cours </button>
                         </div>
                      </div>
                  </div>
              </div>
            </div>
           <div class="box-body">
            <div class="panel panel-default">
              <div class="panel-heading">
                 <div class="page-heading"><b>Cours</b></div>
              </div> <!-- /panel-heading -->
      <div class="panel-body">
            <div class="remove-messages"></div>  
               <table class="table" id="gererCours">
               <thead>
                   <tr>              
                      <th>Libelle</th>
                      <th>Description</th>
                      <th>Lien</th>
                      <th style="width:15%;">Options</th>
                   </tr>
               </thead>
            </table>
        </div> <!-- /panel-body -->
    </div> <!-- /panel -->  



             
           </div>
         </div>
     </div>
   </div>

   

   <div class="modal fade" id="addCour" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
                 
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter Cours</h4>
               </div>
      <form id="submitCoursForm" action="createCours/{{$module->id}}" method="POST" enctype="multipart/form-data">
           {{csrf_field()}}
        <div class="modal-body">
            <div id="add-cours-messages"></div>
                <div class="form-group">
                   <label for="coursLib" class="control-label">Libelle:</label>
                   <input type="text" class="form-control" id="coursLib" name="coursLib">
                </div>
                <div class="form-group">
                   <label for="fiche" class="control-label">Fiche:</label>
                   <input type="file" class="form-control" id="fiche" name="fiche">
                </div>
                <div class="form-group">
                   <label for="joins" class="control-label">Joins:</label>
                   <input type="file" class="form-control" id="joins" name="joins[]" multiple>
                </div>
                <div class="form-group">
                   <label for="pubTime" class="control-label">Publication Time:</label>
                   <input type="datetime-local" class="form-control" id="pubTime" name="pubTime" value="05-08-2018 05:05">
                </div>
                <div class="form-group">
                  <label for="coursDesc" class="control-label">Description:</label>
                  <textarea class="form-control" id="coursDesc" name="coursDesc"></textarea>
                </div>
        </div> <!-- /modal-body -->
        
          <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
             <button type="submit" class="btn btn-primary" id="createCoursBtn" data-loading-text="Loading..." autocomplete="off"><i class="glyphicon glyphicon-ok-sign"></i> Ajouter</button>
           </div>
        </form>
    </div>
  </div>
</div>

<!-- remove brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCoursModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer Cours</h4>
      </div>
      <div class="modal-body" id="body-remove">
        <p>Etes vous sur ?</p>
      </div>
      <div class="modal-footer removeCoursFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="submit" class="btn btn-primary" id="removeCoursBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Supprimer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->

<!-- edit brand -->
<div class="modal fade" id="editCoursModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title"><i class="fa fa-edit"></i> Editer Module</h4>
        </div>
        <form  id="editCoursForm"  method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body" id="body-edit">
          <div id="edit-cours-messages"></div>
          <div class="edit-mod-result">
            <div class="form-group">
                   <label for="editCoursLib" class="control-label">Libelle:</label>
                   <input type="text" class="form-control" id="editCoursLib" name="editCoursLib">
                </div>
                <div class="form-group">
                   <label for="editFiche" class="control-label">Fiche:</label>
                   <input type="file" class="form-control" id="editFiche" name="editFiche">
                </div>
                <div class="form-group">
                   <label for="editJoins" class="control-label">Joins:</label>
                   <input type="file" class="form-control" id="editJoins" name="editJoins[]" multiple>
                </div>
                <div class="form-group">
                   <label for="editPubTime" class="control-label">Publication Time:</label>
                   <input type="datetime-local" class="form-control" id="editPubTime" name="editPubTime">
                </div>
                <div class="form-group">
                  <label for="editCoursDesc" class="control-label">Description:</label>
                  <textarea class="form-control" id="editCoursDesc" name="editCoursDesc"></textarea>
                </div>
          </div>                  
        </div> <!-- /modal-body -->
        <div class="modal-footer editCoursFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
          <button type="submit" class="btn btn-primary" id="editCoursBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Editer</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="{{asset('js/cours.js')}}"></script>
@endsection

