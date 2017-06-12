<?php
	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="user"){
      header('Location: index.php?err=2');
    }
	
	$error='';
	$email='';
function renderForm($email,$error)
{
	$name = $_SESSION['Username'];
	include 'headerUser.php';

	echo '<title>Edit Email Address | Cramiture.com</title>';	
	echo '<h1 class="title">Edit Email Address</h1>';
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
	echo '<tr><th>Email Address</th><td style="text-align:center;"><input type="text" name="email" value = "'.$email.'" required></td></tr> ';
	echo '<tr><td style="text-align:center;"><input type="submit" name="cemail" value = "Save Changes"></td>';
	echo '</form><td style="text-align:center;"><a href="viewInfo.php"><button>Cancel</button></a></td></tr>';
	// close table
	echo "</table></div></div>";

	include 'footer.php'; 
}	
if(isset($_POST['cemail']))
{
		$result = mysql_query("SELECT * FROM users WHERE username = '$name'")
			or die(mysql_error());
		// display data in table
		$row = mysql_fetch_array( $result );

		$email =  mysql_real_escape_string($_POST['email']);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		 {
			$error='Invalid email address.<br>Please enter a valid email address.';
			renderForm($email,$error);
		 }
		 else
		 {
			$registerquery = mysql_query("UPDATE users SET emailAddress= '".$email."' WHERE userID = '".$row['userID']."';");
			if($registerquery)
			{
				header ('Refresh: 0; URL=viewInfo.php');
			}
			else
			{
				$error = 'Email address update failed. Please try again.';  
				renderForm($email,$error);
			}    	
		}
}

else
{
	renderForm($email,$error);
}    
	?>