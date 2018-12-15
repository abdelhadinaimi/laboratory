
 @extends('layouts.master')

@section('title','LRI | Messages')

@section('header_page')

     <h1>
       Messages
       <small>Liste</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li class="active">Messages</a></li>
     </ol>

@endsection

@section('asidebar')
@component('components.sidebar',['active' => 'Messages']) @endcomponent

 @endsection

@section('content')


   <div class="row">
     <div class="col-md-12">
       <div class="box col-xs-12">
         <div class="container" style="padding-top: 30px">
         <div class="row" style="padding-bottom: 20px">
            <div class="box-header col-xs-9">
             <h3 class="box-title">Liste des messages</h3>
           </div>
         </div>
         </div>
           
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sujet</th>
                 <th>De</th>
                 <th>Telephone</th>
                 <th>Email</th>
                 <th>Date</th>
                 <th>Actions</th>
               </tr>
               </thead>
               <tbody>
                 @foreach($messages as $message)
                 <tr id="msg-{{$message->id}}">
                   <td>{{$message->sujet}}</td>
                   <td>{{$message->nom}}</td>
                   <td>{{$message->telephone}}</td>
                   <td>{{$message->email}}</td>
                   <td>{{$message->created_at}}</td>
                   <td>
                     <div class="btn-group">
                        <a role="button" class="btn btn-info" data-target="#afficherModal" data-toggle="modal"><i class="fa fa-eye"></i></a>
                        <div class="modal fade" id="afficherModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h4>Sujet : {{$message->sujet}}</h4>
                                        <p>{{$message->msg}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a role="button" class="a-supprimerModal btn btn-danger" data-id="{{$message->id}}" data-target="#supprimerModal" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                    </div>
                   </td>
                 </tr>
                 @endforeach
                 
                </tbody>
               <tfoot>
               <tr>
                 <th>Sujet</th>
                 <th>De</th>
                 <th>Telephone</th>
                 <th>Email</th>
                 <th>Date</th>
                 <th>Actions</th>
               </tr>
               </tfoot>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
       
     </div>
   </div>
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    Voulez-vous vraiment effectuer la suppression ? 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                    <button id="delete-confirm" type="submit" class="btn btn-danger">Oui</button>
                </div>
            </div>
        </div>
    </div>
  
@endsection

@section('scripts')
<script>
    var messageID;
    $(document).on("click", ".a-supprimerModal", function(){
        messageID = $(this).data('id');
    });
    $("#delete-confirm").click(function() {
        $.ajax({
            url:'/message/'+messageID,
            type: 'delete',
            dataType: 'json',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                if(response.success){
                    $("#supprimerModal").modal("hide");
                    $("#msg-"+messageID).remove();
                }
            }
        })
    });
    </script>
 @endsection