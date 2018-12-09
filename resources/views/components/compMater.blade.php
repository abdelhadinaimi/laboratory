<div class="row">
      <div class="col-md-12">
         <div class="panel panel-default">
              <div class="panel-heading">
                 <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i>Matériels</div>
              </div> <!-- /panel-heading -->
              <div class="panel-body">
                  <div class="remove-messagesMat"></div>
                  <div class="div-action pull pull-right" style="padding-bottom:20px;">
                 <button class="btn btn-default button1" id="addButton" data-toggle="modal" data-target="#addMat"> <i class="glyphicon glyphicon-plus-sign"></i> Ajouter Matériel </button>
        </div> <!-- /div-action -->       
        
        <table class="table" width="100%" id="tableMat">
          <thead>
            <tr>              
              <th>ID</th>
              <th>Référence</th>
              <th>Catégorie</th>
              <th>Déscription</th>
              <th>Etat</th>
              <th>Options</th>
            </tr>
          </thead>
        </table>
        <!-- /table -->
             </div> <!-- /panel-body -->
    </div> <!-- /panel -->    
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addMat" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
       <form class="form-horizontal" id="submitMatForm" action="createMat" method="POST">
        {{csrf_field()}}
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter Matériel</h4>
        </div>
        <div class="modal-body">
             <div id="add-mat-messages"></div>
             <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Catégorie </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <select id="selectCat" name="catMat" class="form-control">
                          <option>Séléctionner</option>
                                 
                                  </select>
            </div>
          </div> <!-- /form-group-->   
          <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Référence </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="RefMat" placeholder="Référence Matériel" name="RefMat" autocomplete="off">
            </div>
          </div>               
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Déscription </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="DescMat" placeholder="Déscription Matériel" name="DescMat" autocomplete="off">
            </div>
          </div>
        </div> <!-- /modal-body -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          
          <button type="submit" class="btn btn-primary" id="createMatBtn" data-loading-text="Loading..." autocomplete="off">Ajouter</button>
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
<div class="modal fade" id="editMaterielsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="form-horizontal" id="editMatForm" action="" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-edit"></i> Modfier Matériel</h4>
        </div>
        <div class="modal-body" id="body-editMat">
          <div id="edit-mat-messages"></div>
          <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Catégorie </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <select id="selectCatEdit" name="catMatEdit" class="form-control">
                          
                                  </select>
            </div>
          </div> <!-- /form-group-->   
          <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Référence </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="RefMatEdit" placeholder="Référence Matériel" name="RefMatEdit" autocomplete="off">
            </div>
          </div>               
           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Déscription </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="DescMatEdit" placeholder="Déscription Matériel" name="DescMatEdit" autocomplete="off">
            </div>
          </div>                 
          <!-- /edit brand result -->

        </div> <!-- /modal-body -->
        
        <div class="modal-footer editBrandFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
          
          <button type="submit" class="btn btn-success" id="editMatBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Modifier</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="removeMatModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer Matériel</h4>
      </div>
      <div class="modal-body" id="body-removeMat">
        <p>Etes vous sur ?</p>
      </div>
      <div class="modal-footer removeCatFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeMat" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Supprimer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->




<div class="modal fade" id="affecterMatModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="form-horizontal" id="affecterMatForm" action="" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-edit"></i> Affecter Matériel</h4>
        </div>
        <div class="modal-body" id="body-affecter">
          <div id="affecter-mat-messages"></div>
                      <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Affecter à un(e) </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <select id="affecterSelect" name="affecterSelect" class="form-control">
                          <option value="0" selected="true">Equipe</option>
                          <option value="1">Membre</option>

                                  </select>
            </div>
          </div> <!-- /form-group-->   
          <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Equipe </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <select id="affecterEquipe" name="affecterEquipe" class="form-control">

                                  </select>
            </div>
          </div>
          <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Membre </label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <select id="affecterMembre" disabled="true" name="affecterMembre" class="form-control">

                                  </select>
            </div>
          </div>           
                          
          <!-- /edit brand result -->

        </div> <!-- /modal-body -->
        
        <div class="modal-footer editBrandFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
          
          <button type="submit" class="btn btn-success" id="affecterMatBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Affecter</button>
        </div>
        <!-- /modal-footer -->
      </form>
       <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>