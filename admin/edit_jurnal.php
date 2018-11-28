<?php
// include database connection file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];
 
// Fetch all users data from database
$data_jenis = mysqli_query($connect, "SELECT jenis FROM jenis_data ORDER BY id");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$transaksi = $_POST['transaksi'];
	$jumlah = $_POST['jumlah'];
	$akun_debit = $_POST['akun_debit'];
	$akun_kredit = $_POST['akun_kredit'];
		
	// update user data
	$result = mysqli_query($connect, "UPDATE data_jurnal SET transaksi='$transaksi',
		jumlah='$jumlah',akun_debit='$akun_debit',akun_kredit='$akun_kredit' WHERE id_jurnal=$id");
	
	// Show message when user added
	echo '<script language = "javascript">alert("EDIT TRANSAKSI BERHASIL!");
	document.location="index.php";</script>';
}
?>

<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetch user data based on id
$result = mysqli_query($connect, "SELECT * FROM data_jurnal WHERE id_jurnal=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$transaksi = $user_data['transaksi'];
	$jumlah = $user_data['jumlah'];
	$akun_debit = $user_data['akun_debit'];
	$akun_kredit = $user_data['akun_kredit'];
}

// Fetch all users data from database
$data_akun_debit = mysqli_query($connect, "SELECT nama_akun FROM data_chartofaccount ORDER BY id_akun");

$data_akun_kredit = mysqli_query($connect, "SELECT nama_akun FROM data_chartofaccount ORDER BY id_akun");


?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIKOP | Edit Data</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
 
<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
		<!-- Header -->
		<header class="main-header">
			    <!-- Logo -->
			    <a href="index2.html" class="logo">
			      <!-- mini logo for sidebar mini 50x50 pixels -->
			      <span class="logo-mini"><b>S</b>K</span>
			      <!-- logo for regular state and mobile devices -->
			      <span class="logo-lg"><b>SI</b>KOP</span>
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
			              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
			              <span class="hidden-xs">Alexander Pierce</span>
			            </a>
			            <ul class="dropdown-menu">
			              <!-- User image -->
			              <li class="user-header">
			                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

			                <p>
			                  Alexander Pierce - Admin
			                  <small>Member since Nov. 2012</small>
			                </p>
			              </li>
			              <!-- Menu Body -->
			              <li class="user-body">
			                <div class="row">
			                  <div class="col-xs-4 text-center">
			                    <a href="#">Followers</a>
			                  </div>
			                  <div class="col-xs-4 text-center">
			                    <a href="#">Sales</a>
			                  </div>
			                  <div class="col-xs-4 text-center">
			                    <a href="#">Friends</a>
			                  </div>
			                </div>
			                <!-- /.row -->
			              </li>
			              <!-- Menu Footer-->
			              <li class="user-footer">
			                <div class="pull-left">
			                  <a href="#" class="btn btn-default btn-flat">Profile</a>
			                </div>
			                <div class="pull-right">
			                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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

		<!-- Sidebar -->
		<aside class="main-sidebar">
		  	<section class="sidebar">
		      <!-- Sidebar user panel -->
		      <div class="user-panel">
		        <div class="pull-left image">
		          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		        </div>
		        <div class="pull-left info">
		          <p>Alexander Pierce</p>
		          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
		        <li class="header">MAIN NAVIGATION</li>
		        <li class="active treeview">
		          <a href="#">
		            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="bukubesar.php"><i class="fa fa-circle-o"></i> Buku Besar</a></li>
		            <li><a href="#"><i class="fa fa-circle-o"></i> Neraca Saldo Sementara (NSS)</a></li>
		            <li><a href="#"><i class="fa fa-circle-o"></i> Perhitungan Hasil Usaha (PHU)</a></li>
		          </ul>
		        </li>
		        <li class="treeview">
		          <a href="#">
		            <i class="fa fa-pie-chart"></i>
		            <span>Tentang Kami</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="#"><i class="fa fa-circle-o"></i> UNJ</a></li>
		            <li><a href="#"><i class="fa fa-circle-o"></i> Profil</a></li>
		          </ul>
		        </li>
		      </ul>
		  	</section>
		    <!-- /.sidebar -->
		</aside>

	<!-- Content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
		    <section class="content-header">
		      <h1>
		        Tambah Data
		        <small>Alur Kas</small>
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
		        <li class="active">Alur Kas</li>
		      </ol>
		    </section>

			<section class="content">

				<div class="row">
					<div class="col-xs-12">	
						<div class="box">
							<!-- Horizontal Form -->
				          	<div class="box box-info">
				            <div class="box-header with-border">
				              <h3 class="box-title">Edit Transaksi</h3>
				            </div>
				            <!-- /.box-header -->
				            <!-- form start -->
				              <div class="box-body">
				              	<form action="edit_jurnal.php" class="form-horizontal" method="post" name="update_user">
					              	<label>Deskripsi Transaksi</label>
					                <div class="form-group">
					                  <div class="col-sm-10">
				                  		<input type="text" class="form-control" placeholder="Nama ..." name="transaksi" value=<?php echo $transaksi;?>>
					                  </div>
					                </div>
					                <label>Jumlah</label>
					                <div class="form-group">
					                  <div class="col-sm-10">
					                  	<input type="text" class="form-control" placeholder="" name="jumlah" value=<?php echo $jumlah;?>>


					                  </div>	                  
					                </div>
					                <label>Akun Debet</label>
					                <div class="form-group">
					                  <div class="col-sm-10">
					                    	<select class="form-control" name="akun_debit" value=<?php echo $akun_debit;?>>
						                  	<?php
						                  	while($user_data = mysqli_fetch_array($data_akun_debit)) {					
										        echo "<option>".$user_data['nama_akun']."</option>";     
									   		}
						                  	?>
						                  </select>
					                  </div>
					                </div>
					                <label>Akun Kredit</label>
					                <div class="form-group">
					                  <div class="col-sm-10">
					                    <select class="form-control" name="akun_kredit" value=<?php echo $akun_kredit;?>>
						                  	<?php
						                  	while($user_data = mysqli_fetch_array($data_akun_kredit)) {					
										        echo "<option>".$user_data['nama_akun']."</option>";     
									   		}
						                  	?>
						                  </select>
					                  </div>
					                </div>
					              </div>
					              <!-- /.box-body -->
					              <div class="box-footer">
					              	<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
					                <button name="update" type="submit" class="btn btn-info pull-right">Submit</button>
					              </div>
					              <!-- /.box-footer -->
				            	</form>
			          </div>
			          <!-- /.box -->
			        </div>
		        </div>
	        </section>
	    </div>

	    <!-- Footer -->
	 	<footer class="main-footer">
		    <div class="pull-right hidden-xs">
		    	<b>Version</b> 1.0.0
		    </div>
		    <strong>Copyright &copy; 2018 <a href="#">SIKOP</a>.</strong> All rights
		    reserved.
	  	</footer>
	  </div>

	  <!-- Scripts -->
		<!-- jQuery 3 -->
		<script src="bower_components/jquery/dist/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.7 -->
		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Morris.js charts -->
		<script src="bower_components/raphael/raphael.min.js"></script>
		<script src="bower_components/morris.js/morris.min.js"></script>
		<!-- Sparkline -->
		<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="bower_components/moment/min/moment.min.js"></script>
		<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Slimscroll -->
		<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
	<!-- /.Scripts -->
</body>
</html>