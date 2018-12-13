<div class="row">
      <div class="col-md-12">
        <br>
   <div class="panel panel-primary">
              <div class="panel-heading">
                 <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Contacts</div>
              </div> <!-- /panel-heading -->
      <div class="panel-body">
            <div class="remove-messages"></div>
            <div class="div-action pull pull-right" style="padding-bottom:20px;">
                 <button class="btn btn-primary button1" data-toggle="modal" data-target="#addCont" onclick="addCont()"> <i class="glyphicon glyphicon-plus-sign"></i>  Ajouter Contact </button>
            </div> <!-- /div-action -->       
        
            <table class="table" id="gererCont">
               <thead>
                   <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Numero Telephone</th>
                    <th>Description</th>
                    <th>Partenaire</th>
                    <th>PartID</th>
                    <th style="width:15%;">Options</th>
                   </tr>
               </thead>
            </table>
        </div> <!-- /panel-body -->
    </div> <!-- /panel -->    
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addCont" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <form class="form-horizontal" id="submitContForm" action="contacts/create" method="POST">
                 {{csrf_field()}}
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter Contact</h4>
               </div>
        <div class="modal-body">
             <div id="add-cont-messages"></div>
             <div class="form-group">
                  <label class="col-sm-3 control-label">Nom </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="contNom" name="nom" autocomplete="off">
                   </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Prenom </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="contPrenom" name="prenom" autocomplete="off">
                   </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="contEmail" name="email" autocomplete="off">
                   </div>
              </div> 
              <div class="form-group">
                  <label class="col-sm-3 control-label">Numero Telephone</label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="contNum" name="num_tel" autocomplete="off">
                   </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Description </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="contDesc" name="description" autocomplete="off">
                   </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Partenaire </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                    <select id="contPart" name="partenaire_id" class="form-control">
                    </select>
                   </div>
              </div> 
        </div> <!-- /modal-body -->
        
          <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
             <button type="submit" class="btn btn-primary" id="createContBtn" data-loading-text="Loading..." autocomplete="off">Ajouter</button>
           </div>
         </form>
    </div>
  </div>
</div>
<!-- / add modal -->

<!-- edit brand -->
<div class="modal fade" id="editContactsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editContForm" method="POST">
      {{csrf_field()}}
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title"><i class="fa fa-edit"></i> Editer Contact</h4>
        </div>
        <div class="modal-body" id="body-edit-cont">
          <div id="edit-cont-messages"></div>
          <div class="edit-cont-result">
          <div class="form-group">
                  <label class="col-sm-3 control-label">Nom </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="editContNom" name="nom" autocomplete="off">
                   </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Prenom </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="editContPrenom" name="prenom" autocomplete="off">
                   </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="editContEmail" name="email" autocomplete="off">
                   </div>
              </div> 
              <div class="form-group">
                  <label class="col-sm-3 control-label">Numero Telephone</label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="editContNum" name="num_tel" autocomplete="off">
                   </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Description </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                       <input type="text" class="form-control" id="editContDesc" name="description" autocomplete="off">
                   </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Partenaire </label>
                  <label class="col-sm-1 control-label">: </label>
                  <div class="col-sm-8">
                    <select id="editContPart" name="partenaire_id" class="form-control">
                    </select>
                   </div>
              </div> 
            </div>                  
            
          </div>                  
          <!-- /edit brand result -->

        </div> <!-- /modal-body -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
          
          <button type="submit" class="btn btn-success" id="editContBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Editer</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="removeContactsModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer Contact</h4>
      </div>
      <div class="modal-body" id="body-remove-cont">
        <p>Etes vous sur ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeContactsBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Supprimer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->