<?php include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
	
	$error='';
	$quantity=1;

function renderForm($quantity,$error)
{
	include 'headerAdmin.php';

	$id = $_GET['id'];
   $query = "SELECT productName,category,width,height,length,price,desctxt FROM product WHERE productID = '$id'";
   if ( !($result = mysql_query($query)) ) {
      die('<p>Error reading database</p></body></html>');
   } else {
        $row = mysql_fetch_assoc($result);
		echo '<title>'.$row['productName'].' | Cramiture.com</title>';
		echo '<h2>'.$row['productName'].'</h2>';
		echo '<div class="one-half"><img src="getImage.php?id=' . $id . '" alt="' . $row['productName'] . '" title="' . $row['productName']  .'"/></div>';
		echo '<div class="one-half last">Product Description : <br><h5>'.$row['desctxt'].'</h5><br><br>';
		echo 'Width: '.$row['width'].'"<br> Height: '.$row['height'].'" <br> Length: '.$row['length'];
		echo '<br><br><h3>Price : RM'.$row['price'].'</h3>';
   }
   if ($error != '')
   {
	   echo '<div style="padding:4px; border:1px solid red;"><span style="color:red;">'.$error.'</span>';
   }
   echo '<form action="" method="post"><strong>Quantity : <input type="number" name="quantity" min="1" max="500" value="'.$quantity.'"></strong>';
   echo '<input style="display:none;" type="text" name="pID" value='.$id.'>';
   echo '<input type="submit" name="addthis" value ="Add to Cart"></form></div></div>';

	include 'footerAdmin.php';
}

if(isset($_POST['addthis']))
{
	$id = $_POST['pID'];
	$quantity = mysql_real_escape_string($_POST['quantity']);
	$checkStock = mysql_query("SELECT * FROM product WHERE productID = '".$id."';");
	$cs = mysql_fetch_array($checkStock);
	
	
	$user = mysql_query("SELECT userID,username FROM users WHERE userName='$name'")
		or die (mysql_error());
	$row2 = mysql_fetch_array($user);
	$checkCart = mysql_query("SELECT * FROM cart WHERE userID= '".$row2['userID']."' AND productID = '".$id."';");
	
    if(mysql_num_rows($checkCart) == 1 && $cs['stock'] >= $quantity)
    {
		$row = mysql_fetch_array($checkCart);
		$total = $quantity + $row['quantity'];
		$subtotal = $total * $cs['price'];
		mysql_query("UPDATE cart SET quantity = '".$total."', subtotal = '".$subtotal."' WHERE userID = '".$row2['userID']."' AND productID = '".$id."';");
		
		$newStock = $cs['stock'] - $quantity;
		mysql_query("UPDATE product SET stock = '".$newStock."' WHERE productID = '".$id."';")
		or die(mysql_error());

		header("Refresh : 0");
	}
	else  if ($cs['stock'] >= $quantity)
	{
		$add = mysql_query("SELECT productID,price FROM product WHERE productID='$id'")
		or die (mysql_error());
		
		$row = mysql_fetch_array($add);
		
		
		mysql_query("INSERT cart SET userID =".$row2['userID'].",productID = $row[productID], quantity = '$quantity', subtotal = ($row[price]*$quantity), status = 'in cart'")
		or die(mysql_error());
		
		$newStock = $cs['stock'] - $quantity;
		mysql_query("UPDATE product SET stock = '".$newStock."' WHERE productID = '".$id."';")
		or die(mysql_error());

		header("Refresh : 0");
	}
	else 
	{
		$error='Sorry, not enough stock.';
		renderForm($quantity,$error);
	}
}
else 
{
	renderForm($quantity,$error);
}
?>