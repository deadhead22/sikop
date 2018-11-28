<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];



// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$transaksi = $_POST['transaksi'];
	$tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
	$jenis_barang = $_POST['jenis_barang'];
	$harga_beli = $_POST['harga_beli'];
	$harga_pokok = $_POST['harga_pokok'];
	$kuantitas = $_POST['kuantitas'];
	$supplier = $_POST['supplier'];
	$akun_debit = $_POST['akun_debit'];
	$akun_kredit = $_POST['akun_kredit'];

	$harga_pokok = $harga_beli;
	$jumlah = $kuantitas*$harga_beli;
	
	// Ambil Saldo Awal Persediaan
	$select = $connect->prepare("SELECT saldo FROM data_chartofaccount WHERE nama_akun='Persediaan'");
	$select->execute();
	$select->store_result();
	$select->bind_result($saldo_awal_persediaan);
	$select->fetch(); 

	$saldo_akhir = $saldo_awal_persediaan + $jumlah; 

	if ($akun_debit == 'Persediaan') {
		// Update COA Persediaan
		$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_akhir,saldo_akhir=$saldo_akhir WHERE nama_akun='Persediaan'");
	}else {
		// Update Debit ke Saldo Akhir
		$select = $connect->prepare("SELECT saldo FROM data_chartofaccount WHERE nama_akun='$akun_debit'");
		$select->execute();
		$select->store_result();
		$select->bind_result($saldo_awal_debit);
		$select->fetch(); 
		$saldo_debit=$saldo_awal_debit+$jumlah;
		$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_debit,saldo_akhir=$saldo_debit WHERE nama_akun='$akun_debit'");
		$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_akhir,saldo_akhir=$saldo_akhir WHERE nama_akun='Persediaan'");
	}
	
	// Update Penjualan
	$result = mysqli_query($connect, "INSERT INTO data_jurnal(tanggal,transaksi,jumlah,akun_debit,akun_kredit) VALUES('$tanggal','$transaksi','$jumlah','$akun_debit','$akun_kredit')");
	 

	// Update Debit ke Saldo Akhir
	$select = $connect->prepare("SELECT saldo FROM data_chartofaccount WHERE nama_akun='$akun_kredit'");
	$select->execute();
	$select->store_result();
	$select->bind_result($saldo_awal_kredit);
	$select->fetch(); 
	$saldo_kredit=$saldo_awal_kredit-$jumlah;
	$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_kredit,saldo_akhir=$saldo_kredit WHERE nama_akun='$akun_kredit'");

	// Update Debit
	$result = mysqli_query($connect, "INSERT INTO data_bukubesar(tanggal, fk_nama_akun,jml_debit,jml_kredit) VALUES('$tanggal','$akun_debit','$jumlah',0)");

	// Update Kredits
	$result = mysqli_query($connect, "INSERT INTO data_bukubesar(tanggal,fk_nama_akun,jml_debit,jml_kredit) VALUES('$tanggal','$akun_kredit',0,'$jumlah')");

	// Update Katalog Barang
	$result = mysqli_query($connect, "INSERT INTO data_koperasi(nama,kuantitas,jenis_barang,harga_beli,harga_pokok) VALUES('$transaksi','$kuantitas','$jenis_barang','$harga_beli','$harga_pokok')");

	//Show message when user added
	echo '<script language = "javascript">alert("TRANSAKSI BERHASIL!");
	document.location="jurnal.php";</script>';
	
}else{
	//Show message when user added
	echo '<script language = "javascript">alert("TRANSAKSI GAGAL!");
	document.location="add_transaksi_beli.php";</script>';
}
?>