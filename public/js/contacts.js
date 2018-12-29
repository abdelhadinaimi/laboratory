function updateOptions(element){
    var contPart = $(element);
    var data = managePart.data();
    contPart.children().remove();
    for(var i = 0; i < data.length; i++){
        contPart.append(new Option(data[i][1],data[i][0]));
    }
}
function addCont(){
    updateOptions("#contPart");
}
function removeCont(idCont) {
    $('#body-remove-cont').attr('role', idCont);
}
function editCont(idCont) {
    updateOptions("#editContPart");
    var bodyEdit = $('#body-edit-cont');
    var data = manageCont.data()[idCont];
    bodyEdit.attr('role', data[0]);
    bodyEdit.find("#editContNom").val(data[1]);
    bodyEdit.find("#editContPrenom").val(data[2]);
    bodyEdit.find("#editContFonction").val(data[3]);
    bodyEdit.find("#editContNature").val(data[4]);
    bodyEdit.find("#editContEmail").val(data[5]);
    bodyEdit.find("#editContNum").val(data[6]);
    bodyEdit.find("#editContDesc").val(data[7]);
    bodyEdit.find("#editContPart").val(data[9]);
}
var manageCont = $("#gererCont").DataTable({
    'ajax': 'contacts/all',
    'columnDefs': [{
        "targets": [0,9],
        "visible": false,
        "searchable": false
    }],
    "autoWidth": false
});
$("#submitContForm").unbind('submit').bind('submit', function () {
    var form = $(this);
    var errorRequired = false;
    ["Nom", "Prenom", "Part"].forEach(function (e) {
        var cont = form.find("#cont" + e);
        cont.siblings().remove();
        cont.closest('.form-group').removeClass('has-error');
        if (cont.val() == "") {
            if (cont.siblings().length == 0) {
                cont.after('<p class="text-danger">Ce champ est obligatoire</p>');
                cont.closest('.form-group').addClass('has-error');

            }
            errorRequired = true;
        }
    });
    if (errorRequired) return false;
    $("#createContBtn").button('loading');
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        dataType: 'json',
        success: function (response) {
            $("#createContBtn").button('reset');
            if (response.success == true) {
                manageCont.ajax.reload(null, false);
                $("#submitContForm")[0].reset();
                $(".text-danger").remove();
                $('.form-group').removeClass('has-error').removeClass('has-success');
                $('#add-cont-messages').html('<div class="alert alert-success">' +
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Ajout avec success</div>');
                $(".alert-success").delay(500).show(10, function () {
                    $(this).delay(3000).hide(10, function () {
                        $(this).remove();
                    });
                }); // /.alert
            }  // if
        },
        error: function (error) {
            $("#createContBtn").button('reset');
        }
    }); // /ajax
    return false;
});

$('#removeContactsBtn').on('click', function (e) {
    var idCont = $("#body-remove-cont").attr('role');
    $.ajax({
        url: 'contacts/' + idCont,
        type: 'delete',
        dataType: 'json',
        data: { "_token": $('meta[name="csrf-token"]').attr('content') },
        success: function (response) {
            $('#removeContactsModal').modal('hide');
            manageCont.ajax.reload(null, false);
            $('.remove-messages').html('<div class="alert alert-success">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Suppression Effectuée</div>');

            $(".alert-success").delay(500).show(10, function () {
                $(this).delay(3000).hide(10, function () {
                    $(this).remove();
                });
            }); // /.alert
        }
    });
});

$('#editContForm').unbind('submit').bind('submit', function (e) {
    e.preventDefault();
    var form = $(this);
    var idCont = $("#body-edit-cont").attr('role');
    var errorRequired = false;
    ["Nom", "Prenom", "Part"].forEach(function (e) {
        var cont = form.find("#editCont" + e);
        cont.siblings().remove();
        cont.closest('.form-group').removeClass('has-error');
        if (cont.val() == "") {
            if (cont.siblings().length == 0) {
                cont.after('<p class="text-danger">Ce champ est obligatoire</p>');
                cont.closest('.form-group').addClass('has-error');

            }
            errorRequired = true;
        }
    });
    if (errorRequired) return false;
    var form = $(this);
    $.ajax({
        url: 'contacts/' + idCont + '/edit',
        type: 'post',
        data: form.serialize(),
        dataType: 'json',
        success: function (response) {
            manageCont.ajax.reload(null, false);
            $(".text-danger").remove();
            $('.form-group').removeClass('has-error').removeClass('has-success');
            $('#edit-cont-messages').html('<div class="alert alert-success">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong>Edition avec success</div>');
            $(".alert-success").delay(500).show(10, function () {
                $(this).delay(3000).hide(10, function () {
                    $(this).remove();
                });
            }); // /.alert
        },
        error: function(error){
            error = error.responseJSON.errors;
            Object.keys(error).forEach(function(e) {
                var cont = form.find("[name="+e+"]");
                if (cont.siblings().length == 0) {
                    cont.after('<p class="text-danger">'+error[e][0]+'</p>');
                    cont.closest('.form-group').addClass('has-error');
                }
            });
        }
    });

    return false;
});



