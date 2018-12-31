<div class="row">
      <div class="col-md-12">
      <br>
         <div class="panel panel-primary">
              <div class="panel-heading">
                 <div class="page-heading">Stages</div>
              </div> <!-- /panel-heading -->
              <div class="panel-body">
                  <div class="remove-messagesStage"></div>
                  <div class="div-action pull pull-right" style="padding-bottom:20px;">
                 <button class="btn btn-primary button1" id="addButton" data-toggle="modal" data-target="#addStage"> <i class="glyphicon glyphicon-plus-sign"></i> Nouveau Stage </button> 

        </div> <!-- /div-action -->       
        
        <table class="table" width="100%" id="tableStage">
          <thead>
            <tr>              
              <th>Stagiaire</th>
              <th>Partenaire</th>
              <th>Contact</th>
              <th>Date début</th>
              <th>Date fin</th>
              <th>Options</th>
            </tr>
          </thead>
        </table>
        <!-- /table -->
             </div> <!-- /panel-body -->
    </div> <!-- /panel -->    
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addStage"  role="dialog"  style="overflow:hidden;">
  <div class="modal-dialog">
    <div class="modal-content">
       <form class="form-horizontal" id="submitStageForm" action="createStage" method="POST">
        {{csrf_field()}}
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title"><i class="fa fa-plus"></i> Nouveau Stage</h4>
        </div>
        <div class="modal-body">
             <div id="add-stages-messages"></div>
              <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Stagiaire </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8" id="divmembre">
              <select id="stagiaire"  style="width: 100%;" class="form-control select2"   name="stagiaire">

              </select>

            </div>
          </div>
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Partenaire </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8" id="divmembre">
              <select id="partenaire"  style="width: 100%;" class="form-control select2"   name="partenaire">

              </select>

            </div>
          </div>
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Contact </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8" id="divmembre">
              <select id="contact"  style="width: 100%;" class="form-control select2"   name="contact">

              </select>

            </div>
          </div>
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Date début </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <table id="tableE" width="100%"><tr><td width="90%">
              <input type="date" class="form-control" style="width: 100%;" id="dateDebutStage"  name="dateDebutStage" autocomplete="off"></td></tr></table>
            </div>
          </div> 
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Date fin </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <table id="tableE" width="100%"><tr><td width="90%">
              <input type="date" class="form-control" style="width: 100%;" id="dateFinStage"  name="dateFinStage" autocomplete="off"></td></tr></table>
            </div>
          </div> 
        
        </div> <!-- /modal-body -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          
          <button type="submit" class="btn btn-primary" id="createStageBtn" data-loading-text="Loading..." autocomplete="off">Ajouter</button>
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
<div class="modal fade" id="editStageModal" role="dialog" style="overflow:hidden;">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="form-horizontal" id="editStageForm" action="" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-edit"></i> Modfier Stage</h4>
        </div>
        <div class="modal-body" id="body-editStage">
          <div id="edit-stage-messages"></div>
          <!-- /form-group-->   
               <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Stagiaire </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8" id="divmembre">
              <select id="stagiaireEdit"  style="width: 100%;" class="form-control select2"   name="stagiaireEdit">

              </select>

            </div>
          </div>
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Partenaire </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8" id="divmembre">
              <select id="partenaireEdit"  style="width: 100%;" class="form-control select2"   name="partenaireEdit">

              </select>

            </div>
          </div>
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Contact </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8" id="divmembre">
              <select id="contactEdit"  style="width: 100%;" class="form-control select2"   name="contactEdit">

              </select>

            </div>
          </div>
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Date début </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <table id="tableE" width="100%"><tr><td width="90%">
              <input type="date" class="form-control" style="width: 100%;" id="dateDebutStageEdit"  name="dateDebutStageEdit" autocomplete="off"></td></tr></table>
            </div>
          </div> 
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Date fin </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <table id="tableE" width="100%"><tr><td width="90%">
              <input type="date" class="form-control" style="width: 100%;" id="dateFinStageEdit"  name="dateFinStageEdit" autocomplete="off"></td></tr></table>
            </div>
          </div>             
          <!-- /edit brand result -->

        </div> <!-- /modal-body -->
        
        <div class="modal-footer editBrandFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
          
          <button type="submit" class="btn btn-success" id="editStageBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Modifier</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="removeStageModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer Stage</h4>
      </div>
      <div class="modal-body" id="body-removeStage">
        <p>Etes vous sur ?</p>
      </div>
      <div class="modal-footer removeCatFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeStage" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Supprimer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->



