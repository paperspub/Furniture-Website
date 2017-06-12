<?php
	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
	
	$error='';
	$quantity=1;	
function renderForm ($quantity,$error)
{
	include 'headerAdmin.php';
	$name = $_SESSION['Username'];

	echo '<title>My Cart | Cramiture.com</title>';
	echo '<h1 class="title">My Cart</h1>';

	$getInfo = mysql_query("SELECT userID,username FROM users WHERE username = '$name'")
		or die(mysql_error());
	$userInfo = mysql_fetch_array($getInfo);
	$result = mysql_query("SELECT * FROM cart WHERE userID= '".$userInfo['userID']."' AND status='in cart'")
		or die(mysql_error());
	// display data in table
	echo "<table border='1' cellpadding='10' style='text-align:center;'>";
	echo "<tr> <th>Product ID</th> <th>Product Name</th> <th>Price(RM)</th> <th>Quantity</th> <th>Total Price (RM)</th> <th>Remove Item(s)</th> ";
	$total = 0;
	$totalq = 0;
	// loop through results of database query, displaying them in the table

	while($row = mysql_fetch_array( $result )) {
		if ($error !='')
	{
		echo '<div style="padding:4px; border:1px solid red;"><span style="color:red;">'.$error.'</span>';
	}
	else
	{
		$quantity = $row['quantity'];
	}
		$row2 = mysql_fetch_array(mysql_query("SELECT * FROM product WHERE productID = ".$row['productID']));
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['productID'] . '</td>';
		echo '<td>' . $row2['productName'] . '</td>';
		echo '<td>' . $row2['price'] . '</td>';
		echo '<td><form action="" method="post"> <input type="number" name="Quantity" min="1" max="500" value="'.$quantity.'"><input style="display:none;" type="text" name="cID" value="'.$row['cartID'].'"><input type="submit" name="editQuantity" value="Edit"></td></form>';
		echo '<td>' . $row['subtotal'] . '</td>';
		echo '<td><a href="delete1.php?cartID='. $row['cartID'].'"><button>Remove</button></a></td>';
		echo "</tr>";
		$total = $total + $row['subtotal'];
		$totalq = $totalq + $row['quantity'];
	} 
	
	$displayTotal = number_format($total, 2, '.', '');
	echo "<tr>";
	echo '<td colspan="3" style="text-align:right;">Total (RM) :</td>';
	echo '<td>'.$totalq.'</td>';
	echo '<td>' . $displayTotal . '</td>';
	if ($displayTotal !=0)
	{
		echo '<td><form action="checkOut1.php" method="post"><input type="submit" name="checkOut" id="checkOut" value="Check Out"></form></td>';
		echo "</tr>"; 
	}
	else
	{
		echo '<td><form action="checkOut1.php" method="post"><input type="submit" name="checkOut" id="checkOut" value="Check Out" disabled></form></td>';
		echo "</tr>"; 
	}
	// close table>
	echo "</table>";
	
	//Order table
	echo '<h1 class="title">My Orders</h1>';
	$result2 = mysql_query("SELECT * FROM checkout WHERE userID= '".$userInfo['userID']."' AND status='Shipping'")
		or die(mysql_error());
	// display data in table
	echo "<table border='1' cellpadding='10' style='text-align:center;'>";
	echo "<tr> <th>Order No.</th> <th>Date Ordered</th> <th>Status</th> <th>Current Location</th> ";

	// loop through results of database query, displaying them in the table
	while($row2 = mysql_fetch_array( $result2 )) {
		echo "<tr>";
		echo '<td>' . $row2['orderID'] . '</td>';
		echo '<td>' . $row2['Date'] . '</td>';
		echo '<td>' . $row2['status'] . '</td>';
		echo '<td>' . $row2['Location'] . '</td>';
		echo "</tr>"; 
	} 
	// close table>
	echo "</table>";
 include 'footerAdmin.php'; 
}

if (isset($_POST['editQuantity']))
{
	$id = $_POST['cID'];
	$quantity = $_POST['Quantity'];
	$result = mysql_query("SELECT cartID, productID, quantity, subtotal FROM cart WHERE cartID='".$id."';")
	or die (mysql_error());
	$row = mysql_fetch_assoc($result);
	$checkStock = mysql_query("SELECT productID, stock, price FROM product WHERE productID = '".$row['productID']."'")
	or die (mysql_error());
	$row2 = mysql_fetch_assoc($checkStock);
	
	if ($_POST['Quantity'] != $row['quantity'])
	{
		if ($_POST['Quantity'] > ($row['quantity'] + $row2['stock']))
		{
			$error = 'Not enough stock.';
			renderForm($quantity,$error);
		}
		else if ($_POST['Quantity'] <= ($row['quantity'] + $row2['stock'])){
			$remainder = ($row['quantity'] + $row2['stock'])-$_POST['Quantity'];
			$newSubtotal = $_POST['Quantity'] * $row2['price'];
			mysql_query("UPDATE product SET stock=".$remainder." WHERE productID=".$row2['productID'])
			or die(mysql_error());
			mysql_query("UPDATE cart SET subtotal=".$newSubtotal.",quantity=".$_POST['Quantity']." WHERE cartID=".$id)
			or die(mysql_error());
			header ('Refresh: 0; URL=cart1.php');
		}
	}
	else if ($_POST['Quantity'] == $row['quantity'])
	{
		header ('Refresh: 0; URL=cart1.php');
	}
}
else
{
	renderForm($quantity, $error);
}

?>