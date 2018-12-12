<div class="row">
      <div class="col-md-12">
        <br>
   <div class="panel panel-primary">
              <div class="panel-heading">
                 <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Partenaires</div>
              </div> <!-- /panel-heading -->
      <div class="panel-body">
            <div class="remove-messages"></div>
            <div class="div-action pull pull-right" style="padding-bottom:20px;">
                 <button class="btn btn-primary button1" data-toggle="modal" data-target="#addPart"> <i class="glyphicon glyphicon-plus-sign"></i>  Ajouter Partenaire </button>
            </div> <!-- /div-action -->       
        
            <table class="table" id="gererPart">
               <thead>
                   <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Email</th>
                    <th>Numero Telephone</th>
                    <th style="width:15%;">Options</th>
                   </tr>
               </thead>
            </table>
        </div> <!-- /panel-body -->
    </div> <!-- /panel -->    
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addPart" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <form class="form-horizontal" id="submitPartForm" action="partenaires/create" method="POST">
                 {{csrf_field()}}
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter Partenaire</h4>
               </div>
        <div class="modal-body">
             <div id="add-part-messages"></div>
             <div class="form-group">
                  <label class="col-sm-3 control-label">Nom du partenaire </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="partNom" name="nom" autocomplete="off">
                   </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Description </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="partDesc" name="description" autocomplete="off">
                   </div>
              </div> 
              <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="partEmail" name="email" autocomplete="off">
                   </div>
              </div> 
              <div class="form-group">
                  <label class="col-sm-3 control-label">Numero Telephone</label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="partNum" name="num_tel" autocomplete="off">
                   </div>
              </div> 
        </div> <!-- /modal-body -->
        
          <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
             <button type="submit" class="btn btn-primary" id="createPartBtn" data-loading-text="Loading..." autocomplete="off">Ajouter</button>
           </div>
         </form>
    </div>
  </div>
</div>
<!-- / add modal -->

<!-- edit brand -->
<div class="modal fade" id="editPartenairesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editPartForm" method="POST">
      {{csrf_field()}}
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title"><i class="fa fa-edit"></i> Editer Partenaire</h4>
        </div>
        <div class="modal-body" id="body-edit">
          <div id="edit-part-messages"></div>
          <div class="edit-part-result">
            <div class="form-group">
              <label class="col-sm-3 control-label">Nom Partenaire</label>
              <label class="col-sm-1 control-label">: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editPartNom" name="nom" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Description</label>
              <label class="col-sm-1 control-label">: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editPartDesc" name="description" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <label class="col-sm-1 control-label">: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editPartEmail" name="email" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Numero Telephone</label>
              <label class="col-sm-1 control-label">: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editPartNum" name="num_tel" autocomplete="off">
              </div>
            </div>                  
            
          </div>                  
          <!-- /edit brand result -->

        </div> <!-- /modal-body -->
        
        <div class="modal-footer editBrandFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
          
          <button type="submit" class="btn btn-success" id="editPartBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Editer</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="removePartenairesModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer Partenaire</h4>
      </div>
      <div class="modal-body" id="body-remove">
        <p>Etes vous sur ?</p>
      </div>
      <div class="modal-footer removePartFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removePartenairesBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Supprimer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->