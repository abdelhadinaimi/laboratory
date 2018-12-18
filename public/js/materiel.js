var refTmp;


function removeMat($idMat){
    $('#body-removeMat').attr('role',$idMat);
    return true;
}
  function editMat($idMat){
            fillSelectCategories();

       $('#body-editMat').attr('role',$idMat);
          $.getJSON('getInformationMat/'+$idMat, function (data) {
      // Iterate the groups first.
              var ref= data.data[0][0];
              refTmp=ref;
              var categorie= data.data[0][1];
              var description= data.data[0][2];
              $("#RefMatEdit").val(ref);
         		 $("#selectCatEdit").val(categorie);
              $("#DescMatEdit").val(description);
  		});

  }
    function affecterMat($idMat){
        updateLists();
       $('#body-affecter').attr('role',$idMat);

      
    }

    function rendreMatMembre($idMat,$idAffectM){
        updateLists();
       $('#body-RendreMatMembre').attr('role',$idMat);
       $('#body-RendreMatMembre').attr('role2',$idAffectM);


      
    }
    function rendreMatEquipe($idMat,$idAffectE){
        updateLists();
       $('#body-RendreMatEquipe').attr('role',$idMat);
       $('#body-RendreMatEquipe').attr('role2',$idAffectE);

      
    }
   
    
    $( "#addButton" ).click(function() {
      fillSelectCategories();
    });
    function fillSelectCategories(){
      $.getJSON('getSmallCat', function (data) {
          $('#selectCat').empty();
          $('#selectCat').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#selectCat').append($('<option>').text(e[1]).attr('value', e[0]));
        });
      });

      $.getJSON('getSmallCat', function (data) {
          $('#selectCatEdit').empty();
          $('#selectCatEdit').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#selectCatEdit').append($('<option>').text(e[1]).attr('value', e[0]));
        });
      });
    }
    function updateLists(){
      $.getJSON('getAffecterEquipes', function (data) {
          $('#affecterEquipe').empty();
          $('#affecterEquipe').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#affecterEquipe').append($('<option>').text(e[1]).attr('value', e[0]));
        });
      });

      $.getJSON('getAffecterMembres', function (data) {
          $('#affecterMembre').empty();
          $('#affecterMembre').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#affecterMembre').append($('<option>').text(e[1]+" "+e[2]).attr('value', e[0]));
        });
      });
    }

    





      $('#affecterSelect').on('change', function() {
      var val = this.value;
      if(val == 0){
        $('#affecterMembre').prop('disabled', true);
         $('#affecterEquipe').prop('disabled', false);

      }
      else{
         $('#affecterEquipe').prop('disabled', true);
        $('#affecterMembre').prop('disabled', false);
       }

});




$(function () {
      
           var manageMat = $("#tableMat").DataTable({
            'ajax': 'getMat',
             'order': []   
             });
            var manageAffectMembres = $("#tableAffectMembres").DataTable({
            'ajax': 'getHistoriqueMembres',
             'order': []   
             });

            var manageAffectEquipes = $("#tableAffectEquipes").DataTable({
            'ajax': 'getHistoriqueEquipes',
             'order': []   
             });
           $("#submitMatForm").unbind('submit').bind('submit', function() {
           	  var selectCat = $("#selectCat").val();
              var RefMat = $("#RefMat").val().toUpperCase();
              var RefUnique = $('#tableMat td').filter(function (){
              	return $.trim($(this).text()) == RefMat;});


              if(selectCat == "Séléctionner") {
                  $("#selectCat").after('<p class="text-danger">Veuillez choisir la catégorie</p>');
                  $('#selectCat').closest('.form-group').addClass('has-error');
                  if(RefMat == "" ){
                  	$("#RefMat").after('<p class="text-danger">Veuillez saisir la référence</p>');
                  	$('#RefMat').closest('.form-group').addClass('has-error');
                  }
                  else if(RefUnique.length>0){
                  	$("#RefMat").after('<p class="text-danger">Référence déja existe</p>');
                  	$('#RefMat').closest('.form-group').addClass('has-error');
                  }
                  
                }
         	  else if(RefMat == ""){
                  	$("#RefMat").after('<p class="text-danger">Veuillez saisir la référence</p>');
                  	$('#RefMat').closest('.form-group').addClass('has-error');
                  }
                  else if(RefUnique.length>0){
                  	$("#RefMat").after('<p class="text-danger">Référence déja existe</p>');
                  	$('#RefMat').closest('.form-group').addClass('has-error');
                  	return false;
                  }	
              else{
                var form = $(this);
                $("#createMatBtn").button('loading');
                $.ajax({
                  url : form.attr('action'),
                  type: form.attr('method'),
                  data: form.serialize(),
                  dataType: 'json',
                  success:function(response) {
                   $("#createMatBtn").button('reset');
                     if(response.success == true) {
                           manageMat.ajax.reload(null, false);
                           $("#submitMatForm")[0].reset();
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#add-mat-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');
                    $(".alert-success").delay(500).show(10, function() {
                       $(this).delay(3000).hide(10, function() {
                       $(this).remove();
                        });
                       }); // /.alert
                    }  // if
                  } // /success
                  }); // /ajax
               }
              return false;
           });
        
        $('#removeMat').on('click',function(e){
             var idMat = $("#body-removeMat").attr('role');
              $.ajax({
                url: 'deleteMat',
                type: 'post',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content'),"idMat":idMat},
                success:function(response) {
                  $('#removeMatModal').modal('hide');
                  manageMat.ajax.reload(null, false);
                  $('.remove-messagesMat').html('<div class="alert alert-success">'+
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Suppression Effectuée</div>');

                  $(".alert-success").delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                          $(this).remove();
                    });
                  }); // /.alert
                }
             });
        });



        $('#editMatBtn').on('click',function(e){
             var idMatEdit = $("#body-editMat").attr('role');
             var selectCatEdit = $("#selectCatEdit").val();
             var RefMatEdit = $("#RefMatEdit").val().toUpperCase();
             var DescMatEdit = $("#DescMatEdit").val();
              var RefUniqueEdit = $('#tableMat td').filter(function (){
              	return $.trim($(this).text()) == RefMatEdit;});


              if(selectCatEdit == "Séléctionner") {
                  $("#selectCatEdit").after('<p class="text-danger">Veuillez choisir la catégorie</p>');
                  $('#selectCatEdit').closest('.form-group').addClass('has-error');
                  if(RefMatEdit == "" ){
                  	$("#RefMatEdit").after('<p class="text-danger">Veuillez saisir la référence</p>');
                  	$('#RefMatEdit').closest('.form-group').addClass('has-error');
                  }
                  else if(RefUniqueEdit.length>0 && RefMatEdit != refTmp){
                  	$("#RefMatEdit").after('<p class="text-danger">Référence déja existe</p>');
                  	$('#RefMatEdit').closest('.form-group').addClass('has-error');
                  }
                  
                }
         	  else if(RefMatEdit == ""){
                  	$("#RefMatEdit").after('<p class="text-danger">Veuillez saisir la référence</p>');
                  	$('#RefMatEdit').closest('.form-group').addClass('has-error');
                  }
                  else if(RefUniqueEdit.length>0 && refTmp != RefMatEdit){
                  	$("#RefMatEdit").after('<p class="text-danger">Référence déja existe</p>');
                  	$('#RefMatEdit').closest('.form-group').addClass('has-error');
                  	return false;
                  }
             else{
              $.ajax({
                url: 'editMat/'+idMatEdit,
                type: 'post',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content'),"selectCatEdit":selectCatEdit
                ,"RefMatEdit":RefMatEdit,"DescMatEdit":DescMatEdit},
                success:function(response) {
                  manageMat.ajax.reload(null, false);
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#edit-mat-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.message +
          '</div>');
                    $(".alert-success").delay(500).show(10, function() {
                       $(this).delay(3000).hide(10, function() {
                       $(this).remove();
                        });
                       }); // /.alert
                }
             });
           }
            return false;
        });

        $('#affecterMatBtn').on('click',function(e){
             var idMatAffecterEdit = $("#body-affecter").attr('role');
             var membreSelected = $("#affecterMembre").val();
             var equipeSelected = $("#affecterEquipe").val();
             var dateAFF = $("#dateAffect").val()+"  /  "+$("#timeAffect").val();
             var choice = $("#affecterSelect").val();
             var urll;
             var dataChosen;

            
            if(!$("#dateAffect").val() || !$("#timeAffect").val()){
                    $('#tableE').closest('.form-group').addClass('has-error');
                    return false;

            }


              
             else{
              if(choice==1){
                if(membreSelected!="Séléctionner"){
                dataChosen = membreSelected;
                urll = 'affecterForMembre/'+idMatAffecterEdit;
              }
              else{
                    $('#affecterMembre').closest('.form-group').addClass('has-error');
                    return false;
              }
              }
              else{
                 if(equipeSelected!="Séléctionner"){

                dataChosen = equipeSelected;
                urll = 'affecterForEquipe/'+idMatAffecterEdit;
              }
              else{
                    $('#affecterEquipe').closest('.form-group').addClass('has-error');
                    return false;
              }
              }

              $.ajax({
                url: urll,
                type: 'post',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content'),"selected":dataChosen,"dateAFF":dateAFF},
                success:function(response) {
                  $('#affecterMatModal').modal('hide');
                  manageAffectMembres.ajax.reload(null, false);
                  manageAffectEquipes.ajax.reload(null, false);
                  manageMat.ajax.reload(null, false);
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#affecter-mat-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong>Opération réussie</div>');
                    $(".alert-success").delay(500).show(10, function() {
                       $(this).delay(3000).hide(10, function() {
                       $(this).remove();
                        });
                       }); // /.alert
                }
             });
           }
            return false;
        });
        
        $('#rendreMatMembreBtn').on('click',function(e){
             var idMatFromMembre = $("#body-RendreMatMembre").attr('role');
             var affectLineM = $("#body-RendreMatMembre").attr('role2');
             var dateRND = $("#dateRendre").val()+"  /  "+$("#timeRendre").val();
             if(!$("#dateRendre").val() || !$("#timeRendre").val()){
                    $('#tableMM').closest('.form-group').addClass('has-error');
                    return false;

            }
             
              $.ajax({
                url: 'rendreFromMembre/'+idMatFromMembre,
                type: 'post',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content'),"affectLineM":affectLineM,"dateRND":dateRND},
                success:function(response) {
                  $('#rendreMaterielsMembres').modal('hide');
                  manageAffectMembres.ajax.reload(null, false);
                  manageMat.ajax.reload(null, false);
                  $('.rendreMembre-messagesMat').html('<div class="alert alert-success">'+
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Opération Effectuée</div>');

                  $(".alert-success").delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                          $(this).remove();
                    });
                  }); // /.alert
                }
             });
        });
   

        $('#rendreMatEquipeBtn').on('click',function(e){
             var idMatFromEquipe = $("#body-RendreMatEquipe").attr('role');
             var affectLineE = $("#body-RendreMatEquipe").attr('role2');
             var dateRNDE = $("#dateRendreEE").val()+"  /  "+$("#timeRendreEE").val();
              if(!$("#dateRendreEE").val() || !$("#timeRendreEE").val()){
                    $('#tableEE').closest('.form-group').addClass('has-error');
                    return false;

            }
              $.ajax({
                url: 'rendreFromEquipe/'+idMatFromEquipe,
                type: 'post',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content'),"affectLineE":affectLineE,"dateRNDE":dateRNDE},
                success:function(response) {
                  $('#rendreMaterielsEquipes').modal('hide');
                  manageAffectEquipes.ajax.reload(null, false);
                  manageMat.ajax.reload(null, false);
                  $('.rendreEquipe-messagesMat').html('<div class="alert alert-success">'+
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Opération Effectuée</div>');

                  $(".alert-success").delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                          $(this).remove();
                    });
                  }); // /.alert
                }
             });
        });

     });