
 @extends('layouts.master')

@section('title','LRI | Modules')

@section('header_page')

     <h1>
       Cours
       <small>Liste</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li class="active">Cours</a></li>
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
                      <h3 class="box-title">Liste des cours</h3>
                      <div class="pull-right">
                         <div class="div-action pull pull-right">
                             <button class="btn btn-primary button1" data-toggle="modal" data-target="#addModule"> <i class="glyphicon glyphicon-plus-sign"></i>  Ajouter Cours </button>
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
            <div id="contentMod">  
          @foreach($modules as $module)
            <div class="col-lg-4 col-xs-6" id="{{$module->id}}">
                <div class="small-box bg-green">
                      <i class="glyphicon glyphicon-edit editMod" role="{{$module->id}}" data-toggle="modal" data-target="#editModModal"></i> <i class="glyphicon glyphicon-trash removeMod" role="{{$module->id}}" data-toggle="modal" data-target="#removeModModal"></i>
                   <div class="inner">

                      <h3>{{$module->libelle}}<sup style="font-size: 20px"></sup></h3>
                      <p>{{$module->description}}</p>
                      
                  </div>
                   <div class="icon">
                      <i class="ion-ios-paper"></i>
                   </div>
                    <a href="module/{{$module->id}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
           @endforeach
         </div>
        </div> <!-- /panel-body -->
    </div> <!-- /panel -->  



             
           </div>
         </div>
     </div>
   </div>

   

   <div class="modal fade" id="addModule" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
                 
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter Module</h4>
               </div>
      <form id="submitModForm" action="createModule" method="POST">
           {{csrf_field()}}
        <div class="modal-body">
            <div id="add-mod-messages"></div> 
                <div class="form-group">
                   <label for="modLib" class="control-label">Libelle:</label>
                   <input type="text" class="form-control" id="modLib" name="modLib" placeholder="enter libelle">
                </div>
                <div class="form-group">
                  <label for="coursDesc" class="control-label">Description:</label>
                  <textarea class="form-control" id="coursDesc" name="coursDesc"></textarea>
                </div>
        </div> <!-- /modal-body -->
        
          <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
             <button type="submit" class="btn btn-primary" id="createModBtn" data-loading-text="Loading..." autocomplete="off"><i class="glyphicon glyphicon-ok-sign"></i> Ajouter</button>
           </div>
        </form>
    </div>
  </div>
</div>

<!-- remove brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer Module</h4>
      </div>
      <div class="modal-body" id="body-remove">
        <p>Etes vous sur ?</p>
      </div>
      <div class="modal-footer removeCatFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeModBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Supprimer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->

<!-- edit brand -->
<div class="modal fade" id="editModModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form  class="form-horizental" id="editModForm" action="editCat" method="POST">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title"><i class="fa fa-edit"></i> Editer Module</h4>
        </div>
        <div class="modal-body" id="body-edit">
          <div id="edit-mod-messages"></div>
          <div class="edit-mod-result">
            <div class="form-group">
                   <label for="editModLib" class="control-label">Libelle:</label>
                   <input type="text" class="form-control" id="editModLib" name="editModLib" placeholder="enter libelle">
                </div>
                <div class="form-group">
                  <label for="editModDesc" class="control-label">Description:</label>
                  <textarea class="form-control" id="editModDesc" name="editModDesc"></textarea>
                </div>
          </div>                  
        </div> <!-- /modal-body -->
        <div class="modal-footer editBrandFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
          <button type="submit" class="btn btn-primary" id="editModBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Editer</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="{{asset('js/modules.js')}}"></script>
@endsection

