<?php
// Create database connection using config file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=bukubesar.xls");
 
$result = mysqli_query($connect, "SELECT tanggal,fk_nama_akun,jml_debit,jml_kredit,jml_saldo FROM data_bukubesar ORDER BY id_buku");

// Write data to file
$flag = false;
while ($row = mysqli_fetch_array($result)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
?>