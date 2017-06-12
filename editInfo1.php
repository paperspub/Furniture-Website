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
$error ='';

function renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $error)
{   
	$name = $_SESSION['Username'];
	include 'headerAdmin.php' ;

	echo '<title>Edit Personal Information | Cramiture.com</title>';
	echo '<h1>Edit Personal Information </h3>';
	
	//get user ID
	$getAcc = mysql_query("SELECT userID, username, emailAddress FROM users WHERE username = '".$name."';") 
		or die(mysql_error());
	$userAcc = mysql_fetch_array($getAcc);
	
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
		}
	}

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
		echo '<tr><td></td><td style="text-align:center;"><input type="submit" name="confirm" id="confirm" value="Confirm"></form></td></tr>';
		echo '<tr><td></td><td><a href="viewInfo1.php"><button>Cancel</button></a></td></tr>';
		// close table
		echo "</table></div>";
	
	include 'footerAdmin.php' ;
}
if (isset($_POST['confirm']))
{	
	//get user ID
	$getAcc = mysql_query("SELECT userID, username FROM users WHERE username = '".$name."';") 
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

	if(strlen($_POST['postcode']) !=5)
	{
		$error = "Invalid postcode!\nPlease enter a valid postcode (5 digits).";
		renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $error);
	}
	else if (strlen($_POST['phoneNo']) < 10 || strlen($_POST['phoneNo']) > 11)
	{
		$error = "Invalid phone number.\nPlease enter a valid phone number.";
		renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $error);
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
		
		if ($Info)
		{
			header ('Refresh:0; URL=viewInfo1.php');
		}
		else
		{
			$error = "Error occurred while confirming details. Please try again.";
			renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $error);
		}
	}
}
else
{
	renderForm($firstname, $lastname, $addressLine1, $addressLine2, $postcode, $city, $state, $phoneNo, $error);
}

?>
