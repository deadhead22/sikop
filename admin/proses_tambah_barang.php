<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];



// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$transaksi = $_POST['transaksi'];
	$jenis_barang = $_POST['jenis_barang'];
	$harga_beli = $_POST['harga_beli'];
	$harga_pokok = $_POST['harga_pokok'];
	$kuantitas = $_POST['kuantitas'];
	$supplier = $_POST['supplier']; 

	$harga_pokok = $harga_beli;
	$jumlah = $kuantitas*$harga_beli; 

	// Update Katalog Barang
	$result = mysqli_query($connect, "INSERT INTO data_koperasi(nama,kuantitas,jenis_barang,harga_beli,harga_pokok,supplier) VALUES('$transaksi','$kuantitas','$jenis_barang','$harga_beli','$harga_pokok','$supplier')");

	//Show message when user added
	echo '<script language = "javascript">alert("TAMBAH BERHASIL!");
	document.location="list_barang.php";</script>';
	
}else{
	//Show message when user added
	echo '<script language = "javascript">alert("TAMBAH GAGAL!");
	document.location="add_barang.php";</script>';
}
?>