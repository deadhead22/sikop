<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];
 
// Fetch all users data from database
$data_akun_debit = mysqli_query($connect, "SELECT nama_akun FROM data_chartofaccount ORDER BY id_akun");

$data_akun_kredit = mysqli_query($connect, "SELECT nama_akun FROM data_chartofaccount ORDER BY id_akun");

$list_barang = mysqli_query($connect, "SELECT nama,jenis_barang,kuantitas FROM data_koperasi ORDER BY id ");


?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIKOP | Tambah Stok</title>
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
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
			              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
			              <span class="hidden-xs"><?php echo $_SESSION['username']?></span>
			            </a>
			            <ul class="dropdown-menu">
			              <!-- User image -->
			              <li class="user-header">
			                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

			                <p>
			                  <?php echo $_SESSION['username']?>
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
			                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
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
		          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		        </div>
		        <div class="pull-left info">
		          <p><?php echo $_SESSION['username']?></p>
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
		        <li>
		        	<a href="jurnal.php"><i class="fa fa-book"></i><span>Jurnal</span></a>
		        </li>
		        <li class="active treeview">
		          <a href="#">
		            <i class="fa fa-dashboard"></i> <span>Masukkan Data</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="add_transaksi.php"><i class="fa fa-circle-o"></i> Transaksi</a></li>
		            <li><a href="add_transaksi_beli.php"><i class="fa fa-circle-o"></i> Pembelian</a></li>
		            <li class="active"><a href="add_stok_barang.php"><i class="fa fa-circle-o"></i> Tambah Stok</a></li>
		            <li><a href="add_transaksi_jual.php"><i class="fa fa-circle-o"></i> Penjualan</a></li>
		            
		          </ul>
		        </li>
		        <li>
		        	<a href="list_coa.php"><i class="fa fa-book"></i> <span>Chart of Account</span></a>
		        </li>
		        <li>
		        	<a href="list_barang.php"><i class="fa fa-archive"></i> <span>Persediaan Barang</span></a>
		        </li>
		        <li class="treeview">
		          <a href="#">
		            <i class="fa fa-dashboard"></i> <span>Laporan</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="bukubesar.php"><i class="fa fa-circle-o"></i> Buku Besar</a></li>
		            <li><a href="neraca_sementara.php"><i class="fa fa-circle-o"></i> Neraca Saldo Sementara (NSS)</a></li>
		            <li><a href="perhitungan_hasil_usaha.php"><i class="fa fa-circle-o"></i> Perhitungan Hasil Usaha (PHU)</a></li>
		            <li><a href="laporan_neraca.php"><i class="fa fa-circle-o"></i> Laporan Neraca</a></li>
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
		            <li><a href="profil_unj.php"><i class="fa fa-circle-o"></i> UNJ</a></li>
		            <li><a href="profil_kami.php"><i class="fa fa-circle-o"></i> Profil</a></li>
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
		        Tambah Stok
		        <small>Data Koperasi</small>
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
		        <li class="active">Tambah Stok</li>
		        
		      </ol>
		    </section>

			<section class="content">

				<div class="row">
					<div class="col-xs-12">							
						<div class="box">
							<!-- Horizontal Form -->
				          	<div class="box box-info">
				            <div class="box-header with-border">
				              <h3 class="box-title">Form Tambah Stok</h3>
				            </div>
				            <!-- /.box-header -->
				            <!-- form start -->
				            
				            
				              <div class="box-body">
				              	<form action="proses_tambah_stok.php" class="form-horizontal" method="post" name="form1">
					              	<label>Stok Barang</label>
					                <div class="form-group">
					                  <div class="col-sm-10">
					                  	<select class="form-control" name="list_penjualan">
					                  		<?php
					                  			$kuantitas_begin = 0;
					                  			while ($row = mysqli_fetch_array($list_barang))
												{
												    echo "<option>".$row['nama']."</option>";   
												}
					                  		?>
						                </select>
					                  </div>
					                </div>
					                <label>Tanggal</label>
					                <div class="form-group">
					                	<div class="col-sm-10">
					                		<div class="input-group date">
					                			<div class="input-group-addon">
					                				<i class="fa fa-calendar"></i>
					                			</div>
					                			<input type="text" class="form-control pull-right" id="datepicker" name="tanggal">
					                		</div>
					                	</div>
						                <!-- /.input group -->
						            </div>
					                <label>Kuantitas <small>*pcs/unit/buah</small></label>
					                <div class="form-group">
					                  <div class="col-sm-10">
					                    <input type="text" class="form-control" placeholder="0" name="kuantitas">
					                  </div>
					                </div>
					                <label>Akun Debit</label>
					                <div class="form-group">
					                  <div class="col-sm-10">
					                  	<select class="form-control" name="akun_debit">
					                  		<?php
					                  			while ($row = mysqli_fetch_array($data_akun_debit))
												{
												    echo "<option>".$row['nama_akun']."</option>";
												}
					                  		?>
						                </select>
					                  </div>
					                </div>
					                <label>Akun Kredit</label>
					                <div class="form-group">
					                  <div class="col-sm-10">
					                  	<select class="form-control" name="akun_kredit">
					                  		<?php
					                  			while ($row = mysqli_fetch_array($data_akun_kredit))
												{
												    echo "<option>".$row['nama_akun']."</option>";
												}
					                  		?>
						                </select>
					                  </div>
					                </div>
					              </div>
					              <!-- /.box-body -->
					              <div class="box-footer">
					                <button name="Submit" type="submit" class="btn btn-info pull-right">Submit</button>
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
		<script src="../bower_components/jquery/dist/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		  //Date picker
		    $(function(){
			    var pickerOpts = {
			        dateFormat: "yy-mm-dd",
			        orientation: "bottom",
			    };  
			    $("#datepicker").datepicker(pickerOpts);
			});
		</script>
		<!-- Bootstrap 3.3.7 -->
		<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Morris.js charts -->
		<script src="../bower_components/raphael/raphael.min.js"></script>
		<script src="../bower_components/morris.js/morris.min.js"></script>
		<!-- Sparkline -->
		<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="../bower_components/moment/min/moment.min.js"></script>
		<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Slimscroll -->
		<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="../bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="../dist/js/adminlte.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="../dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="../dist/js/demo.js"></script>
	<!-- /.Scripts -->
</body>
</html>