var manageCours;//Data Table
//En clickant sur le model on stocke la ref du chapitre à supprimer
  function removeCat(idCat){
    $('#body-remove').attr('role',idCat);
  }
//En clickant sur le model on stocke la ref du chapitre à modifer
 function editCat(idCat,libelle,desc,pubTime,joins){
    $('#body-edit').attr('role',idCat);//stocker la reference
    afficherFiches(joins);
    $('#editCoursLib').val(libelle);
    $('#editCoursDesc').val(desc);
    $('#editPubTime').val(pubTime);
  } 
  //fonction qui traite la suppression d'une fiche -- param = indice de la fiche  
  function delFiche(help){
          var ficheAsupp = help.id;//indice de la fiche
          /** Incrementer les indices pour eviter les conflits **/
          var pere = help.parentNode;
          var frere = pere.nextElementSibling;
           while(frere)
            {
              frere.firstElementChild.nextElementSibling.id -= 1;
              frere = frere.nextElementSibling;
            }
           /***  fin incrémentation ***/
           /*** Eviter les attaques CSSRF ***/
             initialAjax();
             $.ajax({
                  url : "delFiche/"+ficheAsupp+"/"+$("#body-edit").attr('role'),
                  type: 'post',
                  processData:false,
                  contentType:false,
                  dataType: 'json',
                  success:function(response) {
                       if(response.success == true) {
                          $("#"+help.id).parent().remove();//supprimer li
                          manageCours.ajax.reload(null, false);
                          if($('#modifFiches').html() == "")
                            $('#modifFiches').html("<p style='color:red'>La liste des chapitres est vides</p>");
                       }
                  } // /success
               });// /ajax
  }
/* fin de la fonction delete fiche*/
            manageCours = $("#gererCours").DataTable({
            'ajax': 'getCours/'+$('#modId').attr('role')+'',
             'order': []   
             });
            $("#submitCoursForm").unbind('submit').bind('submit', function() {
              var coursLib = $("#coursLib").val();
              var joins = $("#joins").val();
              //var fiche = $("#fiche").val();
              var pubTime= $("#pubTime").val();
              $(".text-danger").remove();
              $('.form-group').removeClass('has-error').removeClass('has-success');
              if(coursLib == ""  || joins == "")
              {
                if(coursLib == "") {
                  $("#coursLib").after('<p class="text-danger">Saisissez le libellé</p>');
                  $('#coursLib').closest('.form-group').addClass('has-error');
                }
                if(joins == "") {
                  $("#joins").after('<p class="text-danger">Entrez un fichier</p>');
                  $('#joins').closest('.form-group').addClass('has-error');
                }
               /*if(fiche == "") {
                  $("#fiche").after('<p class="text-danger">Entrez un fichier</p>');
                  $('#fiche').closest('.form-group').addClass('has-error');
                 }*/
              }
              else{
                initialAjax();
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
                           avertir('#add-cours-messages',response.messages);
                     }  // if
                  } // /success
                  }); // /ajax
               }
              return false;
           });
        $('#removeCoursBtn').on('click',function(e){
             var idCours = $("#body-remove").attr('role');
             initialAjax();
              $.ajax({
                url: 'deleteCour/'+idCours,
                type: 'post',
                dataType: 'json',
                success:function(response) {
                  $('#removeCoursModal').modal('hide');
                  manageCours.ajax.reload(null, false);
                  avertir('.remove-messages',"Suppression Effectuée");
                }
             });
        });
    /** Fonction qui traite l'edit d'un chapitre ***/
   $("#editCoursForm").unbind('submit').bind('submit', function() {
             var idCours = $("#body-edit").attr('role');
             var nvLib = $("#editCoursLib").val();
             $(".text-danger").remove();
             $('.form-group').removeClass('has-error').removeClass('has-success');
             if(nvLib == ""){
                  $("#editCoursLib").after('<p class="text-danger">Saisissez le libellé</p>');
                  $('#editCoursLib').closest('.form-group').addClass('has-error');
             }
             else{
              initialAjax();
              var formData = new FormData(this);//importante pour envoyer plusieurs fichiers
              $.ajax({
                url: 'editCour/'+idCours,
                type: 'post',
                processData:false,
                contentType:false,
                data:formData,
                dataType: 'json',
                success:function(response) {
                  manageCours.ajax.reload(null, false);
                  //$("#editCoursForm")[0].reset();
                  afficherFiches(response.joins);
                  $(".text-danger").remove();
                  $('.form-group').removeClass('has-error').removeClass('has-success');
                  avertir("#edit-cours-messages",response.message);
                }
             });
           }
       return false;
  });

   //function qui traite les évenements
   function avertir(blockApp,repense){
          $(blockApp).html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ repense +
          '</div>');
          $(".alert-success").delay(500).show(10, function() {
                       $(this).delay(3000).hide(10, function() {
                          $(this).remove();
                        });
           }); // /.alert
   }
   function initialAjax(){
    $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
    });
  }
  function afficherFiches(joins){
    var ficheAajoute ="";
    /*** Séparer les fiche pour les afficher ***/
    var fichesJoins = joins.split(",");
    for (var i = 0; i < fichesJoins.length; i++) {
       if(fichesJoins[i] != "0")
          ficheAajoute += "<li><a href='"+fichesJoins[i]+"' target='_blank'>"+fichesJoins[i].substr(17)+"</a>&nbsp;<a href='#' id='"+i+"' onclick='delFiche(this)'>supprimer</a></li>";       else
          ficheAajoute = "<p style='color:red'>La liste est vide</p>";
    }
    //Modification des champs
    $("#modifFiches").html(ficheAajoute); 
  }
