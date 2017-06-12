<?php 
 	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }	
	include 'adminheader.php';
?>
<title>Admin Panel</title>
<div class="categories">
	<h1 class="title">Manage Members</h1>
	<?php
	$result = mysql_query("SELECT * FROM users WHERE username <> '".$name."' ORDER BY role")
		or die(mysql_error());
	// display data in table
	
	echo "<table border='1' cellpadding='12' style='text-align:center;'>";
	echo "<tr> <th>User ID</th> <th>Username</th> <th>Role</th><th>Email Address</th><th>Account Status</th><th></th> <th> </th> </tr>";
	$total = 0;
	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['userID'] . '</td>';
		echo '<td>' . $row['username'] . '</td>';
		echo '<td>' . $row['role'] . '</td>';
		echo '<td>' . $row['emailAddress'] . '</td>';
		echo '<td>' . $row['status'] . '</td>';
		echo '<td><a href="deleteMember.php?UserID='. $row['userID'].'"><button>Block Account</button></a></td>';
		if ($row['role'] == 'user')
		{
			echo '<td><a href="makeAdmin.php?UserID='.$row['userID'].'"><button>Make Admin</button></a></td>';
		}
		else
		{
			echo '<td><a href="removeAdmin.php?UserID='.$row['userID'].'"><button>Make Member</button></a></td>';
		}
		echo "</tr>"; 
	} 
	// close table>
	echo "</table>";
?>
</div>
<?php	
	include 'adminfooter.php';
?>
	