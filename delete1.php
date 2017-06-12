<?php
	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
	
	$id = $_GET['cartID'];
	$result = mysql_query("SELECT * FROM cart WHERE cartID=$id")
	or die (mysql_error());
	$row = mysql_fetch_array($result);
	$result2 = mysql_query("SELECT productID,stock FROM product WHERE productID=".$row['productID'])
	or die(mysql());
	$row2 = mysql_fetch_array($result2);

	$newStock = $row['quantity'] + $row2['stock'];
	$query = mysql_query('UPDATE product SET stock = '.$newStock.' WHERE productID='.$row['productID'])
	or die(mysql());
	if ($query)
	{
		mysql_query("DELETE FROM cart WHERE cartID=$id")
		or die (mysql_error());
	}
	
	header("Location: cart1.php");
?>