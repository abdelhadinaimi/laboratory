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
                            <button class="fa fa-search search-button" id="search-button-pub"></button>
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
                            <li><a class="{{request('equipe_id') == $equipe->id ? 'active':''}} eqp" href="{{ route('publications',[ 'equipe_id' => $equipe->id , 'type' => request('type') , 'from' => request('from') ,'to' => request('to') ]) }}">{{$equipe->intitule}}</a><span class="nbr" role="{{$nbrPub}}">({{$nbrPub}})</span></li>
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
                           <a  href="{{ route('publications',[ 'equipe_id'=>request('equipe_id') , 'type' => $typeArticle->type , 'from' => request('from') ,'to' => request('to')]) }}" class="theme-tag {{request('type') ==  $typeArticle->type ? 'active':''}}">{{$typeArticle->type}}</a>
                        @endforeach
                    </div>
                    <div class="theme-material-card">
                        <div class="sub-ttl">Filtrer Par Année</div>
                          <div style="text-align: center;">
                             <p><span id="from"><?php echo request()->has('from') ? request('from') : "2000"  ?></span>-<span id="to"><?php echo request()->has('to') ? request('to') : date("Y")  ?></span></p>
                             <div id="slider-range" class="price-filter-range"></div>
                             <button class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised button button-primary button-lg makeSlider">Rechercher</button>
                          </div>
                    </div>

                    <div class="theme-material-card">
                        <div class="sub-ttl">Statistique</div>
                          <div class="col-md-12">
                             <canvas id="statFront" style="height:230px"></canvas>
                          </div>
                          <div class="col-md-12">
                             <canvas id="statFrontEq" style="height:230px"></canvas>
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
                            'photo' => $pub->users->first()->photo,
                            'users' => $pub->users,
                            'size' => 6])
                        @endcomponent

                        @endforeach
                        
                    </div>
                    {{$pubs->links('vendor.pagination.default')}}
                </div>
            </div>
        </div>
    </div><!-- End Blog List Section -->
@endsection

@section('scripts')
 <!-- ils sont importants pour le slider -->
<script src="{{ asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('slider/price_slider.js')}}"></script>
<script src="{{ asset('js/front.js')}}"></script>
<script src="{{ asset('labo/bower_components/chart.js/Chart.min.js') }}"></script>
<script type="text/javascript">
  //mon modification!
  var i = 0;
  var tab = ["#A01238","#008D2F","#F29400","#111010","#E61E76","#49B2E0","#4EB280"];
  var dynamicColors = function() {
    
    return tab[(i++) % 7];
};
     
        $.ajax({
            type: "get",
            url: "/statFront",
            success: function(data) {
                var coloR = [];
                var nombres = [];
                var type =[];
                for (var i=0;i<data.countArticle.length;i++) {
                    coloR.push(dynamicColors());
               }

                for (var i = 0; i <data.countArticle.length; i++) {
                    nombres.push(data["countArticle"][i].count);
                    type.push(data["countArticle"][i].type);
                }
                var options = {
                    maintainAspectRatio: false,
                    title : {
                        display : true,
                        position : "top",
                        text : "Articles publiées",
                        fontSize : 18,
                        fontColor : "#376273"
                    },
                    legend : {
                        display : true,
                        position : "bottom"
                    }
                };
                var chartData = {

                    labels: type,
                    datasets: [{
                        label: 'nombres ',
                        //strokeColor:backGround,

                        backgroundColor: coloR,

                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: nombres
                    }]
                };
                var ctx = $('#statFront');
                var barGraph = new Chart(ctx[0], {
                    type: 'pie',
                    data: chartData,
                    options: options
                });
            },
            error: function(data) {
                console.log(data);
            },
        });
              //2éme diagramme statistique
               var roles = $('.nbr');
      var articlesParEquipes = [];
      for (var i = 0; i < roles.length; i++) {
        articlesParEquipes[i] = roles[i].getAttribute("role");
      }
      var cls = $('.eqp');
      var equipesAr = [];
      for (var i = 0; i < cls.length; i++) {
        equipesAr[i] = cls[i].text;
      }
                var coloR = [];
                var nombres = [];
                var type =[];
                for (var i=0; i< articlesParEquipes.length;i++) {
                    coloR.push(dynamicColors());
               }
                var options = {
                    maintainAspectRatio: false,
                    title : {
                        display : true,
                        position : "top",
                        text : "Articles publiées Par Equipe",
                        fontSize : 18,
                        fontColor : "#376273"
                    },
                    legend : {
                        display : true,
                        position : "bottom"
                    }
                };
                var chartData = {

                    labels: equipesAr,
                    datasets: [{
                        label: 'nombres ',
                        //strokeColor:backGround,

                        backgroundColor: coloR,

                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: articlesParEquipes
                    }]
                };
                var ctx = $('#statFrontEq');
                var barGraph = new Chart(ctx[0], {
                    type: 'pie',
                    data: chartData,
                    options: options
                });

//mon modification
</script>
<script type="text/javascript">
      $( "#sidebar-search" ).autocomplete({
      source : "{{url('autocomplete')}}",
      minLength : 3
    });
      $( "#search-button-pub" ).click(function() {
            var term = "";
            term = $('#sidebar-search').val();
            var searchUrl ="{{ route('publications',['term' => ':term' ]) }}";
            searchUrl = searchUrl.replace("%3Aterm",term);
             document.location.href = searchUrl;
         return false;
        }); 
    </script>
    <script type="text/javascript">
        $( ".makeSlider" ).click(function() {
            var from = document.getElementById('from').innerHTML;
            var to = document.getElementById('to').innerHTML;

            var sliderUrl ="{{ route('publications',['from' => ':from','to' => ':to' , 'type' => request('type') , 'equipe_id' => request('equipe_id') ]) }}";
            sliderUrl = sliderUrl.replace("%3Afrom",from);
            sliderUrl = sliderUrl.replace("%3Ato",to);
            for (var i = 0; i < 5; i++) {
               sliderUrl = sliderUrl.replace("amp;",""); 
            }
            
             document.location.href = sliderUrl;
         return false;
        }); 
    </script>
    <link rel="stylesheet" href="{{ asset('slider/price_range_style.css')}}">

@endsection