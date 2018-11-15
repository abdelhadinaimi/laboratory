<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LRI | Profil</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="position: fixed; width: 100%">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="logo.png" style="width: 50px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="logo.png"></span>
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
              <img src="dist/img/avatar04.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Membre</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">

                <p>
                Membre
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="userProfil.php" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="login_page/login.php" class="btn btn-default btn-flat">Déconnexion</a>
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
          <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Membre<br>  <smal>Prénom </smal> </p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
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
        <li >
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="trombino.php"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="liste.php"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>
        <li>
          <a href="equipes.php">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        <li>
          <a href="projets.php">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        
        <li>
          <a href="thèses.php">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>

        <li>
          <a href="articles.php">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>

          <li>
          <a href="parametre.php">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding-top: 50px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/avatar04.png" alt="User profile picture">

              <h3 class="profile-username text-center">CHIKH Azzedine</h3>

              <p class="text-muted text-center">Professeur</p>
              <div class="text-center">
                <div class="btn-group">
              <a href="#" class="btn btn-social-icon btn-linkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
              <a href="#" class="btn btn-social-icon" title="Researchgate"><img src="dist/img/téléchargé.png"></a>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">A propos</a></li>
              <li><a href="#activity1" data-toggle="tab">Modifier</a></li>
              <li><a href="#timeline" data-toggle="tab">Articles</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box-body">
                  
                  <div class="col-md-3">
                    <strong>Date de naissance</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      21/06/1958
                    </p>
                  </div>
                  <div class="col-md-3">
                    <strong>N° de télépone</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      (012)3456 67 89
                    </p>
                  </div>

                  
                
                <div class="col-md-3">
                  <strong><i class="fa fa-group  margin-r-5"></i>Equipe</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="#">Système d'Information et Connaissances</a>
                  </div>

                 <div class="col-md-3" style="padding-top: 10px">
                   <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
                 </div> 
                 <div class="col-md-9" style="padding-top: 10px">
                   <a href="#">az_chikh at hotmail.com</a>
                 </div>


              <strong><i class="margin-r-5"></i></strong>
              <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-graduation-cap margin-r-5"></i> Thèse </strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <strong> Titre : </strong> le tite de la thèse
                      </p>
                    <p class="text-muted">
                      
                      <strong>Résumé :</strong>  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                    </p>
                     <p class="text-muted">
                      <strong>Encadreur :</strong> Encadreur ici
                      </p>
                      <p class="text-muted">
                     <strong>Coencadreur :</strong> CoEncadreur ici
                     </p>
                    
                  </div>



            </div>
              </div>



            
              <div class="tab-pane" id="timeline">
                 <div class="box-body">
                  <div class="row" style="padding-bottom: 20px ">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                      <a href="ajouterArticle.php" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i></a>
                    </div>
                  </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Titre</th>
                  <th>Année</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>article court</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.</td>
                
                    <td>2018</td>
                    <td>
                      <div class="btn-group">
                        <a href="detailArticle.php" class="btn btn-info">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="modifierArticle.php" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger">
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>poster</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam</td>
              
                    <td>2015</td>
                    <td>
                      <div class="btn-group">
                        <a href="detailArticle.php" class="btn btn-info">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="modifierArticle.php" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger">
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                 </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  <th>Type</th>
                  
                  <th>Année</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
              
            </div>
              </div>





          <div class="tab-pane" id="activity1">
            <form class="well form-horizontal" action=" " method="post"  id="contact_form">
              <fieldset>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nom</label>  
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group"  style="width: 40%">
                            <input  name="nom" class="form-control" value="Le nom" type="text">
                          </div>
                        </div>
                      </div>

                       <!-- Text input-->

                      <div class="form-group">
                        <label class="col-md-3 control-label">Prénom</label>  
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group"  style="width: 40%">
                            <input  name="prenom" value="Le prénom" class="form-control"  type="text">
                          </div>
                        </div>
                      </div>


                       <div class="form-group"> 
                          <label class="col-md-3 control-label">Grade</label>
                            <div class="col-md-9 selectContainer">
                              <div class="input-group" style="width: 40%">
                                  <select name="department" class="form-control selectpicker">
                                    <option value="">MAA</option>
                                    <option>MAB</option>
                                    <option >MCA</option>
                                    <option >MCB</option>
                                    <option>Doctorant</option>
                                    <option >Professeur</option>
                                  </select>
                              </div>
                            </div>
                      </div>

                      <div class="form-group"> 
                          <label class="col-md-3 control-label">Equipe</label>
                            <div class="col-md-9 selectContainer">
                              <div class="input-group"  style="width: 40%">
                                  <select name="department" class="form-control selectpicker">
                                    <option value="">Equipe1</option>
                                    <option>Equipe2</option>
                                    <option >Equipe3</option>
                                    <option >Equipe4</option>
                                  </select>
                              </div>
                            </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">E-Mail</label>  
                          <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"  style="width: 40%">
                                <input type="email" class="form-control" value="nom.klfj@lkh.com">
                            </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>  
                          <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"  style="width: 40%">
                                <input type="password" class="form-control" id="exampleInputPassword1" value="********">
                            </div>
                          </div>
                      </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                            <label class="col-md-6 control-label">Date_Naissance</label>  
                            <div class="col-md-6 inputGroupContainer input-group Date">
                              <input type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="21/01/1996">
                            </div>
                      </div>
                      </div>
                      <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input type="checkbox" class="flat-red" >
                            </label> 
                           </div>
                         </div>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">N° Téléphone</label>  
                                <div class="col-md-6 input-group">
                                <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="0551234567">
                              </div>
                        </div>
                      </div>
                      <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input type="checkbox" class="flat-red" >
                            </label> 
                           </div>
                         </div>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">Linkedin</label>  
                                <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                <input type="email" class="form-control" value ="URL">
                              </div>
                              </div>
                        </div>
                     </div>
                     <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input type="checkbox" class="flat-red" >
                            </label> 
                           </div>
                         </div>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">ResearshGate</label>  
                                <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                <input type="email" class="form-control" value="URL">
                              </div>
                              </div>
                          </div>
                     </div>
                     <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input type="checkbox" class="flat-red" >
                            </label> 
                           </div>
                         </div>
                    </div>

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <button type="submit" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</button>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
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
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->

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
</body>
</html>
