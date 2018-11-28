<?php
// include database connection file
include "../config.php";
include "access.php";
$username = $_SESSION['username'];
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id 
$result = mysqli_query($connect, "DELETE FROM data_chartofaccount WHERE id_akun=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:list_coa.php");
?>