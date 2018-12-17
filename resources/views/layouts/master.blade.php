<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" type="image/png" href="{{asset('easy.png')}}"/>
  <title>
    @yield('title')
  </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('labo/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('labo/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('labo/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('labo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('labo/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('labo/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('labo/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('labo/bower_components/select2/dist/css/select2.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="position: fixed; width: 100%">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{asset($labo->logo)}}" style="width: 50px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{asset($labo->logo)}}" style="width: 90px""></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset(Auth::user()->photo)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}} {{Auth::user()->prenom}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset(Auth::user()->photo)}}" class="img-circle" alt="User Image">

                <p>
                {{Auth::user()->name}} {{Auth::user()->prenom}}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('membres/'.Auth::user()->id.'/details')}}" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <!-- <a href="login_page/login.php" class="btn btn-default btn-flat">Déconnéxion</a> -->
                  <button class="btn btn-default btn-flat" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Déconnecter') }}
                  </button>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="position: fixed;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="padding-top: 50px;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset(Auth::user()->photo)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}} <br>  <smal>{{Auth::user()->prenom}} </smal> </p>
        </div>
      </div>

      <!-- search form -->
      <form action="/search" method="POST" class="sidebar-form" role="search">
      {{ csrf_field() }}
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        @yield('asidebar')
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


   <!-- statistiques start  -->
  <div class="content-wrapper" style="padding-top: 50px">
    <!-- Content Header (Page header) -->
        <section class="content-header" >
             @yield('header_page')
         </section>

    <!-- Main content -->
    <section class="content" style="padding-top: 30px">
      <!-- Small boxes (Stat box) -->
      @yield('content')
    </section>
  </div>


  <!-- Content Wrapper. Contains page content -->
  
      <!-- /.row (main row) -->

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark " style="position: fixed;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>

  <div class="control-sidebar-bg"></div>
  <!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="{{ asset('labo/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('labo/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('labo/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('labo/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('labo/bower_components/morris.js/morris.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('labo/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('labo/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{ asset('labo/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('labo/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('labo/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('labo/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('labo/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('labo/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('labo/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('labo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('labo/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('labo/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('labo/bower_components/Chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('labo/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('labo/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('labo/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('labo/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('labo/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('labo/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('labo/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ asset('labo/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{ asset('labo/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('labo/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('labo/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('labo/plugins/iCheck/icheck.min.js')}}"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>


  $(function () {
 

    
     
    $.ajax({
      type:'get',
      url:'/statistics',
      success:function(data,status){
         console.log(data.annee);
         console.log(data.these);
         //areaChartData.labels = data.res;
         var areaChartData = {
      labels  : data.annee,
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : data.these
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : data.article
        }
      ]
    }

    
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
      }
    });

  });

$(document).ready(function() {
   $.ajax({
      
      type: "get",
      url: "/statPie",
      success: function(data) {
         console.log(data);
         var coloR = [];
         var nombres = [];

         var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };

         for (var i=0;i<data.nmbrEquipe;i++) {
            coloR.push(dynamicColors());

         }
         console.log(coloR);
         for (var i = 0; i <data.nmbrEquipe; i++) {
           nombres.push(data["nombres"][i].count);
         }
         console.log(nombres);
         console.log(data.equipes);
         var options = {
    title : {
      display : true,
      position : "top",
      text : "Nombre membre d'équipe",
      fontSize : 18,
      fontColor : "#111"
    },
    legend : {
      display : true,
      position : "bottom"
    }
  };
         var chartData = {

            labels: data.equipes,
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
         console.log(chartData);
         var ctx = $('#statPie');
         var barGraph = new Chart(ctx, {
            type: 'pie',
            data: chartData,
            options: options
         });
      },
      error: function(data) {

         console.log(data);
      },
   });
});

$(document).ready(function() {
   $.ajax({
      
      type: "get",
      url: "/statThese",
      success: function(data) {
         console.log(data);
         var options = {
          title : {
            display : true,
            position : "top",
            text : "Bar Graph",
            fontSize : 18,
            fontColor : "#111"
          },
          legend : {
            display : true,
            position : "bottom"
          },
          scales : {
            yAxes : [{
              ticks : {
                min : 0
              }
            }]
          }
        };
         var data = {
          labels : data.years,
          datasets : [
            {
              label : "debut these",
              data : data.debuThese,
              backgroundColor : [
                "rgba(10, 20, 30, 0.3)",
                "rgba(10, 20, 30, 0.3)",
                "rgba(10, 20, 30, 0.3)",
                "rgba(10, 20, 30, 0.3)",
                "rgba(10, 20, 30, 0.3)",
                "rgba(10, 20, 30, 0.3)",
                "rgba(10, 20, 30, 0.3)",
                "rgba(10, 20, 30, 0.3)",
                "rgba(10, 20, 30, 0.3)",
                "rgba(10, 20, 30, 0.3)"

              ],
              borderColor : [
                "rgba(10, 20, 30, 1)",
                "rgba(10, 20, 30, 1)",
                "rgba(10, 20, 30, 1)",
                "rgba(10, 20, 30, 1)",
                "rgba(10, 20, 30, 1)",
                "rgba(10, 20, 30, 1)",
                "rgba(10, 20, 30, 1)",
                "rgba(10, 20, 30, 1)",
                "rgba(10, 20, 30, 1)",
                "rgba(10, 20, 30, 1)"

              ],
              borderWidth : 1
            },
            {
              label : "Fin these",
              data : data.finThese,
              backgroundColor : [
                "rgba(50, 150, 250, 0.3)",
                "rgba(50, 150, 250, 0.3)",
                "rgba(50, 150, 250, 0.3)",
                "rgba(50, 150, 250, 0.3)",
                "rgba(50, 150, 250, 0.3)",
                "rgba(50, 150, 250, 0.3)",
                "rgba(50, 150, 250, 0.3)",
                "rgba(50, 150, 250, 0.3)",
                "rgba(50, 150, 250, 0.3)",
                "rgba(50, 150, 250, 0.3)"

              ],
              borderColor : [
                "rgba(50, 150, 250, 1)",
                "rgba(50, 150, 250, 1)",
                "rgba(50, 150, 250, 1)",
                "rgba(50, 150, 250, 1)",
                "rgba(50, 150, 250, 1)",
                "rgba(50, 150, 250, 1)",
                "rgba(50, 150, 250, 1)",
                "rgba(50, 150, 250, 1)",
                "rgba(50, 150, 250, 1)",
                "rgba(50, 150, 250, 1)"

              ],
              borderWidth : 1
            }
          ]
        };
        //console.log(chartData);
        var ctx = $('#chartThese');
        var chart = new Chart( ctx, {
          type : "bar",
          data : data,
          options : options
          });
      },
      error: function(data) {

         console.log(data);
      },
   });
});
  
</script>
<script type="text/javascript" src="{{asset('js/categorie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/materiel.js')}}"></script>
@yield('scripts')
<script>
  $(document).ready(function() {
var IMAGE_PATH = '{{ public_path(("/uploads/photo/")) }}';

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content')     }
});
$('#summernote').summernote({
    height: 400,
    onImageUpload: function(files) {
        data = new FormData();
        data.append("image", files[0]);
        $.ajax({
            data: data,
            type: "POST",
            url: '{{ public_path(("/uploads/photo/")) }}',
            cache: false,
            contentType: false,
            processData: false,
            success: function(filename) {
                var file_path = IMAGE_PATH + filename;
                console.log(file_path);
                $('#summernote').summernote("insertImage", file_path);
            }
        });
    }
  });
});
</script>
</body>
</html>
