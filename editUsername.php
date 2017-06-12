<?php
	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="user"){
      header('Location: index.php?err=2');
    }
	
	$error='';
	$username='';
function renderForm($username,$error)
{
	$name = $_SESSION['Username'];
	include 'headerUser.php';

	echo '<title>Edit Username | Cramiture.com</title>';	
	echo '<h1 class="title">Edit Username</h1>';
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
	echo '<tr><th>Username</th><td style="text-align:center;"><input type="text" name="username" value = "'.$username.'" required></td></tr> ';
	echo '<tr><td style="text-align:center;"><input type="submit" name="cusername" value = "Save Changes"></td>';
	echo '</form><td style="text-align:center;"><a href="viewInfo.php"><button>Cancel</button></a></td></tr>';
	// close table
	echo "</table></div></div>";

	include 'footer.php'; 
}	
if(isset($_POST['username']))
{
		$result = mysql_query("SELECT * FROM users WHERE username = '$name'")
			or die(mysql_error());
		// display data in table
		$row = mysql_fetch_array( $result );

		$username =  mysql_real_escape_string($_POST['username']);

		if($row['username'] != $username)
		{
			$checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");
			if (mysql_num_rows($checkusername) != 1 )
			{
				$registerquery = mysql_query("UPDATE users SET username = '".$username."' WHERE userID = '".$row['userID'] ."'");
				if($registerquery)
				{
					$_SESSION['Username'] = $username;
					header ('Refresh: 0; URL=viewInfo.php');
				} 
				else
				{
					$error = 'Username update failed. Please try again.';  
					renderForm($username,$error);
				}    	 	
			}
			else if (mysql_num_rows($checkusername) == 1 )
			{
				$error = 'Username taken.<br> Please choose another username.';  
				renderForm($username,$error);
			}
		}
		else if($row['username'] == $username)
		{
			header ('Refresh: 0; URL=viewInfo.php');
		}
}

else
{
	renderForm($username,$error);
}    
	?>