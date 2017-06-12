<?php
	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="user"){
      header('Location: index.php?err=2');
    }
	
	$error='';
function renderForm($error)
{
	$name = $_SESSION['Username'];
	include 'headerUser.php';

	echo '<title>Edit Password | Cramiture.com</title>';	
	echo '<h1 class="title">Edit Password</h1>';
	if ($name != null)
		$result = mysql_query("SELECT * FROM users WHERE username = '$name'")
		or die(mysql_error());
	// display data in table
	$row = mysql_fetch_array( $result );
	
	if ($error !='')
	{
		echo '<div style="padding:4px; border:1px solid red;"><span style="color:red;">'.$error.'</span><div>';
	}
	
	echo '<table border="0" cellpadding="10">';
	echo '<form action="" method="post">';
	echo '<tr> <th>User ID</th> <td style="text-align:center;">' . $row['userID'] . '</td></tr>';
	echo '<tr><th>Username</th><td style="text-align:center;">' . $row['username'] . '</td></tr>';
	echo '<tr><th>Old Password</th><td style="text-align:center;"><input type="password" name="oldpassword" required></td></tr> ';
	echo '<tr><th>Password</th><td style="text-align:center;"><input type="password" name="password" required></td></tr> ';
	echo '<tr><th>Re-Type Password</th><td style="text-align:center;"><input type="password" name="retypepassword" required></td></tr> ';
	echo '<tr><td style="text-align:center;"><input type="submit" name="cpassword" value = "Save Changes"></td>';
	echo '</form><td style="text-align:center;"><a href="viewInfo.php"><button>Cancel</button></a></td></tr>';
	// close table
	echo "</table></div></div>";

	include 'footer.php'; 
}	
if(isset($_POST['cpassword']))
{
		$result = mysql_query("SELECT * FROM users WHERE username = '$name'")
			or die(mysql_error());
		// display data in table
		$row = mysql_fetch_array( $result );

		$oldpassword =  mysql_real_escape_string(md5($_POST['oldpassword']));
		$password = mysql_real_escape_string(md5($_POST['password']));
		$retypepassword = mysql_real_escape_string(md5($_POST['retypepassword']));
		if ($row['password'] != $oldpassword)
		{
			$error = 'The old password entered do not match. Please try again.';
			renderForm($error);			
		}	
		else if($password != $retypepassword)
		 {
			$error = 'The password entered do not match. Please try again.';
			renderForm($error);
		 }
		 else if(strlen($_POST['password']) <6 || strlen($_POST['password']) > 8 )
		 {
			$error = 'Invalid password length. Please enter a 6 - 8 charactered password!';
			renderForm($error);
		 }
		  else if(!preg_match("#[0-9]+#", $_POST['password']))
		 {
			$error = 'The password must contain at least one number. Please try again.';
			renderForm($error);
		 }
		 else if(!preg_match("#[a-zA-Z]+#",$_POST['password']))
		 {
			$error='The password must contain at least one letter. Please try again.';
			renderForm($error);
		 }
		 else
		 {
			$registerquery = mysql_query("UPDATE users SET password= '".$password."' WHERE userID = '".$row['userID']."';");
			if($registerquery)
			{
				header ('Refresh: 0; URL=viewInfo.php');
			}
			else
			{
				$error = 'Password change failed. Please try again.';  
				renderForm($error);
			}    	
		}
}
else
{
	renderForm($error);
}    
	?>