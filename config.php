<?php
//Connection to database

$databaseHost = 'localhost';
$databaseName = 'sikop';
$databaseUsername = 'root';
$databasePassword = '';

$connect = mysqli_connect($databaseHost, $databaseUsername,$databasePassword, $databaseName);

//Jika Koneksi Gagal
if(mysqli_connect_errno())
{
    trigger_error("Tidak Dapat Terkoneksi Dengan Database");
}
$connect->set_charset('UTF-8');
?>