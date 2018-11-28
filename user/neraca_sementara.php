	<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];
 
// Fetch all users data from database
$result = mysqli_query($connect, "SELECT kode,nama_akun,saldo_awal,saldo_akhir,kategori FROM data_chartofaccount ORDER BY id_akun ASC"); 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIKOP | Neraca Sementara</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
		        <li>
		        	<a href="list_coa.php"><i class="fa fa-book"></i> <span>Chart of Account</span></a>
		        </li>
		        <li>
		        	<a href="list_barang.php"><i class="fa fa-archive"></i> <span>Persediaan Barang</span></a>
		        </li>
		        <li class="active treeview">
		          <a href="#">
		            <i class="fa fa-dashboard"></i> <span>Laporan</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="bukubesar.php"><i class="fa fa-circle-o"></i> Buku Besar</a></li>
		            <li class="active"><a href="neraca_sementara.php"><i class="fa fa-circle-o"></i> Neraca Saldo Sementara (NSS)</a></li>
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
		        Neraca Sementara
		        <small>NSS</small>
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
		        <li class="active">Neraca Sementara</li>
		      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content">
		    	<form action="neraca_sementara.php" class="form-horizontal" method="post" name="form1">
					<label>Pilih Bulan</label>
					<div class="form-group">
						<div class="col-sm-10">
							<select class="form-control" name="nss" value=value=<?php echo $buku_besar;?>>
								<option>Agustus 2018</option>
								<option>September 2018</option>
								<option>Oktober 2018</option>
								<option>November 2018</option> 
							</select>
						</div>
						<div class="col-sm-2">
							<button name="Submit" type="submit" class="btn btn-info pull-left">Pilih</button>
						</div>

					</div>
				</form>

				<div class="row">
					<br>
			        <div class="col-xs-12">
			             	<div class="box">
				            <div class="box-header">
				              <h3 class="box-title">Tabel Neraca Sementara</h3> 
				            </div>
			            	<!-- /.box-header -->

				            <div class="box-body table-responsive no-padding">
				              <table id="example1" class="table table-bordered table-striped">
				              	<thead>
				                <tr>
				                	<th>No</th> 
					                <th>Nama Akun</th>
					                <th>Debit</th>
					                <th>Kredit</th> 
				                </tr>
				                </thead>
				                <tbody>
				                <?php
 								$number = 1;
 								$sub_debit = 0;
 								$sub_kredit = 0;  

							    while($user_data = mysqli_fetch_array($result)) { 

							        echo "<tr>";
							        echo "<td>".$number."</td>"; 
							        echo "<td>".$user_data['nama_akun']."</td>";

							        if($user_data['kategori']==1){
							        	if ($user_data['saldo_akhir']==0){
							        		echo "<td>0</td>";
								        	echo "<td>".$user_data['saldo_awal']."</td>";
								        	$sub_debit += $user_data['saldo_awal']; 
							        	}else{
							        		echo "<td>".$user_data['saldo_akhir']."</td>";
								        	echo "<td>0</td>";
								        	$sub_debit += $user_data['saldo_akhir'];
							        	}
							        	
							        }else{
							        	if ($user_data['saldo_akhir']==0){
							        		echo "<td>0</td>";
								        	echo "<td>".$user_data['saldo_awal']."</td>";
								        	$sub_kredit += $user_data['saldo_awal']; 
							        	}else{
							        		echo "<td>0</td>";
								        	echo "<td>".$user_data['saldo_akhir']."</td>";
								        	$sub_kredit += $user_data['saldo_akhir']; 
							        	}
							        	
							        } 
							        ++$number;        
							    }
							    ?>
							    </tbody>
							    <tfoot>
							    	<th> </th>
							    	<th> </th>
							    	<th><?php echo $sub_debit ?></th>
							    	<th><?php echo $sub_kredit ?></th>
							    	
							    	
							    </tfoot>
				              	</table>
				            </div>
			            	<!-- /.box-body -->
			          	</div>
			          	<!-- /.box -->
			        </div>
			    </div>
		    </section>
		    <!-- /.content -->
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
		<!-- Bootstrap 3.3.7 -->
		<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- DataTables -->
		<script type="text/javascript" src="../DataTables/JSZip-2.5.0/jszip.min.js"></script>
		<script type="text/javascript" src="../DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="../DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="../DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../DataTables/DataTables-1.10.18/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="../DataTables/Buttons-1.5.2/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="../DataTables/Buttons-1.5.2/js/buttons.bootstrap.min.js"></script>
		<script type="text/javascript" src="../DataTables/Buttons-1.5.2/js/buttons.html5.min.js"></script>
		<!-- FastClick -->
		<script src="../bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="../dist/js/adminlte.min.js"></script>
		<!-- Sparkline -->
		<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<!-- jvectormap  -->
		<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- SlimScroll -->
		<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- ChartJS -->
		<script src="../bower_components/chart.js/Chart.js"></script>
		<!-- page script -->
		<script>
		 $(document).ready(function() {
		    $('#example1').DataTable( {
		        dom: 'Brftip',
		        buttons: [
		              'excel', 'pdf'
		        ]
		    } );
		} );	
		</script>
	<!-- /.Scripts -->
</body>
</html>