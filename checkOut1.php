<?php include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }

$firstname =''; $lastname = '';
$addressLine1 = ''; $addressLine2 = '';
$postcode = ''; $city = '';
$state = ''; $phoneNo = '';
$emailAddress = ''; $error ='';

function renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $emailAddress, $error)
{   
	$name = $_SESSION['Username'];
	include 'headerAdmin.php' ;

	echo '<title>Confirm Check Out | Cramiture.com</title>';
	echo '<h1>Confirm Check Out </h3>';
	
	//get user ID
	$getAcc = mysql_query("SELECT userID, username, emailAddress FROM users WHERE username = '".$name."';") 
		or die(mysql_error());
	$userAcc = mysql_fetch_array($getAcc);
	
	//get cart details
	$fromCart = mysql_query("SELECT * FROM cart WHERE userID= '".$userAcc['userID']."' AND status = 'in cart';")
		or die(mysql_error());
		
	echo '<p style="color: blue">* Please make sure your order and shipping details are correct before proceeding to make payment.</p>';
	// display data in table;
	echo "<table border='1' cellpadding='10' style='text-align:center;'>";
	echo '<h3>Order</h3>';
	echo "<tr> <th>Product ID</th> <th>Product Name</th> <th>Price(RM)</th> <th>Quantity</th> <th>Total Price (RM)</th> ";
	$total = 0;
	$totalq = 0;
	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $fromCart )) {
		$row2 = mysql_fetch_array(mysql_query("SELECT * FROM product WHERE productID = ".$row['productID']));
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['productID'] . '</td>';
		echo '<td>' . $row2['productName'] . '</td>';
		echo '<td>' . $row2['price'] . '</td>';
		echo '<td>' . $row['quantity'] . '</td>';
		echo '<td>' . $row['subtotal'].'</td>';
		echo "</tr>"; 
		$total = $total + $row['subtotal'];
		$totalq = $totalq + $row['quantity'];
	} 
	$displayTotal = number_format($total, 2, '.', '');
	echo "<tr>";
	echo '<td colspan="3" style="text-align:right;">Total (RM) :</td>';
	echo '<td>'.$totalq.'</td>';
	echo '<td>' . $displayTotal . '</td>';
	echo '</tr></table>';
	
	//check whether user information(first name, last name, etc.) is filled
	$getInfo = mysql_query("SELECT * FROM usersinfo WHERE userID = '".$userAcc['userID']."';") 
		or die(mysql_error());
	
	if ($error != '')
	{
		echo '<div style="padding:4px; border:1px solid red;"><span style="color:red;">'.$error.'</span>';
	}
	else
	{
		if (mysql_num_rows($getInfo) == 1)
		{
			$userInfo = mysql_fetch_array($getInfo);
			
			$firstname = $userInfo['firstname'];
			$lastname = $userInfo['lastname'];
			$addressLine1 = $userInfo['addressLine1'];
			$addressLine2 = $userInfo['addressLine2'];
			$postcode = $userInfo['postcode'];
			$city = $userInfo['city'];
			$state = $userInfo['state'];
			$phoneNo = $userInfo['phoneNo'];
			$emailAddress = $userAcc['emailAddress'];
		}
	}
		
		echo '<p><h3>Shipping Details</h3></p>';
		echo '<table border="0" cellpadding="10" style="text-align:center;">';
		echo '<form action"" method="post">';
		echo '<tr><th style="text-align:right;">First Name</th><td><input type="text" name="firstname" value="'.$firstname.'" required></td></tr> ';
		echo '<tr><th style="text-align:right;">Last Name</th><td><input type="text" name="lastname" value="'.$lastname.'" required></td></tr> ';
		echo '<tr><th style="text-align:right;">Address Line 1</th><td><input type="text" name="addressLine1" value="'.$addressLine1.'" required></td></tr> ';
		echo '<tr><th style="text-align:right;">Address Line 2</th><td><input type="text" name="addressLine2" value="'.$addressLine2.'"></td></tr> ';
		echo '<tr><th style="text-align:right;">Postcode</th><td><input type="text" name="postcode" value="'.$postcode.'" required></td></tr> ';
		echo '<tr><th style="text-align:right;">City</th><td><input type="text" name="city" value="'.$city.'" required></td></tr> ';
		echo '<tr><th style="text-align:right;">State</th><td><input type="text" name="state" value="'.$state.'" required></td></tr> ';
		echo '<tr><th style="text-align:right;">Phone No</th><td><input type="text" name="phoneNo" value="'.$phoneNo.'" required></td></tr> ';
		echo '<tr><th style="text-align:right;">Email Address</th><td><input type="text" name="emailAddress" value="'.$emailAddress.'" required></td></tr> ';
		echo '<tr><td></td><td style="display:none"><input type="text" name="displayTotal" value=' . $displayTotal . '></td></tr>';
		echo '<tr><td></td><td style="text-align:center;"><input type="submit" name="confirm" id="confirm" value="Confirm"></form></td></tr>';
		echo '<tr><td></td><td><a href="cart1.php"><button>Cancel</button></a></td></tr>';
		// close table
		echo "</table></div>";
	
	include 'footerAdmin.php' ;
}
if (isset($_POST['confirm']))
{	
	//get user ID
	$getAcc = mysql_query("SELECT userID, username, emailAddress FROM users WHERE username = '".$name."';") 
		or die(mysql_error());
	$userAcc = mysql_fetch_array($getAcc);
	//check whether user information(first name, last name, etc.) is filled
	$getInfo = mysql_query("SELECT * FROM usersinfo WHERE userID = '".$userAcc['userID']."';") 
		or die(mysql_error());
		
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$addressLine1 = $_POST['addressLine1'];
	$addressLine2 = $_POST['addressLine2'];
	$postcode = $_POST['postcode'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$phoneNo = $_POST['phoneNo'];
	$emailAddress = $_POST['emailAddress'];
	$displayTotal = $_POST['displayTotal'];
		
	if(strlen($_POST['postcode']) !=5)
	{
		$error = "Invalid postcode!\nPlease enter a valid postcode (5 digits).";
		renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $emailAddress, $error);
	}
	else if (strlen($_POST['phoneNo']) < 10 || strlen($_POST['phoneNo']) > 11)
	{
		$error = "Invalid phone number.\nPlease enter a valid phone number.";
		renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $emailAddress, $error);
	}
	else if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL))
	{
		$error = "Invalid email address.\nPlease enter a valid email address.";
		renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $emailAddress, $error);
	}
	else
	{
		if (mysql_num_rows($getInfo) == 1)
		{
			$Info = mysql_query("UPDATE usersinfo SET firstname ='".$firstname."', lastname='".$lastname."', addressLine1='".$addressLine1."', addressLine2='".$addressLine2."', postcode= ".$postcode.", city='".$city."', state='".$state."',phoneNo=".$phoneNo." WHERE userID = '".$userAcc['userID']."';")
			or die (mysql_error());
		}
		else 
		{
			$Info = mysql_query("INSERT INTO usersinfo (userID, firstname, lastname, addressLine1, addressLine2, postcode, city, state,phoneNo) VALUES ('".$userAcc['userID']."','".$firstname."','".$lastname."', '".$addressLine1."', '".$addressLine2."', ".$postcode.", '".$city."', '".$state."', ".$phoneNo.")")
			or die (mysql_error());
		}
		
		$checkout = mysql_query("INSERT INTO checkOut (userID, total, status) VALUES (".$userAcc['userID'].", ".$displayTotal.", 'Not Confirmed')")
		or die(mysql_error());
		
		$updateLogin = mysql_query("UPDATE users SET emailAddress='".$emailAddress."' WHERE userID=".$userAcc['userID'])
		or die(mysql_error());
		
		if (($Info) && ($updateLogin) && ($checkout))
		{
			header ('Refresh:0; URL=payment1.php');
		}
		else
		{
			$error = "Error occurred while confirming details. Please try again.";
			renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $emailAddress, $error);
		}
	}
}
else
{
	renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $emailAddress, $error);
}

?>
