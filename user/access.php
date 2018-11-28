<?php
session_start();
 
if(!isset($_SESSION['username'])){
	echo "<script language='javascript'>alert('Anda belum masuk!'); document.location='index.php';</script>";
}