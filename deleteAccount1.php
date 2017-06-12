<?php
	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
	
	$UserID = $_GET['userID'];
	$result = mysql_query("UPDATE users SET status = 'Terminated' WHERE UserID=$UserID")
	or die (mysql_error());
	
	header("Location: logout1.php");
?>