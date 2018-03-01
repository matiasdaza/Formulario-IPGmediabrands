<?php
include ('../conexion/conexion.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Collapsed Sidebar Layout</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>IPG</b>MediaBrands</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li  class="active"><a href="campanias.php"><i class="fa fa-circle-o"></i> Campañas</a></li>
            <li><a href="facebook.php"><i class="fa fa-circle-o"></i> Dashboard Facebook</a></li>
            <li><a href="conjuntoanuncios.php"><i class="fa fa-angle-right"></i>Conjunto de anuncios</a></li>
            <li><a href="anuncios.php"><i class="fa fa-angle-right"></i>Anuncios</a></li>
            <li><a href="adwords.php"><i class="fa fa-circle-o"></i> Dashboard AdWords</a></li>
            <li><a href="AWanuncios.php"><i class="fa fa-angle-right"></i>Anuncios</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Dashboard OtrosMedios</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
          <i class="fa fa-dashboard"></i> <span>Admin</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="AdminFacebook.php"><i class="fa fa-circle-o"></i> Dashboard Facebook</a></li>
            <li class="active"><a href="AdminAdWords.php"><i class="fa fa-circle-o"></i> Dashboard AdWords</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Resumen
        <small>Campañas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Resumen Facebook</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Campaña:</h3>
        </div>
      <?php
     $fbid = $_GET["fbid"];
     $con = new mysqli($servidor, $usuario, $password, $bd);
     $con->set_charset("utf8");
     global $con;
     $sql = "SELECT fb_nombrecampania FROM facebook where fb_id = $fbid;";
     $respuesta = $con -> query($sql);
     $filas = mysqli_num_rows($respuesta);
     if($filas > 0)
     {
         while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
       {
             $salida =  $result['fb_nombrecampania'];
         }
     }

      echo "<h3>".$salida."<br><br></h3>";?>

      <?php
     $fbid = $_GET["fbid"];
     $con = new mysqli($servidor, $usuario, $password, $bd);
     $con->set_charset("utf8");
     global $con;
     $sql = "SELECT COUNT(fb_id) as count
     FROM facebook, conjunto_anuncios, rate_type, genero, dispositivo
     where COA_FACEBOOK = $fbid and fb_id = coa_facebook and COA_RATETYPE = rty_id and COA_GENERO = gen_id and COA_DISPOSITIVO = dis_id";
     $respuesta = $con -> query($sql);
     $filas = mysqli_num_rows($respuesta);
     if($filas > 0)
     {
         while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
       {
             $salida =  $result['count'];
         }
     }

      echo "Tiene: ".$salida." conjuntos de anuncios";
      echo "<br><br>";
      ?>
      <label>Conjunto de anuncios: </label>

        <?php
        if(isset($_GET["fbid"])) {
          $fbid = $_GET["fbid"];
          $con = new mysqli($servidor, $usuario, $password, $bd);
          if ($con->connect_errno) {
             printf("Connect failed: %s\n", $con->connect_error);
             exit();
         }
          global $con;
          $sql = "SELECT distinct coa_id, coa_nombre, rty_nombre, coa_idate, coa_fdate, gen_nombre, coa_edadmin, coa_edadmax, COA_SEGMENTACION, COA_FREC, COA_FRECDIAS,  dis_nombre, COA_INVERSION
                  FROM facebook, conjunto_anuncios, rate_type, genero, dispositivo
                  where COA_FACEBOOK = $fbid and COA_RATETYPE = rty_id and COA_GENERO = gen_id and COA_DISPOSITIVO = dis_id
                  group by coa_id desc;";
          if($result = $con->query($sql)){
            while($row = $result->fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
            {
              echo "<h3>",$row["coa_nombre"],"</h3>";
              echo "<table id='example2' class='table table-bordered table-hover'>";
              echo "<thead>";
              echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Rate type</th>";
                echo "<th>Inicio_conjunto_anuncio</th>";
                echo "<th>Fin_conjunto_anuncio</th>";
                echo "<th>Género</th>";
                echo "<th>Edad mínima</th>";
                echo "<th>Edad máxima</th>";
                echo "<th>Segmentación</th>";
                echo "<th>Frecuencia de anuncios</th>";
                echo "<th>Frecuencia en días</th>";
                echo "<th>Dispositivo</th>";
                echo "<th>Inversion</th>";
              echo "</tr>";
              echo "</thead>";

              echo "<tbody>";
              echo "<tr>";
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                 echo "<tr>";
                 echo "<td>", $row["coa_id"],"</td>" ;
                 echo "<td>", $row["rty_nombre"],"</td>" ;
                 echo "<td>", $row["coa_idate"], "</td>";
                 echo "<td>", $row["coa_fdate"], "</td>";
                 echo "<td>", $row["gen_nombre"], "</td>";
                 echo "<td>", $row["coa_edadmin"], "</td>";
                 echo "<td>", $row["coa_edadmax"], "</td>";
                 echo "<td>", $row["COA_SEGMENTACION"], "</td>";
                 echo "<td>", $row["COA_FREC"], "</td>";
                 echo "<td>", $row["COA_FRECDIAS"], "</td>";
                 echo "<td>", $row["dis_nombre"], "</td>";
                 echo "<td>", $row["COA_INVERSION"], "</td>";

                 echo "</tr>";
                 echo "</tbody>
               </table>";
              }
          }
        }?>


      <br><br>

      <?php
     $fbid = $_GET["fbid"];
     $con = new mysqli($servidor, $usuario, $password, $bd);
     $con->set_charset("utf8");
     global $con;
     $sql = "SELECT count(coa_id) as count
            from anuncios, conjunto_anuncios
            where anu_facebook = coa_id and coa_facebook = $fbid";
     $respuesta = $con -> query($sql);
     $filas = mysqli_num_rows($respuesta);
     if($filas > 0)
     {
         while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
       {
             $salida =  $result['count'];
         }
     }

      echo "Tiene: ".$salida." Anuncios";
      echo "<br><br>";
      ?>
      <label>Anuncios: </label>
      <?php
        if(isset($_GET["fbid"])) {
          $fbid = $_GET["fbid"];
          $con = new mysqli($servidor, $usuario, $password, $bd);
          if ($con->connect_errno) {
             printf("Connect failed: %s\n", $con->connect_error);
             exit();
         }
          global $con;
          $sql = "SELECT DISTINCT anu_id, anu_nombre, tfo_nombre, aut_nombre, vle_nombre, anu_inidate, anu_findate
  from anuncios, conjunto_anuncios, tipo_formato, ad_unit_type, video_length
  where anu_facebook = coa_id and coa_facebook = $fbid and anu_formatotema = tfo_id and anu_aut = aut_id and anu_videolength = vle_id
  group by anu_id desc;";
          if($result = $con->query($sql)){
            while($row = $result->fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
            {

              echo "<h3>",$row["anu_nombre"],"</h3>";
              echo "<table id='example2' class='table table-bordered table-hover ' border='1'>";
              echo "<thead>";
              echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Formato tema</th>";
                echo "<th>Ad unit type</th>";
                echo "<th>Video length</th>";
                echo "<th>Inicio anuncios</th>";
                echo "<th>Fin Anuncios</th>";
              echo "</tr>";
              echo "</thead>";

              echo "<tbody>";
              echo "<tr>";
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                echo "<td></td>" ;
                 echo "<tr>";
                 echo "<td>", $row["anu_id"],"</td>" ;
                 echo "<td>", $row["tfo_nombre"],"</td>" ;
                 echo "<td>", $row["aut_nombre"], "</td>";
                 echo "<td>", $row["vle_nombre"], "</td>";
                 echo "<td>", $row["anu_inidate"], "</td>";
                 echo "<td>", $row["anu_findate"], "</td>";
                 echo "</tr>";
                 echo "</tbody>
               </table>";
              }
          }
        }?>
        <br><br>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
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
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
