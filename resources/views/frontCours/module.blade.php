@extends('layouts.frontCours')

@section('title','Cours')

@section('content')

    <!-- Jumbotron Header
      <header class="jumbotron my-4" style="background: #002040;">
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
    </div>
      </header>
      Page Features -->
    <!-- <div class="row text-center">
  	@foreach($modules as $module)
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">

            <div class="card-body">
              <h4 class="card-title">{{$module->libelle}}</h4>
              <p class="card-text">{{$module->description}}</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
         @endforeach-->

        <div class="col-sm-12">
            <div class="theme-material-card">
                <div class="sub-ttl">{{$membre->prenom}} {{$membre->name}}</div>
                <div class="row font-16">
                    <div class="col-4">
                        <div class="list-group list-primary" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">A propos</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Articles</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Projects</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Cours</a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                <div class="page-ttl-container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            @if($membre->autorisation_public_photo)
                                                <img src=" {{asset($membre->photo)}}" class="rounded-circle profileImage">
                                            @else
                                                <img src="{{asset('uploads/profile.png')}}" class="rounded-circle profileImage">
                                            @endif
                                        </div>
                                        <div class="col-md-5 align-self-center" style="
    margin: auto;
">
                                            <table width="100%">
                                            
                                                <tr><td  style="border-bottom: solid;border-color: #000;border-width: thin;" align="left"><h5 style="color: #000;">Grade : {{$membre->grade}}</h5></td></tr>
                                                <tr><td  style="border-bottom: solid;border-color: #000;border-width: thin;" align="left"><h5 style="color: #000;">Equipe de recherche : {{$membre->equipe->achronymes}}</h5></td></tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>  <div class="col-md-6">
                                    @if($membre->autorisation_public_date_naiss )
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                            <i class="fa fa-calendar"></i>
                                            <input class="mdl-textfield__input" readonly="true" value="{{$membre->date_naissance}}" type="text" id="profile-birthdate">
                                            <label class="mdl-textfield__label" for="profile-birthdate">Date de naissance</label>
                                        </div>
                                    @endif
                                    @if($membre->autorisation_public_num_tel)
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                            <i class="fa fa-phone"></i>
                                            <input class="mdl-textfield__input" readonly="true" value="{{$membre->num_tel}}" type="text" >
                                            <label class="mdl-textfield__label" for="profile-mobile">N°Téléphone</label>
                                        </div>
                                    @endif

                                </div>
                                <div class="col-md-6">

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                        <i class="fa fa-envelope-o"></i>
                                        <input class="mdl-textfield__input" readonly="true" value="{{$membre->email}}" type="text"  id="profile-email">
                                        <label class="mdl-textfield__label " for="profile-email">Email</label>
                                    </div>
                                </div></div>
                            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
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
                                                'size' => 4])
                                            @endcomponent


                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">   <div role="tabpanel" class="tab-pane" id="projets">
                                    <div class="p-2">
                                        <h5>Projets</h5>
                                        <div class="row">
                                            @foreach ($membre->projets as $projet)
                                                @component('components.projet',[
                                                    'projet' => $projet,
                                                    'size' => 5
                                                    ])
                                                @endcomponent

                                            @endforeach

                                        </div>
                                    </div></div></div>
                            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"><div class="row text-center">
                                    @foreach($modules as $module)

                                        <div class="col-lg-4  mb-4">
                                            <div class="card">

                                                <div class="card-body">
                                                    <h4 class="card-title">{{$module->libelle}}</h4>
                                                    <p class="card-text">{{$module->description}}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="{{url('/frontCours/module/'.$module->id)}}" class="btn btn-primary">Chapitres</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
