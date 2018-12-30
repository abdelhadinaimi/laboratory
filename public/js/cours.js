function removeCat(idCat){
    $('#body-remove').attr('role',idCat);
}
function editCat(idCat,libelle,desc,pubTime){
    $('#body-edit').attr('role',idCat);
    $('#editCoursLib').val(libelle);
    $('#editCoursDesc').val(desc);
    $('#editPubTime').val(pubTime);
}
/* fin */
    $(function () {
           var manageCours = $("#gererCours").DataTable({
            'ajax': 'getCours/'+$('#modId').attr('role')+'',
             'order': []   
             });
            $("#submitCoursForm").unbind('submit').bind('submit', function() {
              $.ajaxSetup({
              headers: {
             'X-CSRF-TOKEN': $('input[name="_token"]').val()
              }
             });
              var coursLib = $("#coursLib").val();
              var fiche = $("#fiche").val();
              var pubTime= $("#pubTime").val();
              $(".text-danger").remove();
              $('.form-group').removeClass('has-error').removeClass('has-success');
              if(coursLib == "" || fiche == "" || pubTime == "")
              {
                if(coursLib == "") {
                  $("#coursLib").after('<p class="text-danger">Saisissez le libellé</p>');
                  $('#coursLib').closest('.form-group').addClass('has-error');
                }
               if(fiche == "") {
                  $("#fiche").after('<p class="text-danger">Entrez un fichier</p>');
                  $('#fiche').closest('.form-group').addClass('has-error');
                 }
              if(pubTime == "") {
                  $("#pubTime").after('<p class="text-danger">Entrez la date du publication</p>');
                  $('#pubTime').closest('.form-group').addClass('has-error');
                 }
              }
              else{
                var formData = new FormData(this);
                $("#createCoursBtn").button('loading');
                $.ajax({
                  url : $(this).attr('action'),
                  type: 'post',
                  processData:false,
                  contentType:false,
                  data: formData,
                  dataType: 'json',
                  success:function(response) {
                   $("#createCoursBtn").button('reset');

                     if(response.success == true) {
                           manageCours.ajax.reload(null, false);
                           $("#submitCoursForm")[0].reset();
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#add-cours-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');
                    $(".alert-success").delay(500).show(10, function() {
                       $(this).delay(3000).hide(10, function() {
                       $(this).remove();
                        });
                       }); // /.alert
                    }  // if
                    else{
                      $('#add-cours-messages').html('<div class="alert alert-danger">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-remove"></i></strong> '+ response.messages +
          '</div>');
                    $(".alert-danger").delay(500).show(10, function() {
                       $(this).delay(5000).hide(10, function() {
                       $(this).remove();
                        });
                       }); // /.alert
                    }
                  } // /success
                  }); // /ajax
               }
              return false;
           });
        $('#removeCoursBtn').on('click',function(e){
             var idCours = $("#body-remove").attr('role');
             $.ajaxSetup({
              headers: {
             'X-CSRF-TOKEN': $('input[name="_token"]').val()
              }
             });
              $.ajax({
                url: 'deleteCour/'+idCours,
                type: 'post',
                dataType: 'json',
                success:function(response) {
                  $('#removeCoursModal').modal('hide');
                  manageCours.ajax.reload(null, false);
                  $('.remove-messages').html('<div class="alert alert-success">'+
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
        $("#editCoursForm").unbind('submit').bind('submit', function() {
             var idCours = $("#body-edit").attr('role');
             var nvLib = $("#editCoursLib").val();
             var editFiche = $("#editFiche").val();
             $(".text-danger").remove();
             $('.form-group').removeClass('has-error').removeClass('has-success');
             if(nvLib == "")
              { 
                if(nvLib == ""){
                  $("#editCoursLib").after('<p class="text-danger">Saisissez le libellé</p>');
                  $('#editCoursLib').closest('.form-group').addClass('has-error');
                }
             }
             else{
              $.ajaxSetup({
              headers: {
             'X-CSRF-TOKEN': $('input[name="_token"]').val()
              }
             });
              var formData = new FormData(this);
              $.ajax({
                url: 'editCour/'+idCours,
                type: 'post',
                  processData:false,
                  contentType:false,
                data:formData,
                 dataType: 'json',
                success:function(response) {
                  manageCours.ajax.reload(null, false);
                           $("#editCoursForm")[0].reset();
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#edit-cours-messages').html('<div class="alert alert-success">'+
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
