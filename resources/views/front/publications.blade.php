@extends('layouts.frontMaster')
@section('title','publications')
<!-- Affiche moi toutes Les publications -->
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('slider/price_range_style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    
    <script src="{{ asset('slider/price_range_script.js')}}"></script>
    <!-- Start Blog List Section -->
    <div class="layer-stretch">
        <div class="layer-wrapper">
            <div class="row">
                <div class="col-lg-4">
                    <div class="theme-material-card text-center">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                            <input class="mdl-textfield__input" type="text" id="sidebar-search">
                            <label class="mdl-textfield__label" for="sidebar-search">Rechercher</label>
                            <button class="fa fa-search search-button"></button>
                        </div>
                    </div>
                    <!--<div class="theme-material-card">
                        <div class="sub-ttl">Trending Post</div>
                        <div class="flexslider theme-flexslider">
                            <ul class="slides">
                                <li>
                                    <div class="theme-flexslider-container">
                                        <img src="uploads/blog-1.jpg" alt="" />
                                        <h4 class="font-16 text-left"><a href="#">Why Food Poisoning happened and How To – Home Remedy</a></h4>
                                        <p class="text-left primary-color">24 Aug 2017</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="theme-flexslider-container">
                                        <img src="uploads/blog-2.jpg" alt="" />
                                        <h4 class="font-16 text-left"><a href="#">All you need to know about Chinese Food, Is it good or bad?</a></h4>
                                        <p class="text-left primary-color">24 Jul 2017</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>-->
                    <?php $nbrPub = 0; ?>
                    <div class="theme-material-card">
                        <div class="sub-ttl">Filtrer Par Equipe</div>
                        <ul class="category-list">
                            @foreach($equipes as $equipe)
                                     <!-- Obtenir pour chaque Equipe le nombre d'articles publiés -->
                                      @foreach($compteurs as $compteur)
                                          @if($compteur->equipe_id == $equipe->id )
                                            <?php $nbrPub = $compteur->cpt ?>
                                          @endif
                                      @endforeach
                            <li><a href="#">{{$equipe->intitule}}</a><span>({{$nbrPub}})</span></li>
                            <?php $nbrPub = 0; ?>
                            @endforeach
                        </ul>
                    </div>
                    <!-- pour colorier un button vous devrier utiliser cette classe theme-tag-colored -->
                    <div class="theme-material-card">
                        <div class="sub-ttl">Filtrer Par Type</div>
                        @foreach($types as $typeArticle)
                           <a href="#" class="theme-tag">{{$typeArticle->type}}</a>
                        @endforeach
                    </div>
                    <div class="theme-material-card">
                        <div class="sub-ttl">Filtrer Par Année</div>
                          <div style="text-align: center;">
                             <p><span id="from">2000</span>-<span id="to">2018</span></p>
                        	 <div id="slider-range" class="price-filter-range"></div>
                        	 <button class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised button button-primary button-lg make-appointment">Rechercher</button>
                          </div>
                    </div>
                 </div>
                <div class="col-lg-8 text-center">
                    
                   
                    
                    
                   
                    <div class="row">
                        
                        @foreach($pubs as $pub)
                        <?php $type = str_replace(' ','',$pub->type); ?>
                        <div class="col-md-6">
                            <div class="theme-block theme-block-hover">
                                <div class="theme-block-picture">
                                	<div class="blog-full-date">{{$pub->mois}}  {{$pub->annee}}</div>
                                    <img src="{{asset('uploads/types/'.$type.'.jpeg')}}" alt="">
                                </div>
                                <div class="theme-block-data service-block-data">
                                    <div class="service-icon"><img src="{{asset($pub->photo)}}" alt="" class="fa"></div>
                                    <br><br><h6 class="paragraph-small paragraph-black service-description">Par {{$pub->name}}  {{$pub->prenom}}</h6>
                                    <h6 style="text-align:left"><a href="#">{{$pub->titre}}</a></h6>
                                    <p class="paragraph-small paragraph-black service-description">
                                        <span>{{$pub->resume}}</span>
                                        <a href="#">(Read More)</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <ul class="theme-pagination">
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">10</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- End Blog List Section -->
@stop