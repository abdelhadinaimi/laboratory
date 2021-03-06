@extends('layouts.frontMaster')

@section('title','Profile')

@section('content')

<div class="page-ttl">
        <div class="layer-stretch">
            <div class="page-ttl-container">
            <div class="row justify-content-center">
            <div class="col-md-3">

                <img src=" {{asset($membre->photo)}}" class="rounded-circle profileImage">
                </div>
                <div class="col-md-5 align-self-center ">
                <table width="100%">
                  <tr><td  style="border-bottom: solid;border-color: #FFF;border-width: thin;" align="left"><h3 style="color: #FFF;">{{$membre->prenom}} {{$membre->name}}  </h3></td></tr>
                    <tr><td  style="border-bottom: solid;border-color: #FFF;border-width: thin;" align="left"><h5 style="color: #FFF;">Grade : {{$membre->grade}}</h5></td></tr>
                    <tr><td  style="border-bottom: solid;border-color: #FFF;border-width: thin;" align="left"><h5 style="color: #FFF;">Equipe de recherche : @if($membre->equipe){{$membre->equipe->achronymes}}@else Non renseignée @endif</h5></td></tr>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div><!-- End Page Title Section -->
    <!-- Start My Profile Section -->
    <div id="profile-page" style="min-height: 100%" class="layer-stretch">
            <div class="theme-material-card">
                            <ul style="border-bottom: solid;border-width: thin;border-color: #b3d4fc" class="nav nav-pills justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">À propos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pulications" role="tab" data-toggle="tab">Articles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#projets" role="tab" data-toggle="tab">Projets</a>
                                </li>
                                @if($membre->these)
                                <li class="nav-item">
                                    <a class="nav-link" href="#these" role="tab" data-toggle="tab">Thèse</a>
                                </li>
                                @endif

                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="profile">
                                        <div class="p-2">
                                        <h5>À propos</h5>
                           <div class="row">
                    <div class="col-md-6">
                     
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-calendar"></i>
                            <input class="mdl-textfield__input" readonly="true" value="{{$membre->date_naissance}}" type="text" id="profile-birthdate">
                            <label class="mdl-textfield__label" for="profile-birthdate">Date de naissance</label>
                        </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-phone"></i>
                            <input class="mdl-textfield__input" readonly="true" value="{{$membre->num_tel}}" type="text" >
                            <label class="mdl-textfield__label" for="profile-mobile">N°Téléphone</label>
                        </div>
                    
                       
                        </div>
                    <div class="col-md-6">
                        
                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-envelope-o"></i>
                            <input class="mdl-textfield__input" readonly="true" value="{{$membre->email}}" type="text"  id="profile-email">
                            <label class="mdl-textfield__label " for="profile-email">Email</label>
                        </div>
                        <div class="row" >
                        <a target="_blank" href="/frontCours/{{$membre->id}}" style="border-radius:20px;cursor: pointer;width: 170px;height: 50px;line-height: 3;" class="btn btn-outline-info m-2" title="Lien personnel"><b>Lien personnel</b></a>
                   <a target="_blank" href="{{$membre->lien_linkedin}}" style="border-radius:20px;cursor: pointer;width: 170px;height: 50px;line-height: 3;" class="btn btn-outline-info m-2" title="Researchgate"><b>LinkedIn</b><img src="{{asset('/linkedin.png')}}"></a>
                    <a target="_blank" href="{{$membre->lien_rg}}" style="border-radius:20px;cursor: pointer;width: 170px;height: 50px;line-height: 3;" class="btn btn-outline-info m-2" title="Researchgate"><b>ResearchGate</b> <img src="{{asset('/rg.png')}}"> </a>
                </div>


                    </div>
                
                </div>
                
                  
                                        </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="pulications">
                                    <div class="p-2">
                                        <h5>Articles</h5>
                                                 <div class="row">
                        @foreach ($membre->articles as $article) 
                        <?php $type = str_replace(' ','',$article->type); ?>
                        
                        @component('components.article',[
                            'pub' => $article,
                            'type' => $type,
                            'photo' => $membre->photo,
                            'users' => $article->users,
                            'size' => 3])
                        @endcomponent


                        @endforeach
                        
                                    </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="projets">
                                    <div class="p-2">
                                        <h5>Projets</h5>
                                                 <div class="row">
                            @foreach ($membre->projets as $projet) 
                                @component('components.projet',[
                                    'projet' => $projet,
                                    'size' => 3
                                    ])
                                @endcomponent
                                        
                            @endforeach
                         
                              </div>  
                                    </div>
                                </div>
                            <div role="tabpanel" class="tab-pane" id="these">
                                    @if($membre->these)

                                    <div class="p-2">
                                        <h5>Thèse [<i class="fa fa-file-pdf-o"></i> <a href="{{$membre->these->detail}}">Détails</a>]</h5>
                                                 <div class="row">
                                    <div class="col-md-6">
                     
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-mortar-board"></i>
                            <input class="mdl-textfield__input" readonly="true" value="{{$membre->these->titre}}" type="text" id="profile-birthdate">
                            <label class="mdl-textfield__label" for="profile-birthdate">Titre</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-calendar"></i>
                            <input class="mdl-textfield__input" readonly="true" value="@if($membre->these->date_soutenance){{$membre->these->date_soutenance}} @else Non renseigné @endif" type="text" id="profile-birthdate">
                            <label class="mdl-textfield__label" for="profile-birthdate">Soutenu le</label>
                        </div>
                      
                    
                       
                        </div>
                                 <div class="col-md-6">
                     
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-user"></i>
                            <input class="mdl-textfield__input" readonly="true" value="{{$membre->these->encadreur_int}} @if($membre->these->encadreur_ext),{{$membre->these->encadreur_ext}} @endif" type="text" id="profile-birthdate">
                            <label class="mdl-textfield__label" for="profile-birthdate">Encadreurs</label>
                        </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                            <i class="fa fa-user"></i>
                            <input class="mdl-textfield__input" readonly="true" value="@if($membre->these->coencadreur_int){{$membre->these->coencadreur_int}},@endif @if($membre->these->coencadreur_ext){{$membre->these->coencadreur_ext}}@endif" type="text" >
                            <label class="mdl-textfield__label" for="profile-mobile">Co-encadreurs</label>
                        </div>
                    
                       
                        </div>
                              </div>
                              <div class="row">
                              <div class="col-md-12">
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon {!! $errors->has('msg') ? 'is-invalid' : '' !!}">
                            <i class="fa fa-mortar-board"></i>
                                            <textarea readonly="true" rows="6" cols="5" class="mdl-textfield__input" id="contact-message" name="msg">{{$membre->these->sujet}}</textarea>
                                            <label class="mdl-textfield__label" for="contact-message">Sujet</label>
                                        </div>
                              </div>
                              </div>
                                    </div>
                                    @endif
                                </div>
                            </div> 
                        </div>
                        </div>
        </div>


@endsection