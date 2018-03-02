

<?php
	include ('../conexion/conexion.php');
	session_start();
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>AdminLTE 2 | Advanced form elements</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
		<!-- daterange picker -->
		<link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
		<!-- bootstrap datepicker -->
		<link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<!-- iCheck for checkboxes and radio inputs -->
		<link rel="stylesheet" href="../plugins/iCheck/all.css">
		<!-- Bootstrap Color Picker -->
		<link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
		<!-- Bootstrap time Picker -->
		<link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
		<!-- Select2 -->
		<link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
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
		<link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="#" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>IPG</b>MB</span>
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
							<li class="active"><a href="AdminFacebook.php"><i class="fa fa-circle-o"></i> Dashboard Facebook</a></li>
							<li><a href="AdminAdWords.php"><i class="fa fa-circle-o"></i> Dashboard AdWords</a></li>
						</ul>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
    <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Admin
       <small>Control Panel</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="../Encargado.php"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">Admin</li>
     </ol>
   </section>
   <!-- Main content -->
   <section class="content">
         <div class="box box-danger">
           <div class="box-header with-border">
             <h3 class="box-title">Facebook</h3>
             <a href="../pdf/AdWords.php" class="btn">
               <i  class="fa fa-download"></i> Descargar
            </a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <form action="MostrarCampanias.php" method="POST" method="POST" role="form">
               <!-- select -->
               <div class="box-body">
             <table id="example2" class="table table-bordered table-hover">
               <thead>
               <tr>
                 <th>PLataforma</th>
                 <th>Marca</th>
                 <th>Campaña</th>
                 <th>Objetivos</th>
                 <th>Tipo_compra</th>
                 <th>Ordenes</th>
                 <th>Mostrar</th>
               </tr>
               </thead>

               <tbody>
               <?php
               $con = new mysqli($servidor, $usuario, $password, $bd);
               if ($con->connect_errno) {
                  printf("Connect failed: %s\n", $con->connect_error);
                  exit();
              }
               global $con;
               $sql =  "SELECT fb_id, tpl_nombre,tma_nombre, camp_nombre, tob_nombre, tco_nombre, fb_ordenes
                        FROM facebook, campania, tipo_plataforma, tipo_marca, tipo_objetivo, tipo_compra
                        where fb_categoria = 2
												and fb_plataforma = tpl_id
                        and fb_marca = tma_id
                        and fb_campania = camp_id
                        and fb_objetivo = tob_id
                        and fb_compra = tco_id
												group by fb_id desc;";
               if($result = $con->query($sql)){
                 while($row = $result->fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
                 {

                      echo "<tr>";
                      echo "<td>", $row["tpl_nombre"], "</td>";
                      echo "<td>", $row["tma_nombre"],"</td>" ;
                      echo "<td>", $row["camp_nombre"], "</td>";
                      echo "<td>", $row["tob_nombre"],"</td>" ;
                      echo "<td>", $row["tco_nombre"], "</td>";
                      echo "<td>", $row["fb_ordenes"],"</td>" ;
                      echo '<td><input type="checkbox" name="mostrar" value='.$row['fb_id'].'></td>';
                      echo "</tr>";
                   }
               }
               ?>

               </tbody>
             </table>
           </div>

               </div>
               <div class="col-xs-4">
               <button type="submit" name="enviar" class="btn btn-primary btn-block btn-flat" value=2 >Mostrar</button>
               </div>

             </form>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->




 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->


</div>
<!-- ./wrapper -->
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
		<!-- Select2 -->
		<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
		<!-- InputMask -->
		<script src="../plugins/input-mask/jquery.inputmask.js"></script>
		<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- date-range-picker -->
		<script src="../bower_components/moment/min/moment.min.js"></script>
		<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- bootstrap datepicker -->
		<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- bootstrap color picker -->
		<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<!-- bootstrap time picker -->
		<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
		<!-- SlimScroll -->
		<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- iCheck 1.0.1 -->
		<script src="../plugins/iCheck/icheck.min.js"></script>
		<!-- FastClick -->
		<script src="../bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="../dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="../dist/js/demo.js"></script>
		<!-- Page script -->
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
	</body>
</html>
