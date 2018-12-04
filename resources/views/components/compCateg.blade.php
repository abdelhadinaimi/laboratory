<div class="row">
      <div class="col-md-12">
        <br>
   <div class="panel panel-primary">
              <div class="panel-heading">
                 <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Categories</div>
              </div> <!-- /panel-heading -->
      <div class="panel-body">
            <div class="remove-messages"></div>
            <div class="div-action pull pull-right" style="padding-bottom:20px;">
                 <button class="btn btn-primary button1" data-toggle="modal" data-target="#addCat"> <i class="glyphicon glyphicon-plus-sign"></i>  Ajouter Catégorie </button>
            </div> <!-- /div-action -->       
        
            <table class="table" id="gererCat">
               <thead>
                   <tr>              
                      <th>Libellé du categorie</th>
                      <th style="width:15%;">Options</th>
                   </tr>
               </thead>
            </table>
        </div> <!-- /panel-body -->
    </div> <!-- /panel -->    
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addCat" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <form class="form-horizontal" id="submitCatForm" action="createCat" method="POST">
                 {{csrf_field()}}
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter Categorie</h4>
               </div>
        <div class="modal-body">
             <div id="add-cat-messages"></div>
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
             <button type="submit" class="btn btn-primary" id="createCatBtn" data-loading-text="Loading..." autocomplete="off">Ajouter</button>
           </div>
         </form>
    </div>
  </div>
</div>
<!-- / add modal -->

<!-- edit brand -->
<div class="modal fade" id="editCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editCatForm" action="editCat" method="POST">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title"><i class="fa fa-edit"></i> Editer Categorie</h4>
        </div>
        <div class="modal-body" id="body-edit">
          <div id="edit-cat-messages"></div>
          <div class="edit-cat-result">
            <div class="form-group">
              <label for="editCatName" class="col-sm-3 control-label">Libellé </label>
              <label class="col-sm-1 control-label">: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editCatName" placeholder="Nouveau Libellé" name="editCatName" autocomplete="off">
              </div>
            </div> <!-- /form-group-->                    
            
          </div>                  
          <!-- /edit brand result -->

        </div> <!-- /modal-body -->
        
        <div class="modal-footer editBrandFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
          
          <button type="submit" class="btn btn-success" id="editCatBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Editer</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer Categorie</h4>
      </div>
      <div class="modal-body" id="body-remove">
        <p>Etes vous sur ?</p>
      </div>
      <div class="modal-footer removeCatFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Supprimer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->