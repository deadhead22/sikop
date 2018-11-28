<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$nama_akun = $_POST['nama_akun'];
	$kode = $_POST['kode'];
	$saldo_awal = $_POST['saldo_awal'];

	$saldo = $saldo_awal;

	// Update Penjualan
	$result = mysqli_query($connect, "INSERT INTO data_chartofaccount(kode,nama_akun,keterangan,saldo_awal,saldo,saldo_akhir) VALUES('$kode','$nama_akun','Akun','$saldo_awal','$saldo_awal','$saldo_awal')"); 
 
	//Show message when user added
	echo '<script language = "javascript">alert("COA ditambahkan!");
	document.location="list_coa.php";</script>';
	
}else{
	//Show message when user added
	echo '<script language = "javascript">alert("GAGAL!");
	document.location="list_coa.php";</script>';
}
?>