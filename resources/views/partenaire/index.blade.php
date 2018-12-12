@extends('layouts.master')
@section('title','LRI | Liste des thèses')
  @section('header_page')
      <h1>
        Partenaires
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('theses')}}">Partenaires</a></li>
      </ol>
  @endsection
@section('asidebar')
       @component('components.sidebar',['active' => 'Partenaires']) @endcomponent
@endsection

@section('content')
               <ul class="nav nav-tabs">
                    <li class="nav-item active"><a  href="#partenaires" role="tab" data-toggle="tab"
                                    aria-selected="true">Partenaires</a></li>
                    <li class="nav-item"><a  href="#contacts" role="tab" data-toggle="tab"
                                    aria-selected="false">Contacts</a></li>
              </ul>
              <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="partenaires">
                        @component('partenaire.partTab') @endcomponent
                    </div>
                    <div role="tabpanel" class="tab-pane" id="contacts">
                          
                    </div>
              </div>
 @endsection


@section('scripts')
<script>
//passing data when showing modal 
function removePart(idPart){
    $('#body-remove').attr('role',managePart.data()[idPart][0]);
}
function editPart(idPart){
  var bodyEdit = $('#body-edit');
  var data = managePart.data()[idPart];
  bodyEdit.attr('role',data[0]);
  bodyEdit.find("#editPartNom").val(data[1]);
  bodyEdit.find("#editPartDesc").val(data[2]);
  bodyEdit.find("#editPartEmail").val(data[3]);
  bodyEdit.find("#editPartNum").val(data[4]);
}
var managePart;
/* fin */
    $(function () {
        
            managePart = $("#gererPart").DataTable({
                'ajax': 'partenaires/all',
                'columnDefs': [{
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                }]
            });
           $("#submitPartForm").unbind('submit').bind('submit', function() {
              var partNom = $("#partNom");
              if(partNom.val() == "") {
                if(partNom.siblings().length == 0){
                  partNom.after('<p class="text-danger">Saissisz un nom</p>');
                  partNom.closest('.form-group').addClass('has-error');
                }
              }
              else{
                var form = $(this);
                $("#createPartBtn").button('loading');
                $.ajax({
                  url : form.attr('action'),
                  type: form.attr('method'),
                  data: form.serialize(),
                  dataType: 'json',
                  success:function(response) {
                   $("#createPartBtn").button('reset');
                     if(response.success == true) {
                           managePart.ajax.reload(null, false);
                           $("#submitPartForm")[0].reset();
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#add-part-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Ajout avec success</div>');
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
        
        $('#removePartenairesBtn').on('click',function(e){
             var idPart = $("#body-remove").attr('role');
              $.ajax({
                url: 'partenaires/'+idPart,
                type: 'delete',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content')},
                success:function(response) {
                  $('#removePartenairesModal').modal('hide');
                  managePart.ajax.reload(null, false);
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
        
        $('#editPartForm').unbind('submit').bind('submit', function(e) {
             e.preventDefault();
             var idPart = $("#body-edit").attr('role');
             var partNom = $("#editPartNom");
              if(partNom.val() == "") {
                if(partNom.siblings().length == 0){
                $("#editPartNom").after('<p class="text-danger">Saisissez un nom</p>');
                $('#editPartNom').closest('.form-group').addClass('has-error');
                }
             }
             else{
              var form = $(this);
              $.ajax({
                url: 'partenaires/'+idPart+'/edit',
                type: 'post',
                data: form.serialize(),
                dataType: 'json',
                success:function(response) {
                  managePart.ajax.reload(null, false);
                           $("#editPartForm")[0].reset();
                           $(".text-danger").remove();
                           $('.form-group').removeClass('has-error').removeClass('has-success');
                           $('#edit-part-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong>Edition avec success</div>');
                    $(".alert-success").delay(500).show(10, function() {
                       $(this).delay(3000).hide(10, function() {
                       $(this).remove();
                       $("#editPartForm").remove();
                       
                        });
                       }); // /.alert
                }
             });
           }
            return false;
        });


     });
</script>

@endsection