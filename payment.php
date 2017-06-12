<?php 
	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="user"){
      header('Location: index.php?err=2');
    }
	
	$FullName= ''; $CardNo='';
	$CVV=''; $Type='';
	$month=''; $year='';
	$error='';

function renderForm($FullName, $CardNo, $CVV, $Type, $month, $year, $error)
{
	$name = $_SESSION['Username'];
	$getAcc = mysql_query("SELECT userID, username, emailAddress FROM users WHERE username = '".$name."';") 
		or die(mysql_error());
	$userAcc = mysql_fetch_array($getAcc);
	
	$fromCheckOut = mysql_query("SELECT * FROM checkOut WHERE userID= '".$userAcc['userID']."' AND status = 'Not Confirmed';")
		or die(mysql_error());
	$checkOutDetails = mysql_fetch_array($fromCheckOut);
	
	include 'headerUser.php';
	
	if ($error != '')
	{
		echo '<div style="padding:4px; border:1px solid red;"><span style="color:red;">'.$error.'</span>';
	}
?>	
	<title>Payment | Cramiture.com</title>
	<h1>Make Payment</h1>
	<table border="0" cellpadding="10" style="text-align:center;"><form action="" method="post">
	<tr><th style="text-align:right;">Total</th><td><?php echo $checkOutDetails['total'] ?></td></tr>
	<tr><th style="text-align:right;">Full Name</th><td><input type="text" name="FullName" value="<?php echo $FullName ?>" required></td></tr>
	<tr><th style="text-align:right;">Card Number</th><td><input type="text" name="CardNo" value="<?php echo $CardNo ?>" required></td></tr>
	<tr><th style="text-align:right;">CVV</th><td><input type="text" name="CVV" value="<?php echo $CVV ?>" required></td></tr>
	<tr><th style="text-align:right;">Card Type</th>
	
	<td><select name="Type"><option value="Master" <?php if($Type == "Master"){ echo 'selected="selected"';} ?> >Master</option>
	<option value="Visa" <?php if($Type == "Visa"){ echo 'selected="selected"'; } ?> >Visa</option></select></td></tr>

	<tr><th style="text-align:right;">Expiry Date</th><td>(mm)<input type="number" name="month" min="1" max="12" value="<?php echo $month ?>" required>
	&nbsp;(yy)<input type="number" min="15" max="20" name="year" value="<?php echo $year ?>" required></td></tr>
	<td><input type="submit" name="confirm" id="confirm" value="Confirm"></form></td>
	<td><a href="cart.php"><button>Cancel</button></a></td>
	</tr>
	</table></div>
<?php
include 'footer.php';	
}
if (isset($_POST['confirm']))	
{
	$FullName= mysql_real_escape_string($_POST['FullName']);
	$CardNo=mysql_real_escape_string($_POST['CardNo']);
	$CVV=mysql_real_escape_string($_POST['CVV']);
	$Type=mysql_real_escape_string($_POST['Type']);
	$month=mysql_real_escape_string($_POST['month']);
	$year=mysql_real_escape_string($_POST['year']);
	
	$getAcc = mysql_query("SELECT userID, username, emailAddress FROM users WHERE username = '".$name."';") 
		or die(mysql_error());
	$userAcc = mysql_fetch_array($getAcc);
	$fromCheckOut = mysql_query("SELECT * FROM checkOut WHERE userID= '".$userAcc['userID']."' AND status = 'Not Confirmed';")
		or die(mysql_error());
	$checkOutDetails = mysql_fetch_array($fromCheckOut);
	
	//check card validity
	$checkCard = mysql_query("SELECT * FROM checkCard WHERE Name ='".$FullName."' AND Type='".$Type."';")
	or die (mysql_error());
	
	if (mysql_num_rows($checkCard)==1)
	{
		$cardInfo = mysql_fetch_array($checkCard);
		
		if ($cardInfo['CreditCardNo'] != $CardNo)
		{
			$error = "Invalid card number.\nPlease enter a valid card number.";
			renderForm($FullName,$CardNo,$CVV,$Type,$month,$year, $error);
		}
		else if ($cardInfo['CVV'] != $CVV)
		{
			$error = "Invalid Card Verification Value (CVV).\nPlease enter a valid CVV.";
			renderForm($FullName,$CardNo,$CVV,$Type,$month,$year, $error);
		}
		else if ($cardInfo['expireYear'] != $year)
		{
			if($cardInfo['expireMonth'] != $month)
			{
				$error = "Card expired.\nPlease use another card.";
				renderForm($FullName,$CardNo,$CVV,$Type,$month,$year, $error);
			}
			else 
			{
				$error = "Card expired.\nPlease use another card.";
				renderForm($FullName,$CardNo,$CVV,$Type,$month,$year, $error);
			}
		}
		else// if($checkCard['CreditCardNo'] == $CardNo && $checkCard['CVV'] == $CVV && $checkCard['Type'] == $Type && $checkCard['month'] == $month && $checkCard['year'] == $year )
		{
			//$timestamp = date('Y-m-d');
			$updateCart = mysql_query("UPDATE cart SET status ='checked out' WHERE userID='".$userAcc['userID']."'")
			or die (mysql_error());
			$confirmCheckOut = mysql_query("UPDATE checkOut SET paymentMethod='".$Type."', status='Shipping', Location='Headquarters' WHERE orderID=".$checkOutDetails['orderID'])
			or die (mysql_error());
			if ($confirmCheckOut && $updateCart)
			{
				header ('Refresh :0 ; URL= trackOrder.php');
			}
			else
			{
				$error = "Error while processing payment. No payment is made.\nPlease try again.";
				renderForm($FullName,$CardNo,$CVV,$Type,$month,$year, $error);
			}
		}
	}
	else
	{
		$error = "Invalid card. No payment is made.\nPlease try again.";
		renderForm($FullName,$CardNo,$CVV,$Type,$month,$year, $error);
	}
}
else
{
	renderForm($FullName,$CardNo,$CVV,$Type,$month,$year, $error);
}
