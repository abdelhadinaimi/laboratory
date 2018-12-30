updateLists();
function removeStage($idStage){
    $('#body-removeStage').attr('role',$idStage);
    return true;
}
  function editStage($idStage,$stagiaire,$partenaire,$contact,$debut,$fin){
      $('#body-editStage').attr('role',$idStage);            
      $.getJSON('getAffecterMembres', function (data) {
          $('#stagiaireEdit').empty();
          $('#stagiaireEdit').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#stagiaireEdit').append($('<option>').text(e[1]+" "+e[2]).attr('value', e[0]));
        });
                   $("#stagiaireEdit").val($stagiaire);

      });
      $.getJSON('getListPartenaires', function (data) {
          $('#partenaireEdit').empty();
          $('#partenaireEdit').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#partenaireEdit').append($('<option>').text(e[1]).attr('value', e[0]));
        });
         $("#partenaireEdit").val($partenaire);

      });
          $.getJSON('getListContacts/'+$partenaire, function (data) {
          $('#contactEdit').empty();
          $('#contactEdit').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#contactEdit').append($('<option>').text(e[1]).attr('value', e[0]));
        });
                 $("#contactEdit").val($contact);
      });
      
    
        $("#dateDebutStageEdit").val($debut);
        $("#dateFinStageEdit").val($fin);

  }
  

function updateLists(){
         $.getJSON('getAffecterMembres', function (data) {
          $('#stagiaire').empty();
          $('#stagiaire').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#stagiaire').append($('<option>').text(e[1]+" "+e[2]).attr('value', e[0]));
        });
      });
      $.getJSON('getListPartenaires', function (data) {
          $('#partenaire').empty();
          $('#partenaire').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#partenaire').append($('<option>').text(e[1]).attr('value', e[0]));
        });
      });


          $('#contact').empty();
 }


    $('#partenaire').on('change', function() {
      var val = this.value;
      if(val != "Séléctionner"){
      console.log("Valeur :: "+val);
        $.getJSON('getListContacts/'+val, function (data) {
          $('#contact').empty();
          $('#contact').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#contact').append($('<option>').text(e[1]).attr('value', e[0]));
        });
      });

      }
      else{
         $('#contact').empty();

      }
      

    });

  $('#partenaireEdit').on('change', function() {
      var val = this.value;
      if(val != "Séléctionner"){
      console.log("Valeur :: "+val);
        $.getJSON('getListContacts/'+val, function (data) {
          $('#contactEdit').empty();
          $('#contactEdit').append($('<option>').text("Séléctionner").attr('value',"Séléctionner"));
          data.data.forEach(e => {
          $('#contactEdit').append($('<option>').text(e[1]).attr('value', e[0]));
        });
      });

      }
      else{
         $('#contactEdit').empty();

      }

    });




$(function () {
      
           var manageStage = $("#tableStage").DataTable({
                destroy: true,
            'ajax': 'getStages',
             'order': []   
             });
           
           $("#submitStageForm").unbind('submit').bind('submit', function() {
              var stagiaire = $("#stagiaire").val();
              var partenaire = $("#partenaire").val();
              var contact = $("#contact").val();

              	


              if(stagiaire == "Séléctionner") {
                  $('#stagiaire').closest('.form-group').addClass('has-error');
                  return false;
               }
               if(partenaire == "Séléctionner") {
                  $('#partenaire').closest('.form-group').addClass('has-error');
                  return false;
               }
               if(contact == "Séléctionner" || contact == null ) {
                  $('#contact').closest('.form-group').addClass('has-error');
                  return false;
               }
               if(!$("#dateDebutStage").val()) {
                  $('#dateDebutStage').closest('.form-group').addClass('has-error');
                  return false;
               }
               if(!$("#dateFinStage").val()) {
                  $('#dateFinStage').closest('.form-group').addClass('has-error');
                  return false;
               }
              	
              else{
                var form = $(this);
                $("#createStageBtn").button('loading');
                $.ajax({
                  url : form.attr('action'),
                  type: form.attr('method'),
                  data: form.serialize(),
                  dataType: 'json',
                  success:function(response) {
                   $("#createStageBtn").button('reset');
                     if(response.success == true) {
                           manageStage.ajax.reload(null, false);
                           updateLists();
                           $("#submitStageForm")[0].reset();
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#add-stages-messages').html('<div class="alert alert-success">'+
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
        
        $('#removeStage').on('click',function(e){
             var idStage = $("#body-removeStage").attr('role');
              $.ajax({
                url: 'deleteStage',
                type: 'post',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content'),"idStage":idStage},
                success:function(response) {
                  $('#removeStageModal').modal('hide');
                  manageStage.ajax.reload(null, false);
                  $('.remove-messagesStage').html('<div class="alert alert-success">'+
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



        $('#editStageBtn').on('click',function(e){
             var idStageEdit = $('#body-editStage').attr('role');            

             var stagiaireEdit = $("#stagiaireEdit").val();
              var partenaireEdit = $("#partenaireEdit").val();
              var contactEdit = $("#contactEdit").val();
              var dateDebutStageEdit = $("#dateDebutStageEdit").val();
              var dateFinStageEdit = $("#dateFinStageEdit").val();


              if(stagiaireEdit == "Séléctionner") {
                  $('#stagiaireEdit').closest('.form-group').addClass('has-error');
                  return false;
               }
               if(partenaireEdit == "Séléctionner") {
                  $('#partenaireEdit').closest('.form-group').addClass('has-error');
                  return false;
               }
               if(contactEdit == "Séléctionner" || contactEdit == null ) {
                  $('#contactEdit').closest('.form-group').addClass('has-error');
                  return false;
               }
               if(!$("#dateDebutStageEdit").val()) {
                  $('#dateDebutStageEdit').closest('.form-group').addClass('has-error');
                  return false;
               }
               if(!$("#dateFinStageEdit").val()) {
                  $('#dateFinStageEdit').closest('.form-group').addClass('has-error');
                  return false;
               }
             else{
              $.ajax({
                url: 'editStage/'+idStageEdit,
                type: 'post',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content'),"stagiaireEdit":stagiaireEdit
                ,"partenaireEdit":partenaireEdit,"contactEdit":contactEdit
              ,"dateDebutStageEdit":dateDebutStageEdit,"dateFinStageEdit":dateFinStageEdit},
                success:function(response) {
                  manageStage.ajax.reload(null, false);
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#edit-stage-messages').html('<div class="alert alert-success">'+
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

 });