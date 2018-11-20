@extends('layouts.frontMaster')

@section('title','Publications')
<!-- Affiche moi toutes Les publications -->
@section('content')

    @component('components.breadcrumbs')
        @slot('title')
            @yield('title')
        @endslot
        @yield('title')    
    @endcomponent
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
                    <?php $nbrPub = 0;$url="?"; ?>
                    <?php if(request('type'))
                               $url.='type='.request('type')."&";
                     ?>
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
                            <li><a class="{{request('equipe_id') == $equipe->id ? 'active':''}}" href="{{ route('publications',[ 'equipe_id' => $equipe->id , 'type' => request('type') ]) }}">{{$equipe->intitule}}</a><span>({{$nbrPub}})</span></li>
                            <?php $nbrPub = 0; ?>
                            @endforeach
                        </ul>
                    </div>
                    <?php $url2 = "?" ?>
                    <?php if(request('equipe_id'))
                               $url2.='equipe_id='.request('equipe_id')."&";
                     ?>
                    <!-- pour colorier un button vous devrier utiliser cette classe theme-tag-colored -->
                    <div class="theme-material-card type">
                        <div class="sub-ttl">Filtrer Par Type</div>
                        @foreach($types as $typeArticle)
                           <a  href="{{ route('publications',[ 'equipe_id'=>request('equipe_id') , 'type' => $typeArticle->type ]) }}" class="theme-tag {{request('type') ==  $typeArticle->type ? 'active':''}}">{{$typeArticle->type}}</a>
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
                        
                        @component('components.article',[
                            'pub' => $pub,
                            'type' => $type,
                            'photo' => $pub->photo,
                            'size' => 6])
                        @endcomponent

                        @endforeach
                        
                    </div>
                    {{$pubs->links('vendor.pagination.default')}}
                </div>
            </div>
        </div>
    </div><!-- End Blog List Section -->
@stop