<?php
	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
	
	$id = $_GET['productID'];
	$query = mysql_query("SELECT * FROM product WHERE productID=".$id.";")
	or die (mysql_error());
	if ($query)
	{
		mysql_query("DELETE FROM product WHERE productID=".$id.";")
		or die (mysql_error());
	}
	
	header("Location: viewProductList.php");
?>