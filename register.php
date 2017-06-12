<?php include "base.php"; 

$username = '';
$email = '';
$error = '';

function renderForm($username, $email, $error)
{
?>
<html lang="en">
<head>
<title>Cramiture</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="start.css" type="text/css">
<link rel="shortcut icon" type="image/icon" href="style/img/favicon.png">
<link rel="stylesheet" type="text/css" href="style/css/start.css" media="all">
<link href='http://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all">
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all">
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all">
<![endif]-->
</head>
<body>
	<div class="background">
	<div id="content">
		<img src="style/img/logo4.png">
		<p>cramiture is a leading furniture provider with choices ranging from 
		elegant coffee tables to luxurious king size beds. <br><span>Sign up today!!!<span></p><br>
		<div id="buttons">
			<a href="start.php"><button id="signup" class="btn">Sign In</button>
			<a href="index.php"><button id="guest" class="btn">Guest Trial</button></a>
		</div>
	</div>

 	<!--REGISTRATION BOX---->
	<div id="registration-form">
	<div class='fieldset'>
<?php 
	if ($error != '')
	{
		echo '<div style="padding:4px; border:1px solid red;"><span style="color:red;">'.$error.'</span><div>';
	}
?>
    <!--<legend>Sign In</legend>-->
		<form action="" method="post" data-validate="parsley">
			<div class='row'>
				<label for='username'>Username</label>
				<input type="text" placeholder="Username" name='username' id='username' value="<?php echo $username; ?>" required>
			</div>
			<div class='row'>
				<label for="password">Password<span style="font-size:11pt;">(6-8 characters)</span></label>
				<input type="password" placeholder="Password" name='password' required>
			</div>
			<div class='row'>
				<label for="password">Re-Type Password</label>
				<input type="password" placeholder="Re-Type Password" name='retypepassword' required>
			</div>
			<label for="email">Email Address</label>
			<input type="text" placeholder="Email" name='email' value="<?php echo $email; ?>" required>
		
		<input type="checkbox" name="TCPP" value="agree">By registering means that you agree to the <a href="terms.html">Terms and Conditions</a> and <a href="privacy.html">Privacy Policy</a> of Cramiture.com.<br>
			<input type="submit" name="register" id="register" value="Register" />
		</form>
	</div>
	</div>
	</div>
    </div>
	
</body>
</html>
<?php
}
if (isset($_POST['register']))
{
	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['retypepassword']) && !empty($_POST['email']))
	{
		if (isset($_POST['TCPP']))
		{
			$password = mysql_real_escape_string(md5($_POST['password']));
			$retypepassword = mysql_real_escape_string(md5($_POST['retypepassword']));
			$role = "user";
			
			 $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");
			 
			 if(mysql_num_rows($checkusername) == 1)
			 {
				$error = 'Sorry, that username is taken. Please go back and try again.';
				renderForm($username, $email, $error);
			 }
			 else if($password != $retypepassword)
			 {
				$error = 'The password entered do not match. Please try again.';
				renderForm($username, $email, $error);
			 }
			 else if(strlen($_POST['password']) <6 || strlen($_POST['password']) > 8 )
			 {
				$error = 'Invalid password length. Please enter a 6 - 8 charactered password!';
				renderForm($username, $email, $error);
			 }
			  else if(!preg_match("#[0-9]+#", $password))
			 {
				$error = 'The password must contain at least one number. Please try again.';
				renderForm($username, $email, $error);
			 }
			 else if(!preg_match("#[a-zA-Z]+#", $password))
			 {
				$error = 'The password must contain at least one letter. Please try again.';
				renderForm($username, $email, $error);
			 }
			 else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			 {
				$error = 'Invalid email address! Please enter a valid email address.';
				renderForm($username, $email, $error);
			 }
			 else
			 {
				$registerquery = mysql_query("INSERT INTO users (Username, Password, role, EmailAddress) VALUES('".$username."', '".$password."', '".$role."', '".$email."')");
				if($registerquery)
				{
					header ('Refresh: 0; URL=start.php');
				}
				else
				{
					$error = 'Registration failed. Please try again.';
					renderForm($username, $email, $error);
				}    	
			}
		}
		else if (!isset($_POST['TCPP'] ))
		{
			$error = 'You must agree to the Terms and Conditions, Privary Policy to continue.'; 
			renderForm($username, $email, $error);			
		}
	}
}
else
{
	renderForm($username, $email, $error);
}
?>