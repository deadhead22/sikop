<?php
 session_start(); //memulai session
 include "config.php";

 //mengambil isian username dan password dari form
 $username = $_POST['username'];
 $password = $_POST['password'];
 
 //query untuk mengambil data user dari database sesuai dengan username inputan form
 $q = "SELECT * FROM user WHERE username = '$username' ";
 $result = mysqli_query($connect, $q);
 $data = mysqli_fetch_array($result);

 //cek kesesuaian password masukan dengan database
 if ($password == $data['password']) {
	 //menyimpan tipe user dan username dalam session
	 if ($_SESSION['username'] = $data['username']){
	 	 if (strtolower($username) == "admin" AND $password == "admin") {
	 		header( 'Location: admin/jurnal.php' ) ;
	 		}
	 	else{
	 	header( 'Location: user/jurnal.php' ) ;}
	 }
 }
 //jika password tidak sesuai
 else if($username == "" OR $password == ""){
	 echo '<script language="javascript">alert("Username / Password belum diisi!"); document.location="index.php";</script>';
 }
 else {
	echo '<script language="javascript">alert("Username / Password tidak sesuai!"); document.location="index.php";</script>';
 }
 ?> 