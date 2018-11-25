@extends('layouts.frontMaster')

@section('title','Actualite')

@section('content')

  <!-- Start Blog List Section -->
    <div class="layer-stretch">
        <div class="layer-wrapper">
            <div class="row">
                <div class="col-lg-8 text-center">
                            <!-- // -->
                            @foreach($actualites as $actualite)
                                 @component('components.actualite',[
                                'actualite' => $actualite])
                                 @endcomponent
                            @endforeach

       
       
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
                <div class="col-lg-4">
                    <div class="theme-material-card text-center">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                            <input class="mdl-textfield__input" type="text" id="sidebar-search">
                            <label class="mdl-textfield__label" for="sidebar-search">Rechercher</label>
                            <button class="fa fa-search search-button"></button>
                        </div>
                    </div>
                    <div class="theme-material-card">
                        <div class="sub-ttl">Post récent</div>
                        @foreach($latestActs as $latestAct)
                        <a href="#" class="row blog-recent">
                            <div class="col-4 blog-recent-img">
                                <img class="img-responsive img-thumbnail" src="{{asset('uploads/'.'recent-1'.'.jpg')}}" alt="">
                            </div>
                            <div class="col-8 blog-recent-post">
                                <h4>{{$latestAct->titre}}</h4>
                                <p>{{$latestAct->created_at->day}} {{date("F", mktime(0, 0, 0, $latestAct->created_at->month, 1))}} {{$latestAct->created_at->year}}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Blog List Section -->

@endsection