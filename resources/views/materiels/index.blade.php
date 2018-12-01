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
        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>
         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>
       

        <li>
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>
          
        <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        <li  class="active">
          <a href="{{url('materiels')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Materiels</span>
          </a>
        </li>
       

          @if(Auth::user()->role->nom == 'admin' )

          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
          @endif

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
   <div class="row">
      <div class="col-md-12">
         <div class="panel panel-default">
              <div class="panel-heading">
                 <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Categories</div>
              </div> <!-- /panel-heading -->
              <div class="panel-body">
                  <div class="remove-messages"></div>
                  <div class="div-action pull pull-right" style="padding-bottom:20px;">
                 <button class="btn btn-default button1" data-toggle="modal" data-target="#addCat"> <i class="glyphicon glyphicon-plus-sign"></i> Ajouter Catégorie </button>
        </div> <!-- /div-action -->       
        
        <table class="table" id="gererCat">
          <thead>
            <tr>              
              <th>Libellé du categorie</th>
              <th style="width:15%;">Options</th>
            </tr>
          </thead>
        </table>
        <!-- /table -->
             </div> <!-- /panel-body -->
    </div> <!-- /panel -->    
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addCat" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
       <form class="form-horizontal" id="submitBrandForm" action="php_action/createMarque.php" method="POST">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter Categorie</h4>
        </div>
        <div class="modal-body">
             <div id="add-brand-messages"></div>
             <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Libellé </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="catLib" placeholder="libellé catégorie" name="catLib" autocomplete="off">
            </div>
          </div> <!-- /form-group-->                  

        </div> <!-- /modal-body -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          
          <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Ajouter</button>
        </div>
        <!-- /modal-footer -->
      </form>
       <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- edit brand -->
<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="form-horizontal" id="editBrandForm" action="php_action/editMarque.php" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-edit"></i> Editer Marque</h4>
        </div>
        <div class="modal-body">

          <div id="edit-brand-messages"></div>

          <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
          </div>

          <div class="edit-brand-result">
            <div class="form-group">
              <label for="editBrandName" class="col-sm-3 control-label">Nom </label>
              <label class="col-sm-1 control-label">: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editBrandName" placeholder="Marque" name="editBrandName" autocomplete="off">
              </div>
            </div> <!-- /form-group-->                    
            
          </div>                  
          <!-- /edit brand result -->

        </div> <!-- /modal-body -->
        
        <div class="modal-footer editBrandFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
          
          <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Editer</button>
        </div>
        <!-- /modal-footer -->
      </form>
       <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit brand -->

<!-- remove brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer Marque</h4>
      </div>
      <div class="modal-body">
        <p>Etes vous sur vous risqueé de perdre des produits ?</p>
      </div>
      <div class="modal-footer removeBrandFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeBrandBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Supprimer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->

                            </div>
                            <div role="tabpanel" class="tab-pane" id="materiels">
                                <div>
                                  Materiels
                                </div>
                            </div>
    </div>
 @endsection