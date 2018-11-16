@extends('layouts.frontMaster')

@section('title','Equipes De Recherche')


@section('content')

   <div id="service-page" class="layer-stretch">
        <div class="layer-wrapper text-center">
            <div class="row">
                <!-- Block start -->
                <div class="col-md-6 col-lg-4">
                    <div class="theme-block theme-block-hover">
                        <div class="theme-block-picture">
                            <img src="{{ asset('uploads/SIDC.jpg')}}" alt="">
                        </div>
                        <div class="theme-block-data service-block-data">
                            <div class="service-icon"><i class="fa fa-book"></i></div>
                            <h4><a href="equipe.html">SIDK</a></h4>
                            <p class="paragraph-small paragraph-black service-description">
                                <span>Nobis civibus luptatum et mea, id consulatu repu diare sed, has zril diceret
                                    nonumes ei. Eum doctu sal iquip in, noster tacimates mei cu, his inmucius per sius.
                                    At nec epicurei delectus omittantu. Eose aoffi ciis sensibus voluptatibus, vel te
                                    nost rumass entior, no sed latine vidisse. Legere consequuntur nec an, natum
                                    efficien</span>
                                <a href="equipe.html">(Read More)</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Block end -->
                <div class="col-md-6 col-lg-4">
                    <div class="theme-block theme-block-hover">
                        <div class="theme-block-picture">
                            <img src="{{ asset('uploads/RSD.png')}}" alt="">
                        </div>
                        <div class="theme-block-data service-block-data">
                            <div class="service-icon"><i class="fa fa-server"></i></div>
                            <h4><a href="equipe.html">RSD</a></h4>
                            <p class="paragraph-small paragraph-black service-description">
                                <span>Nobis civibus luptatum et mea, id consulatu repu diare sed, has zril diceret
                                    nonumes ei. Eum doctu sal iquip in, noster tacimates mei cu, his inmucius per sius.
                                    At nec epicurei delectus omittantu. Eose aoffi ciis sensibus voluptatibus, vel te
                                    nost rumass entior, no sed latine vidisse. Legere consequuntur nec an, natum
                                    efficien</span>
                                <a href="equipe.html">(Read More)</a>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                        <div class="theme-block theme-block-hover">
                            <div class="theme-block-picture">
                                <img src="{{ asset('uploads/IAAD.jpg')}}" alt="">
                            </div>
                            <div class="theme-block-data service-block-data">
                                <div class="service-icon"><i class="fa fa-ge"></i></div>
                                <h4><a href="equipe.html">IAAD</a></h4>
                                <p class="paragraph-small paragraph-black service-description">
                                    <span>Nobis civibus luptatum et mea, id consulatu repu diare sed, has zril diceret
                                        nonumes ei. Eum doctu sal iquip in, noster tacimates mei cu, his inmucius per sius.
                                        At nec epicurei delectus omittantu. Eose aoffi ciis sensibus voluptatibus, vel te
                                        nost rumass entior, no sed latine vidisse. Legere consequuntur nec an, natum
                                        efficien</span>
                                    <a href="equipe.html">(Read More)</a>
                                </p>
                            </div>
                        </div>
                    </div>
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
    </div><!-- End Service List Section -->


@endsection