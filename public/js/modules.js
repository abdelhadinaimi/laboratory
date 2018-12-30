$(function () {
$("#submitModForm").unbind('submit').bind('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});
    var modLib = $("#modLib").val();
    var descMod = $("#coursDesc").val();
     $(".text-danger").remove();
     $('.form-group').removeClass('has-error').removeClass('has-success');
              if(modLib == "") {
                  $("#modLib").after('<p class="text-danger">Saissisez le libellé</p>');
                  $('#modLib').closest('.form-group').addClass('has-error');
              }
              else 
              {
                var form = $(this);
                $("#createModBtn").button('loading');
                $.ajax({
                  url : "createModule",
                  type: "POST",
                  data: {"modLib":modLib,"descMod":descMod},
                  dataType: 'json',
                  success:function(response) {
                   $("#createModBtn").button('reset');
                     if(response.success == true) {
                          $('#contentMod').append(response.messages);
                           $("#submitModForm")[0].reset();
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#add-mod-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Module ajouté</div>');
                    $(".alert-success").delay(500).show(10, function() {
                       $(this).delay(3000).hide(10, function() {
                       $(this).remove();
                        });
                       }); // /.alert

                    }  // if
                    else{
                      $('#add-mod-messages').html('<div class="alert alert-danger">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-remove"></i></strong> '+ response.messages +
          '</div>');
                    $(".alert-danger").delay(500).show(10, function() {
                       $(this).delay(5000).hide(10, function() {
                       $(this).remove();
                        });
                       }); // /.alert
                    }
                  }
              });
          }
  });
$('#contentMod').on('click','.removeMod',function(){
   $('#body-remove').attr('role',$(this).attr('role'));
});
$('#contentMod').on('click','.editMod',function(){
   $('#body-edit').attr('role',$(this).attr('role'));
   $('#editModLib').val($(this).parent().find('h3').text());
   $('#editModDesc').text($(this).parent().find('p').text());
});
$('#removeModBtn').on('click',function(e){
              $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});
             var idMod = $("#body-remove").attr('role');
              $.ajax({
                url: 'deleteModule',
                type: 'post',
                dataType: 'json',
                data: {"idMod":idMod},
                success:function(response) {
                   $("#"+idMod).remove();
                  $('#removeModModal').modal('hide');
                  $('.remove-messages').html('<div class="alert alert-success">'+
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Suppression Effectuée</div>');
                   
                  $(".alert-success").delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                          $(this).remove();
                    });
                  }); // /.alert
                  //document.location.reload()
                 
                }
             });
        });

$('#editModBtn').on('click',function(e){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});
             var idMod = $("#body-edit").attr('role');
             var nvModLib = $("#editModLib").val();
             var nvModDesc = $("#editModDesc").val();
             $(".text-danger").remove();
             $('.form-group').removeClass('has-error').removeClass('has-success');
             if(nvModLib == ""){
                $("#editModLib").after('<p class="text-danger">Saissisz le libellé</p>');
                $('#editModLib').closest('.form-group').addClass('has-error');
             }
             else{
              $.ajax({
                url: 'editMod/'+idMod,
                type: 'post',
                dataType: 'json',
                data: {"nvModLib":nvModLib,"nvModDesc":nvModDesc},
                success:function(response) {
                           $('[role="'+idMod+'"]').parent().find('h3').text(nvModLib);
                           $('[role="'+idMod+'"]').parent().find('p').text(nvModDesc);
                           $('#editModDesc').text($(this).parent().find('p').text());
                           $("#editModForm")[0].reset();
                           $("#editModDesc").val("");
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#edit-mod-messages').html('<div class="alert alert-success">'+
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