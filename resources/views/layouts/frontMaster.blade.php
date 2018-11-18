<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Title -->
    <title> @yield('title')</title>
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
</head>

<body>
    <!-- Start Header -->
    <header id="header">
        <!-- Start Main Header Section -->
        <div id="hdr-top-wrapper">
            <div class="layer-stretch hdr-top">
                <div class="hdr-top-block hidden-xs">
                    <div id="hdr-social">
                        <ul class="social-list social-list-sm">
                            <li><a class="width-auto font-13">Suivez-nous : </a></li>
                            <li><a href="#" target="_blank" id="hdr-facebook" ><i class="fa fa-facebook" ></i></a><span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-facebook">Facebook</span></li>
                            <li><a href="#" target="_blank" id="hdr-twitter" ><i class="fa fa-twitter" ></i></a><span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-twitter">Twitter</span></li>
                            <li><a href="#" target="_blank" id="hdr-linkedin" ><i class="fa fa-linkedin" ></i></a><span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-linkedin">Linkedin</span></li>
                        </ul>
                    </div>
                </div>
                <div class="hdr-top-line hidden-xs"></div>
                <div class="hdr-top-block">
                    <div class="theme-dropdown">
                        <a href="{{url('/')}}" id="profile-menu" class="mdl-button mdl-js-button mdl-js-ripple-effect font-13"><i class="fa fa-user-o color-black"></i> Se Connecter</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="hdr-wrapper">
            <div class="layer-stretch hdr">
                <div class="tbl">
                    <div class="tbl-row">
                        <!-- Start Header Logo Section -->
                        <div class="tbl-cell hdr-logo">
                            <a href="index.html"><img src="{{asset('logo.jpeg')}}" alt=""></a>
                        </div><!-- End Header Logo Section -->
                        <div class="tbl-cell hdr-menu">
                            <!-- Start Menu Section -->
                            <ul class="menu">
                            <li>
                                    <a href="{{url('front')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Présentation</a>
                                </li>
                                <li>
                                    <a href="{{url('front')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Accueil</a>
                                </li>
                                <li>
                                    <a href="{{url('front/actualites')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Actualités</a>
                                </li>
                                <li>
                                    <a href="{{url('front/equipes')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Equipes</a>    
                                </li>
                                <li>
                                    <a href="{{url('front/projets')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Publications</a>
                                </li>
                                <li>
                                    <a href="{{url('front/projets')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Projets</a>
                                </li>
                                
                                <li>
                                    <a href="{{url('front/contact')}}"  class="mdl-button mdl-js-button mdl-js-ripple-effect">Contact</a> 
                                </li>
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

    @yield('content')

    <footer id="footer">
        <div class="layer-stretch">
            <!-- Start main Footer Section -->
            <div class="row layer-wrapper">
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Contactez-nous</p></div>
                    <div class="footer-container footer-a">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-map-marker"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">
                                        Université de Tlemcen<br />
                                        Rue Luis Pasteur, Rocade(Nouveau pole)<br />
                                        Tlemcen, Algérie    
                                    </p>
                                </div>
                            </div>
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-phone"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">+21343344334</p>
                                </div>
                            </div>
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-envelope"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">lrit@univ-tlemcen.dz</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Liens rapides</p></div>
                    <div class="footer-container footer-b">
                        <div class="tbl">
                            <div class="tbl-row">
                                <ul class="tbl-cell">
                                    <li><a href="event-1.html">Equipes</a></li>
                                    <li><a href="event-2.html">Publications</a></li>
                                    <li><a href="contact.html">Projets</a></li>
                                </ul>
                                <ul class="tbl-cell">
                                    <li><a href="login.html">Connectez-vous</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Suivez-nous</p></div>
                    <div class="footer-container footer-c">
                     
                        <ul class="social-list social-list-colored footer-social">
                            <li>
                                <a href="#" target="_blank" id="footer-facebook" class="fa fa-facebook"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-facebook">Facebook</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-twitter" class="fa fa-twitter"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-twitter">Twitter</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-linkedin" class="fa fa-linkedin"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-linkedin">Linkedin</span>
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- End main Footer Section -->
        <!-- Start Copyright Section -->
        <div id="copyright">
            <div class="layer-stretch">
                <div class="paragraph-medium paragraph-white">2018 © LRIT Tous droits réservés.</div>
            </div>
        </div><!-- End of Copyright Section -->
    </footer>

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
    <script src="{{ asset('js/front.js')}}"></script>
</body>

</html>