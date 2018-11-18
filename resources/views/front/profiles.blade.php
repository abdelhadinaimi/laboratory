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
                    <tr><td  style="border-bottom: solid;border-color: #FFF;border-width: thin;" align="left"><h5 style="color: #FFF;">Equipe de recherche : {{$membre->equipe->achronymes}}</h5></td></tr>
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
                   <a href="{{$membre->lien_linkedin}}" style="cursor: pointer;width: 265px;height: 50px;" class="btn btn-outline-info m-2" title="Researchgate"><b>LinkedIn</b><img src="{{asset('/linkedin.png')}}"></a>
                    <a href="{{$membre->lien_rg}}" style="cursor: pointer;width: 265px;height: 50px;" class="btn btn-outline-info m-2" title="Researchgate"><b>ResearchGate</b> <img src="{{asset('/rg.png')}}"> </a>
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
                                      
                         <div class="col-md-3">
                            
                    
                            <div class="theme-block theme-block-hover">
                                <div class="theme-block-picture">
                                    <div class="blog-full-date">{{$article->mois}} {{$article->annee}}</div>
                                    <img src="{{ asset('uploads/service-1.jpg')}}" alt="">
                                </div>
                                <div class="theme-block-data service-block-data">
                                    <div class="service-icon"><img src="{{asset($membre->photo)}}" alt="" class="fa"></div>
                                    <br><br><h6 class="paragraph-small paragraph-black service-description">Par {{$membre->prenom}} {{$membre->name}}</h6>
                                    <h6 style="text-align:left"><a href="#">{{$article->resume}}</a></h6>
                                    <p class="paragraph-small paragraph-black service-description">
                                        <span>{{$article->titre}}</span>
                                        <a href="#">(Read More)</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                                    </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="projets">
                                    <div class="p-2">
                                        <h5>Projets</h5>
                                                 <div class="row">
                            @foreach ($membre->projets as $projet) 
                                      
                         <div class="col-md-3">
                            
                    
                            <div class="theme-block theme-block-hover">
                                <div class="theme-block-picture">
                                    <img src="{{ asset('uploads/service-1.jpg')}}" alt="">
                                </div>
                                <div class="theme-block-data service-block-data">
                                    <div class="service-icon"><img src="{{asset($membre->photo)}}" alt="" class="fa"></div>
                                    <br><br><h6 class="paragraph-small paragraph-black service-description"></h6>
                                    <h6 style="text-align:left"><a href="#">{{$projet->intitule}}</a></h6>
                                    <p class="paragraph-small paragraph-black service-description">
                                        <span>{{$projet->resume}}</span>
                                        <a href="#">(Read More)</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                         
                              </div>  
                                    </div>
                                </div>
                        
                            </div> 
                        </div>
                        </div>
        </div>


@endsection