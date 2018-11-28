<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];
 
// Fetch all users data from database
$result = mysqli_query($connect, "SELECT * FROM data_koperasi ORDER BY id ASC");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIKOP | Profil Pengembang</title>
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
		          <p>A<?php echo $_SESSION['username']?></p>
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
		        <li class="treeview">
		          <a href="#">
		            <i class="fa fa-dashboard"></i> <span>Masukkan Data</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="add_transaksi.php"><i class="fa fa-circle-o"></i> Transaksi</a></li>
		            <li><a href="add_transaksi_beli.php"><i class="fa fa-circle-o"></i> Pembelian</a></li>
		            <li><a href="add_stok_barang.php"><i class="fa fa-circle-o"></i> Tambah Stok</a></li>
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
		        <li class="active treeview">
		          <a href="#">
		            <i class="fa fa-pie-chart"></i>
		            <span>Tentang Kami</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="profil_unj.php"><i class="fa fa-circle-o"></i> UNJ</a></li>
		            <li class="active"><a href="profil_kami.php"><i class="fa fa-circle-o"></i> Profil</a></li>
		          </ul>
		        </li>
		      </ul>
		  	</section>
		    <!-- /.sidebar -->
		</aside>

		<!-- Content -->
		<div class="content-wrapper" style="min-height: 1126px;">
		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <h1>
		        Profil
		        <small>Universitas Negeri Jakarta</small>
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
		        <li><a href="#">Tentang Kami</a></li>
		        <li class="active">UNJ</li>
		      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content">

		      <!-- Default box -->
		      <div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Sejarah UNJ</h3>

		          <div class="box-tools pull-right">
		            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
		              <i class="fa fa-minus"></i></button>
		            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
		              <i class="fa fa-times"></i></button>
		          </div>
		        </div>
		        <div class="box-body">
		        	<P CLASS="western" STYLE="line-height: 150%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3><B>BIODATA
						KETUA TIM PENGUSUL</B></FONT></FONT></FONT></FONT></P>
						<P CLASS="western" ALIGN=JUSTIFY STYLE="line-height: 150%; widows: 2; orphans: 2">
						</P>

							<TABLE WIDTH=616 CELLPADDING=7 CELLSPACING=0>
								<COL WIDTH=27>
								<COL WIDTH=342>
								<COL WIDTH=203>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>1</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Nama
										Lengkap (dengan gelar)</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Dewi
										Nurmalasari, S.Pd, MM </FONT></FONT></FONT></FONT>
										</P>
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><BR>
										</P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>2</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Jenis
										Kelamin</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Perempuan</FONT></FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>3</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Jabatan
										Fungsional</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Lektor</FONT></FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>4</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>NIP/NIK/Identitas
										lainnya</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>19810114
										200812 2002</FONT></FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>5</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>NIDN</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#545454"><FONT FACE="Times New Roman, serif"><FONT SIZE=3><SPAN STYLE="background: #ffffff">0014018105</SPAN></FONT></FONT></FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>6</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Tempat
										dan Tanggal Lahir</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Jakarta,
										14 Januari 1981</FONT></FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>7</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P LANG="en-US" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT COLOR="#000000">E-mail
										</FONT>
										</P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Special_dewi@yahoo.co.id</FONT></FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>8</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Nomor
										Telepon/HP</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>087885600760</FONT></FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>9</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Alamat
										Kantor</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3><SPAN STYLE="background: #ffffff">Jl.
										Pemuda 10,</SPAN></FONT></FONT><FONT FACE="Times New Roman, serif"><FONT SIZE=3><SPAN STYLE="background: #ffffff">&nbsp;</SPAN></FONT></FONT><EM><FONT FACE="Times New Roman, serif"><FONT SIZE=3><SPAN STYLE="font-style: normal"><SPAN STYLE="background: #ffffff">Rawamangun</SPAN></SPAN></FONT></FONT></EM><FONT FACE="Times New Roman, serif"><FONT SIZE=3><SPAN STYLE="background: #ffffff">.</SPAN></FONT></FONT><FONT FACE="Times New Roman, serif"><FONT SIZE=3><SPAN STYLE="background: #ffffff">&nbsp;</SPAN></FONT></FONT><EM><FONT FACE="Times New Roman, serif"><FONT SIZE=3><SPAN STYLE="font-style: normal"><SPAN STYLE="background: #ffffff">Jakarta
										Timur. Gedung R Fakultas Ekonomi</SPAN></SPAN></FONT></FONT></EM></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>10</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Nomor
										Telepon/Faks</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>021-4721227</FONT></FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=27 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>11</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=342 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=JUSTIFY STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Mata
										Kuliah yg Diampu</FONT></FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=203 STYLE="border: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="margin-bottom: 0.14in; widows: 2; orphans: 2">
										<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Public
										Relation</FONT></FONT></FONT></FONT></P>
										<P CLASS="western" STYLE="margin-bottom: 0.14in; widows: 2; orphans: 2">
										<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Kajian
										Kurikulum SMA/SMK</FONT></FONT></FONT></FONT></P>
										<P CLASS="western" STYLE="margin-bottom: 0.14in; widows: 2; orphans: 2">
										<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Strategi
										Belajar Mengajar</FONT></FONT></FONT></FONT></P>
										<P CLASS="western" STYLE="margin-bottom: 0.14in; widows: 2; orphans: 2">
										<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Teknologi
										Perkantoran</FONT></FONT></FONT></FONT></P>
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif"><FONT SIZE=3>Kewirausahaan</FONT></FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TABLE>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<BR><BR>
						</P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<IMG SRC="../image/biodata_html_48612f95.jpg" NAME="Picture 1" ALIGN=BOTTOM WIDTH=147 HEIGHT=219 BORDER=0></P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<BR><BR>
						</P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						</P>

						<TABLE WIDTH=642 CELLPADDING=7 CELLSPACING=0>
							<COL WIDTH=23>
							<COL WIDTH=220>
							<COL WIDTH=356>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=14 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">1</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #4f81bd; border-bottom: 1px solid #4f81bd; border-left: none; border-right: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Nama
										Lengkap (dengan gelar)</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Marsofiyati,
										S. Pd., M. Pd.</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=13 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">2</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Jenis
										Kelamin</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Perempuan</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=15 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">3</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #4f81bd; border-bottom: 1px solid #4f81bd; border-left: none; border-right: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Jabatan
										Fungsional</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Asisten
										Ahli</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=13 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">4</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">NIP/NIK/Identitas
										lainnya</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">198004122005012002</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=15 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">5</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #4f81bd; border-bottom: 1px solid #4f81bd; border-left: none; border-right: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">NIDN</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">0012048001</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=13 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">6</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Tempat
										dan Tanggal Lahir</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Jakarta,
										12 April 1980</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=15 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">7</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #4f81bd; border-bottom: 1px solid #4f81bd; border-left: none; border-right: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">E-mail</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Marsofiyati
										@unj.ac.id</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=13 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">8</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Nomor
										Telepon/HP</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">081311322602</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=15 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">9</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #4f81bd; border-bottom: 1px solid #4f81bd; border-left: none; border-right: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Alamat
										Kantor</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Jl.
										Rawamangun Muka Jakarta Timur</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD WIDTH=23 HEIGHT=13 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">10</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=220 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Nomor
										Telepon/Faks</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">021-4721227/021-4706285</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
							<TBODY>
								<TR VALIGN=TOP>
									<TD ROWSPAN=6 WIDTH=23 HEIGHT=14 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #4f81bd; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" ALIGN=CENTER STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">11</FONT></FONT></FONT></P>
									</TD>
									<TD ROWSPAN=6 WIDTH=220 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #4f81bd; border-bottom: none; border-left: none; border-right: none; padding: 0in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Mata
										Kuliah yang Diampu</FONT></FONT></FONT></P>
									</TD>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Pengetahuan
										dan Praktek Mengetik Manual &amp; Elektrik</FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Stenografi
										Bahasa Indonesia</FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Korespondensi
										Bahasa Indonesia</FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Korespondensi
										Bahasa Inggris</FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Etika
										Profesi Sekretaris</FONT></FONT></FONT></P>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD WIDTH=356 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: 1px solid #4f81bd; border-left: 1px solid #4f81bd; border-right: 1px solid #4f81bd; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
										<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT FACE="Times New Roman, serif">Manajemen
										Kearsipan</FONT></FONT></FONT></P>
									</TD>
								</TR>
							</TBODY>
						</TABLE>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<BR><BR>
						</P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<IMG SRC="../image/biodata_html_b40b51fa.jpg" NAME="Picture 6" ALIGN=BOTTOM WIDTH=249 HEIGHT=249 BORDER=0></P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						</P>
						<P LANG="en-US" CLASS="western" STYLE="margin-top: 0in"><BR>
						</P>
						<TABLE WIDTH=619 CELLPADDING=2 CELLSPACING=1>
							<COL WIDTH=17>
							<COL WIDTH=243>
							<COL WIDTH=341>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=35 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>1</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Nama
									Lengkap (dengan gelar)</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.04in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Darma
									Rika Swaramarinda, S.Pd.,M.SE.</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=38 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>2</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Jenis
									Kelamin</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.04in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Perempuan</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=37 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>3</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Jabatan
									Fungsional</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Lektor</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=38 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>4</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>NIP/NIK/Identitas
									lainnya</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>19830324
									200912 2002</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=37 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>5</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>NIDN</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>0024038310</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=38 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>6</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Tempat
									dan Tanggal Lahir</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Banjarmasin,
									24 Maret 1983</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=38 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>7</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>E-mail</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><A HREF="mailto:darmarika_s@yahoo.com"><FONT SIZE=3><U>darmarika_s@yahoo.com</U></FONT></A></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=37 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>8</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Nomor
									Telepon/HP</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>08174827739</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=38 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>9</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Alamat
									Kantor</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Jl.
									Rawamangun Muka Jakarta Timur</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=17 HEIGHT=37 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.03in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>10</FONT></FONT></P>
								</TD>
								<TD WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Nomor
									Telepon/Faks</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.08in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>021-4721227/021-4706285</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD ROWSPAN=6 WIDTH=17 HEIGHT=36 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 2.55pt double #eae8d6; border-right: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US"><BR>
									</P>
									<P LANG="en-US"><BR>
									</P>
									<P LANG="en-US"><BR>
									</P>
									<P LANG="en-US"><BR>
									</P>
									<P LANG="en-US" STYLE="margin-top: 0.01in"><BR>
									</P>
									<P LANG="en-US" STYLE="margin-left: 0.03in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>1</FONT><FONT SIZE=3><SPAN LANG="id-ID">1</SPAN></FONT></FONT></P>
								</TD>
								<TD ROWSPAN=6 WIDTH=243 STYLE="border: 3.00pt double #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US"><BR>
									</P>
									<P LANG="en-US"><BR>
									</P>
									<P LANG="en-US"><BR>
									</P>
									<P LANG="en-US"><BR>
									</P>
									<P LANG="en-US" STYLE="margin-top: 0.01in"><BR>
									</P>
									<P LANG="en-US" STYLE="margin-left: 0.08in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Mata
									Kuliah yang Diampu</FONT></FONT></P>
								</TD>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.04in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Etika
									Bisnis</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.04in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Bahasa
									Inggris</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.04in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Manajemen
									Kearsipan dan Dokumentasi</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.04in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Evaluasi
									Pengajaran</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #000001; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.04in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Matematika
									Ekonomi</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=341 STYLE="border-top: 3.00pt double #000001; border-bottom: 3.00pt double #eae8d6; border-left: 3.00pt double #000001; border-right: 2.55pt double #eae8d6; padding-top: 0in; padding-bottom: 0in; padding-left: 0.02in; padding-right: 0in">
									<P LANG="en-US" STYLE="margin-left: 0.04in; margin-top: 0.02in"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT SIZE=3>Pengantar
									Bisnis</FONT></FONT></P>
								</TD>
							</TR>
						</TABLE>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<BR><BR>
						</P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<IMG SRC="../image/biodata_html_2da43e70.jpg" NAME="Picture 4" ALIGN=BOTTOM WIDTH=186 HEIGHT=271 BORDER=0></P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						</P>
						<TABLE WIDTH=688 CELLPADDING=5 CELLSPACING=0 BGCOLOR="#ffffff">
							<COL WIDTH=280>
							<COL WIDTH=20>
							<COL WIDTH=357>
							<TR>
								<TD WIDTH=280 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Nama</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=20 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>:</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=357 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>DITA
									PURUWITA</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=280 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Perguruan
									Tinggi</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=20 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>:</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=357 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Universitas
									Negeri Jakarta</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=280 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Program
									Studi</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=20 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>:</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=357 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Pendidikan
									Tata Niaga</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=280 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Jenis
									Kelamin</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=20 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>:</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=357 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Perempuan</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=280 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Jabatan
									Fungsional</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=20 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>:</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=357 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Lektor</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=280 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Pendidikan
									Tertinggi</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=20 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>:</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=357 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>S2</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=280 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Status
									Ikatan Kerja</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=20 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>:</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=357 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Dosen
									Tetap</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=280 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Status
									Aktivitas</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=20 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>:</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=357 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Aktif</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
						</TABLE>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<BR><BR>
						</P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<BR><BR>
						</P>
						<TABLE WIDTH=786 CELLPADDING=8 CELLSPACING=0 BGCOLOR="#ffffff">
							<COL WIDTH=25>
							<COL WIDTH=163>
							<COL WIDTH=68>
							<COL WIDTH=62>
							<COL WIDTH=386>
							<TR VALIGN=TOP>
								<TD WIDTH=25 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#ffffff"><FONT FACE="Helvetica, serif"><FONT SIZE=2><B>No.</B></FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=163 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#ffffff"><FONT FACE="Helvetica, serif"><FONT SIZE=2><B>Perguruan
									Tinggi</B></FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=68 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#ffffff"><FONT FACE="Helvetica, serif"><FONT SIZE=2><B>Gelar
									Akademik</B></FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=62 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#ffffff"><FONT FACE="Helvetica, serif"><FONT SIZE=2><B>Tanggal
									Ijazah</B></FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=386 BGCOLOR="#ffffff" STYLE="border-top: none; border-bottom: none; border-left: 1px solid #eeeeee; border-right: 1px solid #eeeeee; padding: 0in 0.08in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><A NAME="_GoBack"></A>
									<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#ffffff"><FONT FACE="Helvetica, serif"><FONT SIZE=2><B>Jenjang</B></FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=25 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>1</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=163 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Universitas
									Negeri Jakarta</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=68 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>S.Pd</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=62 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>2005</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=386 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: 1px solid #eeeeee; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>S1</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=25 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0.08in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>2</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=163 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0.08in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Universitas
									Padjadjaran</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=68 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0.08in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>M.Si</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=62 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0.08in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>2009</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=386 BGCOLOR="#ffffff" STYLE="border: 1px solid #eeeeee; padding: 0.08in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>S2</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
						</TABLE>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<BR><BR>
						</P>
						<TABLE WIDTH=498 CELLPADDING=8 CELLSPACING=0 BGCOLOR="#ffffff">
							<COL WIDTH=286>
							<COL WIDTH=178>
							<TR>
								<TD WIDTH=286 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>DASAR-DASAR
									AKUNTANSI KEUANGAN</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=178 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: 1px solid #eeeeee; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Universitas
									Negeri Jakarta</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=286 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>MANAJEMEN
									KEUANGAN</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=178 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: 1px solid #eeeeee; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Universitas
									Negeri Jakarta</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=286 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>AKUNTANSI
									BIAYA</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=178 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: 1px solid #eeeeee; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Universitas
									Negeri Jakarta</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=286 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>HITUNG
									KEUANGAN</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=178 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: 1px solid #eeeeee; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Universitas
									Negeri Jakarta</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=286 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>PENGANTAR
									AKUNTANSI I</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=178 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: none; border-left: 1px solid #eeeeee; border-right: 1px solid #eeeeee; padding-top: 0.08in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Universitas
									Negeri Jakarta</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=286 BGCOLOR="#ffffff" STYLE="border-top: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee; border-left: 1px solid #eeeeee; border-right: none; padding-top: 0.08in; padding-bottom: 0.08in; padding-left: 0.08in; padding-right: 0in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>AKUNTANSI
									MANAJEMEN</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
								<TD WIDTH=178 BGCOLOR="#ffffff" STYLE="border: 1px solid #eeeeee; padding: 0.08in">
									<P CLASS="western" STYLE="widows: 2; orphans: 2"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><FONT COLOR="#333333"><FONT FACE="Helvetica, serif"><FONT SIZE=2>Universitas
									Negeri Jakarta</FONT></FONT></FONT></FONT></FONT></P>
								</TD>
							</TR>
						</TABLE>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<BR><BR>
						</P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<IMG SRC="../image/biodata_html_736a7f0e.jpg" NAME="Picture 3" ALIGN=BOTTOM WIDTH=193 HEIGHT=261 BORDER=0></P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						</P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						</P>
						<P CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Mahasiswa
						:</FONT></FONT></P>
		          	<OL>
						<LI><P STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Rakha<SPAN LANG="en-US">
						Ramadhana – S1 Pendidikan Informatika</SPAN></FONT></FONT></P>
						<LI><P STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Megawati
						Zahri – S1 Pendidikan Akuntansi</FONT></FONT></P>
						<LI><P STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Nurul
						Mawaddah – S1 Pendidikan Adm. Perkantoran</FONT></FONT></P>
						<LI><P STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Cindy
						Tri Hartati – S1 Pendidikan Adm. Perkantoran</FONT></FONT></P>
						<LI><P STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Gearent
						Firdaus – S1 Pendidikan Adm. Perkantoran</FONT></FONT></P>
						<LI><P STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Annisa
						Denaputri – S1 Pendidikan Adm. Perkantoran</FONT></FONT></P>
						<LI><P STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Haris
						Aqthoruddin – S1 Pendidikan Adm. Perkantoran</FONT></FONT></P>
						<LI><P STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Akmal
						Atthorobi – S1 Pendidikan Ekonomi Koperasi</FONT></FONT></P>
						<LI><P STYLE="margin-bottom: 0.14in; line-height: 115%; widows: 2; orphans: 2">
						<FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Meita
						Anisya Rahma – S1 Pendidikan Adm. Perkantoran</FONT></FONT></P>
					</OL>
		        </div>
		        <!-- /.box-body -->
		        <div class="box-footer">
		          <span>
		          	<small>"Building Future Leader"</small>
		          </span>
		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->

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
		<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
	<!-- /.Scripts -->
</body>
</html>