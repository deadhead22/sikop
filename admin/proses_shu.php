<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$shu = $_POST['shu'];

	$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$shu,saldo_akhir=$shu WHERE nama_akun='SHU'"); 
	$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$shu,saldo_akhir=$shu WHERE nama_akun='Iktisar Laba Rugi'"); 

	$tanggal = date("Y-m-d");

	if ($shu<0) {
		//Laba
		$result = mysqli_query($connect, "INSERT INTO data_jurnal(tanggal,transaksi,jumlah,akun_debit,akun_kredit) VALUES('$tanggal','Mengupdate SHU','$shu','Iktisar Laba Rugi','SHU')");
		// Update SHU Laba
		$result = mysqli_query($connect, "INSERT INTO data_bukubesar(fk_nama_akun,jml_debit,jml_kredit) VALUES('Iktisar Laba Rugi','$shu',0)");
		$result = mysqli_query($connect, "INSERT INTO data_bukubesar(fk_nama_akun,jml_debit,jml_kredit) VALUES('SHU',0,'$shu')");
	}else{
		//Rugi
		$result = mysqli_query($connect, "INSERT INTO data_jurnal(tanggal,transaksi,jumlah,akun_debit,akun_kredit) VALUES('$tanggal','Mengupdate SHU','$shu','SHU','Iktisar Laba Rugi')");	
		// Update SHU Rugi
		$result = mysqli_query($connect, "INSERT INTO data_bukubesar(fk_nama_akun,jml_debit,jml_kredit) VALUES('SHU','$shu',0)");
		$result = mysqli_query($connect, "INSERT INTO data_bukubesar(fk_nama_akun,jml_debit,jml_kredit) VALUES('Iktisar Laba Rugi',0,'$shu')");
	}

	//Show message when user added
	echo '<script language = "javascript">alert("SHU TERUPDATE!");
	document.location="perhitungan_hasil_usaha.php";</script>';
	
}else{
	//Show message when user added
	echo '<script language = "javascript">alert("GAGAL UPDATE!");
	document.location="perhitungan_hasil_usaha.php";</script>';
}
?>