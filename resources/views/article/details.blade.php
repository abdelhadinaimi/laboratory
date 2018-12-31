 @extends('layouts.master')

 @section('title','LRI | Détails article')

@section('header_page')
 	<h1>
    Articles
    <small>Détails</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="{{url('articles')}}">Articles</a></li>
    <li class="active">Détails</li>
  </ol>
@endsection

@section('asidebar')
    @component('components.sidebar',['active' => 'Articles']) @endcomponent

@endsection

@section('content')
<div class="row">
      <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                    <strong>Titre</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$article->titre}}
                    </p>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Résumé</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->resume }}
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <strong>Type</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->type }}
                    </p>
                  </div>
                </div>
                  <strong><i class="margin-r-5"></i></strong>
                  <hr>
                  <div class="row">
                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Membres internes</strong>
                  </div>
                  <div class="col-md-9">
                    @foreach($membres as $membre)
                    <ul>
                        <li><a href="{{url('membres/'.$membre->id.'/details')}}">{{ $membre->name }} {{ $membre->prenom }}</a></li>
                    </ul>
                    @endforeach
                  </div>
                </div>
                @if(count($contacts) != 0)
                <div class="row">
                  <div class="col-md-3 " style="padding-top: 20px">
                    <strong><i class="fa fa-user margin-r-5"></i> Membres externes</strong>
                  </div>
                  <div class="col-md-9" style="padding-top: 20px">
                    @foreach($contacts as $contact)
                      <ul>
                          <li>{{ $contact->nom }} {{ $contact->prenom }}</li>
                      </ul>
                    @endforeach
                  </div>
                </div>
                @endif
          
                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                <div class="row">

                  <div class="col-md-3">
                  <strong><i class="margin-r-5"></i>Nom de la conférence</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->conference }}
                    </p>
                  </div>
                </div>

                <div class="row" style="margin-top: 10px">

                  <div class="col-md-3">
                  <strong>Nom du journal</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->journal }}
                    </p>
                  </div>
                </div>

                <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                  <strong>ISSN</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->ISSN }}
                    </p>
                  </div>
                </div>

                <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                  <strong>ISBN</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->ISBN }}
                    </p>
                  </div>
                </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="row">
                  <div class="col-md-3">
                    <strong><i class="fa fa-map-marker  margin-r-5"></i>Lieu</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->lieu_ville }}, {{ $article->lieu_pays }}
                    </p>
                  </div>
                </div>

                  <strong><i class="margin-r-5"></i></strong>
                <hr>

                <div class="row">
                <div class="col-md-3">
                  <strong><i class="fa fa-calendar margin-r-5"></i>Date</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->mois }}, {{ $article->annee }}
                    </p>
                  </div>
                </div>

                <strong><i class="margin-r-5"></i></strong>
                  <hr>

                <div class="row">
                <div class="col-md-3">
                  <strong><i class="fa  fa-link  margin-r-5"></i>DOI</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="#">{{ $article->doi }}</a>
                  </div> 
                  </div>   
                  
                  @if($article->detail)
                  <div class="row" style="margin-top: 10px">
                    <div class="col-md-3">
                      <strong><i class="fa  fa-link  margin-r-5"></i>Détails</strong>                
                    </div>
                    <div class="col-md-9">
                        <a  href="{{asset( $article->detail)}}">Lien fichier</a>
                    </div> 
                  </div> 
                  @endif
              
            </div>
            <!-- /.box-body -->
          </div>
          
         </div><!-- /.container -->
       </div>
      </div>
@endsection