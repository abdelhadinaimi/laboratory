<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Title -->
    <title>@yield('title')</title>
    <!-- importante pour slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Favicon Icon -->
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
    <!-- Font Awesoeme Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}"/>
    <!-- Google web Font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Material Design Lite Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/material.min.css')}}" />
    <!-- Material Design Select Field Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/mdl-selectfield.min.css')}}">
    <!-- Owl Carousel Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}" />
    <!-- Animate Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}" />
    <!-- Magnific Popup Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}" />
    <!-- Flex Slider Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/flexslider.css')}}" />
    <!-- Custom Main Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('slider/price_range_style.css')}}">
</head>

<body>
    <!-- Start Header -->
    <header id="header">
        <!-- Start Main Header Section -->
        <div id="hdr-wrapper">
            <div class="layer-stretch hdr">
                <div class="tbl">
                    <div class="tbl-row">
                        <!-- Start Header Logo Section -->
                        <div class="tbl-cell hdr-logo">
                            <a href="index.html"><img src="images/logo.png" alt=""></a>
                        </div><!-- End Header Logo Section -->
                        <div class="tbl-cell hdr-menu">
                            <!-- Start Menu Section -->
                            <ul class="menu">
                                <li>
                                    <a href="{{url('front')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Accueil</a>
                                </li>
                                <li>
                                    <a href="{{url('front/actualites')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Actualités</a>
                                </li>
                                <li>
                                    <a href="{{url('front/projets')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Projets</a>
                                </li>
                                <li>
                                    <a href="{{url('front/equipes')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Equipes</a>
                                </li>
                                <li>
                                    <a href="{{url('front/contact')}}"  class="mdl-button mdl-js-button mdl-js-ripple-effect">Contact</a></li>
                                <li>
                                </li>
                                <li class="mobile-menu-close"><i class="fa fa-times"></i></li>
                            </ul><!-- End Menu Section -->
                            <div id="menu-bar"><a><i class="fa fa-bars"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Main Header Section -->
    </header><!-- End Header -->
    <div class="page-ttl">
        <div class="layer-stretch">
            <div class="page-ttl-container">
                <h1>@yield('title')</h1>
                <p><a href="#">Accueil</a> &#8594; <span>@yield('title')</span></p>
            </div>
        </div>
    </div><!-- End Page Title Section -->
    @yield('content')


    <footer>
         <div id="copyright">
            <div class="layer-stretch">
                <div class="paragraph-medium paragraph-white">2018 © LRIT ALL RIGHTS RESERVED.</div>
            </div>
        </div>
    
    <footer>

    <!-- Jquery Library 2.1 JavaScript-->
    <script src="{{ asset('js/jquery-2.1.4.min.js')}}"></script>
    <!-- Popper JavaScript-->
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript-->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- Material Design Lite JavaScript-->
    <script src="{{ asset('js/material.min.js')}}"></script>
    <!-- Material Select Field Script -->
    <script src="{{ asset('js/mdl-selectfield.min.js')}}"></script>
    <!-- Flexslider Plugin JavaScript-->
    <script src="{{ asset('js/jquery.flexslider.min.js')}}"></script>
    <!-- Owl Carousel Plugin JavaScript-->
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <!-- Scrolltofixed Plugin JavaScript-->
    <script src="{{ asset('js/jquery-scrolltofixed.min.js')}}"></script>
    <!-- Magnific Popup Plugin JavaScript-->
    <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
    <!-- WayPoint Plugin JavaScript-->
    <script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
    <!-- CounterUp Plugin JavaScript-->
    <script src="{{ asset('js/jquery.counterup.js')}}"></script>
    <!-- SmoothScroll Plugin JavaScript-->
    <script src="{{ asset('js/smoothscroll.min.js')}}"></script>
    <!--Custom JavaScript for Klinik Template-->
    <script src="{{ asset('js/custom.js')}}"></script>

    <!-- ils sont importants pour le slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="{{ asset('slider/price_slider.js')}}"></script>

</body>

</html>