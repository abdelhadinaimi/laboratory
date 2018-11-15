@extends('layouts.master')

@section('title','LRI | Ajouter un membre')

@section('header_page')

      <h1>
        Membres
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('membres')}}">Membres</a></li>
        <li class="active">Nouveau</li>
      </ol>

@endsection

@section('asidebar')

        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>

        <li>
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>

        
        <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        
       
        
          @if(Auth::user()->role->nom == 'admin' )

          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
          @endif
     @endsection

@section('content')

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" method="POST" action="{{url('membres')}}" id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau Membre</b></h2></center></legend><br>

                <!-- Text input-->
                    <div class="col-md-5">

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nom *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('name')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="name" placeholder="Nom" class="form-control"  type="text" value="{{old('name')}}">
                           </div>
                            <span class="help-block">
                                @if($errors->get('name'))
                                  @foreach($errors->get('name') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>


                       <!-- Text input-->

                      <div class="form-group">
                        <label class="col-md-3 control-label">Prénom *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="prenom" placeholder="Prénom" class="form-control"  type="text" value="{{old('prenom')}}">
                          </div>
                            <span class="help-block">
                                @if($errors->get('prenom'))
                                  @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>


                       <div class="form-group"> 
                          <label class="col-md-3 control-label">Grade *</label>
                            <div class="col-md-9 selectContainer @if($errors->get('grade')) has-error @endif">
                              <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                  <select name="grade" class="form-control selectpicker">
                                    <option>{{old('grade')}}</option>
                                    <option>MAA</option>
                                    <option>MAB</option>
                                    <option>MCA</option>
                                    <option>MCB</option>
                                    <option>Doctorant</option>
                                    <option>Professeur</option>
                                  </select>

                              </div>
                              <span class="help-block">
                                @if($errors->get('grade'))
                                  @foreach($errors->get('grade') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                            </div>
                      </div>

                      <div class="form-group"> 
                          <label class="col-md-3 control-label">Equipe *</label>
                            <div class="col-md-9 selectContainer @if($errors->get('equipe')) has-error @endif">
                              <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                  <select name="equipe" class="form-control selectpicker">
                                    <option></option>
                                     @foreach($equipes as $equipe)
                                    <option value="{{$equipe->id}}">{{$equipe->intitule}}</option>
                                    @endforeach
                                  </select>

                              </div>

                              <span class="help-block">
                                @if($errors->get('equipe_id'))
                                  @foreach($errors->get('equipe_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                            </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">E-Mail *</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('email')) has-error @endif">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}" >
                            </div>
                            <span class="help-block">
                                @if($errors->get('email'))
                                  @foreach($errors->get('email') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Password *</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('password')) has-error @endif">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa  fa-lock"></i></span>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <span class="help-block">
                                @if($errors->get('password'))
                                  @foreach($errors->get('password') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                      </div>

                    </div>

                    
                <div class="col-md-7">
                    <div class="row">
                      <div class="col-md-9">
                      <div class="form-group">
                            <label class="col-md-4 control-label">Date De Naissance</label>  
                            <div class="col-md-8 inputGroupContainer input-group Date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input name="date_naissance"type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{old('date_naissance')}}">
                            </div>
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                            <label class="col-md-4 control-label" title="publique?">
                              <input name="autorisation_public_date_naiss" type="checkbox" class="flat-red" value="0" >
                            </label>  
                            <label class="control-label">publique ?</label> 
                           </div>
                         </div>
                    </div>

                    <div class="row">
                      <div class="col-md-9">
                      <div class="form-group">
                              <label class="col-md-4 control-label">N° Téléphone</label>  
                                <div class="col-md-8 input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-phone"></i>
                                </div>
                                <input name="num_tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{old('num_tel')}}">
                              </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                            <label class="col-md-4 control-label" title="publique?">
                              <input name="autorisation_public_num_tel" type="checkbox" class="flat-red" value="0">
                            </label>  
                            <label class="control-label">publique ?</label> 
                           </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-9">
                      <div class="form-group">
                              <label class="col-md-4 control-label">Linkedin</label>  
                                <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa  fa-linkedin-square"></i></span>
                                <input name="lien_linkedin" type="text" class="form-control" placeholder="URL" value="{{old('lien_linkedin')}}">
                              </div>
                              </div>
                        </div>
                     </div>
                    <!--  <div class="col-md-3">
                      <div class="form-group">
                            <label class="col-md-4 control-label" title="publique?">
                              <input name="autorisation_public_linkedin" type="checkbox" class="flat-red" value="1">
                            </label>  
                            <label class="control-label">publique ?</label> 
                           </div>
                         </div> -->
                    </div>

                    <div class="row">
                      <div class="col-md-9">
                      <div class="form-group">
                              <label class="col-md-4 control-label">ResearshGate</label>  
                                <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="lien_rg" type="text" class="form-control" placeholder="URL" value="{{old('lien_rg')}}">
                              </div>
                              </div>
                          </div>
                     </div>
                     <!-- <div class="col-md-3">
                      <div class="form-group">
                            <label class="col-md-4 control-label" title="publique?">
                              <input name="autorisation_public_rg" type="checkbox" class="flat-red" value="1">
                            </label>  
                            <label class="control-label">publique ?</label> 
                           </div>
                         </div> -->
                    </div>

                    <div class="row">
                         <div class="col-md-9">
                           <div class="form-group">
                              <label class="col-md-4 control-label">Photo</label>  
                              <div class="col-md-8 inputGroupContainer">
                              <input name="img" type="file" >
                             </div>
                            </div>
                          </div>

                         <div class="col-md-3">
                           <div class="form-group">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_photo" type="checkbox" class="flat-red" value="0">
                            </label>  
                            <label class="control-label">publique ?</label> 
                           </div>
                         </div>
                       </div>
                     </div>

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('membres')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>

  @endsection

  