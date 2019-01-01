<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Title -->
    <title>@yield('title')</title>
    <!-- importante pour slider -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" type="text/css" media="all" />
    
    <!-- Font Awesoeme Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}"/>
    <!-- Google web Font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Material Design Lite Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/material.min.css')}}" />
    <!-- Owl Carousel Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}" />
    <!-- Flex Slider Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/flexslider.css')}}" />
    <!-- Custom Main Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <style type="text/css">
  body {
  padding-top: 54px;
}

@media (min-width: 992px) {
  body {
    padding-top: 56px;
  }
}


</style>
</head>
<body>
    <header id="header-transparent">
        <div class="layer-stretch hdr-center">
            <div class="row align-items-center">

                <div class="col">
                    <div class="hdr-center-logo text-center">
                        <a class="d-inline-block"><img src="{{asset('univTlmc.png')}}" alt="" style="height: 60px !important;"></a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Page Content -->
    <div class="container" style="
    padding-top: 50px;
">
            @yield('content')

    </div>
    <!-- /.container -->



    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/material.min.js')}}"></script>
    <!-- Jquery Library 2.1 JavaScript-->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- Material Select Field Script -->
    <script src="{{ asset('js/mdl-selectfield.min.js')}}"></script>
    <!-- Flexslider Plugin JavaScript-->
    <script src="{{ asset('js/jquery.flexslider.min.js')}}"></script>
    <!-- Owl Carousel Plugin JavaScript-->
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <!-- Scrolltofixed Plugin JavaScript-->
    <script src="{{ asset('js/jquery-scrolltofixed.min.js')}}"></script>
    <!--Custom JavaScript for Klinik Template-->
    <script src="{{ asset('js/smoothscroll.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
    <!--<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>!-->
@yield('scripts')
  </body>

</html>