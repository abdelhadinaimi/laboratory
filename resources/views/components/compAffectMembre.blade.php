<div class="row">
      <div class="col-md-12">
      <br>
         <div class="panel panel-primary">
               <div class="panel-heading">
                 <div class="page-heading"> Affectations aux membres</div>
              </div>
              <div class="panel-body">
                  <div class="rendreMembre-messagesMat"></div>
                  <div class="div-action pull pull-right" style="padding-bottom:20px;">
                  <br>
                 
        </div> <!-- /div-action -->       
        
        <table class="table" width="100%" id="tableAffectMembres">
          <thead>
            <tr>              
              <th>Référence</th>
              <th>Catégorie</th>
              <th>Emprunteur</th>
              <th>Date Affectation</th>
              <th>Date Retour</th>
              <th>Options</th>
            </tr>
          </thead>
        </table>
        <!-- /table -->
             </div> <!-- /panel-body -->
    </div> <!-- /panel -->    
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->



<!-- / add modal -->
<!-- /edit brand -->

<!-- remove brand -->
<!-- /.modal -->
<!-- /remove brand -->

<div class="modal fade" tabindex="-1" role="dialog" id="rendreMaterielsMembres">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-import"></i> Libérer Matériel</h4>
      </div>
      <div class="modal-body" id="body-RendreMatMembre">
        <p>Etes vous sur ?</p>
      </div>
      <div class="modal-footer removeCatFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="rendreMatMembreBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Confirmer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>