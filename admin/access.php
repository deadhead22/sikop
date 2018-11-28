<?php
session_start();
 
if(!isset($_SESSION['username'])){
	echo "<script language='javascript'>alert('Anda belum masuk!'); document.location='index.php';</script>";
}

if($_SESSION['username']!="admin") {
	echo "<script language='javascript'>alert('Anda tidak memiliki Hak Akses!'); document.location='../index.php';</script>";
}