<?php
	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="user"){
      header('Location: index.php?err=2');
    }
include 'headerUser.php';
	?>	
<title>Personal Information | Cramiture.com</title>	
<?php 
	if ($name != null)
    echo '<h1 class="title">Account Information</h1>';

	$result = mysql_query("SELECT * FROM users WHERE username = '".$name."'")
		or die(mysql_error());
	// display data in table
	$row = mysql_fetch_array( $result );
	echo '<table border="0" cellpadding="10" style="text-align:center;">';
	echo '<tr> <th style="text-align:right;">User ID</th> <td>' . $row['userID'] . '</td><td></td></tr>';
	echo '<tr> <th style="text-align:right;">Username</th><td>' . $row['username'] . '</td><td><a href="editUsername.php">Edit</a></td></tr>';
	echo '<tr><th style="text-align:right;">Password</th><td>******</td><td><a href="editPassword.php">Edit</a></td></tr> ';
	echo '<tr><th style="text-align:right;">Email Address</th><td>' . $row['emailAddress'] . '</td><td><a href="editEmail.php">Edit</a></td></tr>';
	// close table
	echo "</table>";
	echo '<h1 class="title">Personal Information</h1>';	
	$result1 = mysql_query("SELECT * FROM usersinfo WHERE userID = '".$row['userID']."'")
		or die(mysql_error());
	// display data in table
	$row1 = mysql_fetch_array( $result1 );
	echo '<table border="0" cellpadding="10" style="text-align:center;">';
	echo '<tr> <th style="text-align:right;">Fisrt Name</th> <td>' . $row1['firstname'] . '</td></tr>';
	echo '<tr> <th style="text-align:right;">Last Name</th><td>' . $row1['lastname'] . '</td></tr>';
	echo '<tr><th style="text-align:right;">Address Line 1</th><td>' . $row1['addressLine1'] . '</td>';
	echo '<tr><th style="text-align:right;">Address Line 2</th><td>' . $row1['addressLine2'] . '</td></tr>';
	echo '<tr><th style="text-align:right;">Postcode</th><td>' . $row1['postcode'] . '</td></tr>';
	echo '<tr><th style="text-align:right;">City</th><td>' . $row1['city'] . '</td></tr>';
	echo '<tr><th style="text-align:right;">State</th><td>' . $row1['state'] . '</td></tr>';
	echo '<tr><th style="text-align:right;">Phone No</th><td>' . $row1['phoneNo'] . '</td></tr>';
	echo '<tr><td></td><td><a href="editInfo.php">Edit</a></td></tr>';
	echo '<tr><td></td><td><a href="deleteAccount.php?userID='.$row1['userID'].'">Terminate Account</a></td></tr>';
	// close table
	echo "</table>";
	
	include 'footer.php'; 
	?>