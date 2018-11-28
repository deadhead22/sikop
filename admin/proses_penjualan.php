<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];


// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$list_penjualan = $_POST['list_penjualan']; 
	$tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
	$harga_jual = $_POST['harga_jual']; 
	$kuantitas = $_POST['kuantitas']; 
	$akun_debit = $_POST['akun_debit'];
	$akun_kredit = $_POST['akun_kredit']; 
	
	if($harga_jual == "" OR $kuantitas == ""){
		 echo '<script language="javascript">alert("Ada kolom yang belum diisi!"); document.location="add_transaksi_jual.php";</script>';
	}else{
		$select = $connect->prepare("SELECT kuantitas FROM data_koperasi WHERE nama='$list_penjualan'");
		$select->execute();
		$select->store_result();
		$select->bind_result($kuantitas_awal);
		$select->fetch(); 

		$select = $connect->prepare("SELECT harga_beli FROM data_koperasi WHERE nama='$list_penjualan'");
		$select->execute();
		$select->store_result();
		$select->bind_result($harga_beli);
		$select->fetch(); 

		$jumlah = $kuantitas*$harga_jual;
		$jumlah_hpp = $kuantitas*$harga_beli;

		// Ambil Saldo Awal HPP
		$select = $connect->prepare("SELECT saldo FROM data_chartofaccount WHERE nama_akun='Harga Pokok Penjualan'");
		$select->execute();
		$select->store_result();
		$select->bind_result($saldo_awal_hpp);
		$select->fetch(); 

		$saldo_akhir_hpp = $saldo_awal_hpp+$jumlah_hpp;

		// Ambil Saldo Awal Persediaan
		$select = $connect->prepare("SELECT saldo FROM data_chartofaccount WHERE nama_akun='Persediaan'");
		$select->execute();
		$select->store_result();
		$select->bind_result($saldo_awal_persediaan);
		$select->fetch(); 
		$kuantitas_akhir = $kuantitas_awal-$kuantitas;
	 
		if($saldo_awal_persediaan == 0) {
			$select = $connect->prepare("SELECT saldo_awal FROM data_chartofaccount WHERE nama_akun='Persediaan'");
			$select->execute();
			$select->store_result();
			$select->bind_result($saldo_awal_persediaan);
			$select->fetch();
		}
		 
		$saldo_akhir_persediaan = $saldo_awal_persediaan-$jumlah_hpp;

		// Update Penjualan pada Jurnal
		$result = mysqli_query($connect, "INSERT INTO data_jurnal(tanggal,transaksi,jumlah,akun_debit,akun_kredit) VALUES('$tanggal','$list_penjualan','$jumlah','$akun_debit','$akun_kredit')");
		$result = mysqli_query($connect, "INSERT INTO data_jurnal(tanggal,transaksi,jumlah,akun_debit,akun_kredit) VALUES('$tanggal','$list_penjualan','$jumlah_hpp','Harga Pokok Penjualan','Persediaan')");

		if($akun_debit=='Harga Pokok Penjualan') {
			$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_akhir_hpp,saldo_akhir=$saldo_akhir_hpp WHERE nama_akun='Harga Pokok Penjualan'");	
		}else if($akun_kredit == 'Persediaan') {
			// Update COA Persediaan
			$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_akhir_persediaan,saldo_akhir=$saldo_akhir_persediaan WHERE nama_akun='Persediaan'");
		}else {
			// Update Debit ke Saldo Akhir
			$select = $connect->prepare("SELECT saldo FROM data_chartofaccount WHERE nama_akun='$akun_debit'");
			$select->execute();
			$select->store_result();
			$select->bind_result($saldo_awal_debit);
			$select->fetch(); 
	 
			if($saldo_awal_debit == 0) {
				$select = $connect->prepare("SELECT saldo_awal FROM data_chartofaccount WHERE nama_akun='$akun_debit'");
				$select->execute();
				$select->store_result();
				$select->bind_result($saldo_awal_debit);
				$select->fetch();
			}

			$saldo_debit=$saldo_awal_debit+$jumlah;
	 
			$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_debit,saldo_akhir=$saldo_debit WHERE nama_akun='$akun_debit'");

			// Update Kredit ke Saldo Akhir
			$select = $connect->prepare("SELECT saldo FROM data_chartofaccount WHERE nama_akun='$akun_kredit'");
			$select->execute();
			$select->store_result();
			$select->bind_result($saldo_awal_kredit);
			$select->fetch(); 
			 
			if($saldo_awal_kredit == 0) {
				$select = $connect->prepare("SELECT saldo_awal FROM data_chartofaccount WHERE nama_akun='$akun_kredit'");
				$select->execute();
				$select->store_result();
				$select->bind_result($saldo_awal_kredit);
				$select->fetch();
			}

			$saldo_kredit=$saldo_awal_kredit+$jumlah;

			$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_kredit,saldo_akhir=$saldo_kredit WHERE nama_akun='$akun_kredit'");

			// Update COA HPP
			$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_akhir_hpp,saldo_akhir=$saldo_akhir_hpp WHERE nama_akun='Harga Pokok Penjualan'");

			// Update COA Persediaan
			$result = mysqli_query($connect, "UPDATE data_chartofaccount SET saldo=$saldo_akhir_persediaan,saldo_akhir=$saldo_akhir_persediaan WHERE nama_akun='Persediaan'");
		}
		
		// Update Debit
		$result = mysqli_query($connect, "INSERT INTO data_bukubesar(tanggal, fk_nama_akun,jml_debit,jml_kredit) VALUES('$tanggal','$akun_debit','$jumlah',0)");

		// Update HPP
		$result = mysqli_query($connect, "INSERT INTO data_bukubesar(tanggal, fk_nama_akun,jml_debit,jml_kredit) VALUES('$tanggal','Harga Pokok Penjualan','$jumlah_hpp',0)");

		// Update Persediaan
		$result = mysqli_query($connect, "INSERT INTO data_bukubesar(tanggal, fk_nama_akun,jml_debit,jml_kredit) VALUES('$tanggal','Persediaan',0,'$jumlah_hpp')");

		// Update Kredits
		$result = mysqli_query($connect, "INSERT INTO data_bukubesar(tanggal, fk_nama_akun,jml_debit,jml_kredit) VALUES('$tanggal','$akun_kredit',0,'$jumlah')");

		// Update Katalog Barang
		$result = mysqli_query($connect, "UPDATE data_koperasi SET kuantitas=$kuantitas_akhir,harga_jual=$harga_jual WHERE nama='$list_penjualan'");

		//Show message when user added
		echo '<script language = "javascript">alert("TRANSAKSI BERHASIL!");
		document.location="jurnal.php";</script>';
	}
}else{
	//Show message when user added
	echo '<script language = "javascript">alert("TRANSAKSI GAGAL!");
	document.location="add_transaksi_jual.php";</script>';
}
?>