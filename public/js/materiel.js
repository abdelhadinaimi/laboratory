function removeMat($idMat){
    $('#body-removeMat').attr('role',$idMat);
    return true;
}
function editMat($idMat){
    $('#body-editMat').attr('role',$idMat);
    return true;
}

$(function () {
        
           var manageMat = $("#tableMat").DataTable({
            'ajax': 'getMat',
             'order': []   
             });
            
           $("#submitMatForm").unbind('submit').bind('submit', function() {
              var selectCat = $("#selectCat").val();
              var RefMat = $("#RefMat").val();
              if(selectCat == "Séléctionner") {
                  $("#selectCat").after('<p class="text-danger">Veuillez choisir la catégorie</p>');
                  $('#selectCat').closest('.form-group').addClass('has-error');
                  if(RefMat == ""){
                  	$("#RefMat").after('<p class="text-danger">Veuillez saisir la référence</p>');
                  	$('#RefMat').closest('.form-group').addClass('has-error');
                  }
         	  }
         	  else if(RefMat == ""){
                  	$("#RefMat").after('<p class="text-danger">Veuillez saisir la référence</p>');
                  	$('#RefMat').closest('.form-group').addClass('has-error');
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
             var RefMatEdit = $("#RefMatEdit").val();
             var DescMatEdit = $("#DescMatEdit").val();
             if(false){
             	
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
                           $("#editMatForm")[0].reset();
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
        

     });