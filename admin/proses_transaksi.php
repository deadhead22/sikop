<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];



// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$transaksi = $_POST['transaksi'];
	$tanggal = date('Y-m-d',strtotime($_POST['tanggal']));

	// $tanggal = $_POST['tanggal'];
	$jumlah = $_POST['jumlah'];
	$akun_debit = $_POST['akun_debit'];
	$akun_kredit = $_POST['akun_kredit'];
	
	// echo $tanggal;
	// Update Penjualan
	$result = mysqli_query($connect, "INSERT INTO data_jurnal (tanggal, transaksi, jumlah, akun_debit, akun_kredit) VALUES ('$tanggal', '$transaksi','$jumlah', '$akun_debit', '$akun_kredit')");

	// Update Debit
	$result = mysqli_query($connect, "INSERT INTO data_bukubesar(tanggal, fk_nama_akun,jml_debit,jml_kredit) VALUES('$tanggal','$akun_debit','$jumlah',0)");

	// Update Kredit
	$result = mysqli_query($connect, "INSERT INTO data_bukubesar(tanggal, fk_nama_akun,jml_debit,jml_kredit) VALUES('$tanggal','$akun_kredit',0,'$jumlah')");

	// Update Debit ke Saldo Akhir
	$select = $connect->prepare("SELECT saldo FROM data_chartofaccount WHERE nama_akun='$akun_debit'");
	$select->execute();
	$select->store_result();
	$select->bind_result($saldo_awal_debit);
	$select->fetch(); 
	$saldo_debit=$saldo_awal_debit+$jumlah;
	$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_debit,saldo_akhir=$saldo_debit WHERE nama_akun='$akun_debit'");

	// Update Debit ke Saldo Akhir
	$select = $connect->prepare("SELECT saldo FROM data_chartofaccount WHERE nama_akun='$akun_kredit'");
	$select->execute();
	$select->store_result();
	$select->bind_result($saldo_awal_kredit);
	$select->fetch(); 
	$saldo_kredit=$saldo_awal_kredit-$jumlah;
	$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_kredit,saldo_akhir=$saldo_kredit WHERE nama_akun='$akun_kredit'");

	//Show message when user added
	echo '<script language = "javascript">alert("TRANSAKSI BERHASIL!");
	document.location="jurnal.php";</script>';
	
}else{
	//Show message when user added
	echo '<script language = "javascript">alert("TRANSAKSI GAGAL!");
	document.location="add_transaksi.php";</script>';
}
?>