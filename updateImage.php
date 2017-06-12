<?php 
 	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
	
	$productID = $_GET['productID'];
	
	$error = '';

	function renderForm($error)
{
	include 'adminheader.php';
?>
	<title>Add New Furniture | Cramiture.com</title>
	<h1>Add New Furniture to Database</h1><p>
<?php 
	if ($error != '')
	{
		echo '<div style="padding:4px; border:1px solid red;"><span style="color:red;">'.$error.'</span><div>';
	}
?>
	 	<table border='0' cellpadding='10'>
		<form action="" method="post" enctype="multipart/form-data">
		<fieldset>
		<tr><th style='text-align:right;'>Product Image : </th>
		<td><input type="file" size="40" name="userFile" id="userFile"></td></tr>
		<tr><td></td>
		<td><input type="submit" name="submit" id="submit" value="Upload Image"></form>&nbsp;&nbsp;&nbsp;&nbsp;<a href="viewProductList.php"><button>Cancel</button></a></td></tr>
		</fieldset>
		</table></div></div>
	<?php
	
		include 'adminfooter.php';
}	
 if (isset($_POST['submit']))
 {	
	if ( !isset($_FILES['userFile']['type'])) {
		$error = 'No image submitted.';
		renderForm($error);
	}
	// Validate uploaded image file
	else if ( !preg_match( '/png|jpg|jpeg/', $_FILES['userFile']['type']) ) {
		$error = 'Only browser compatible images allowed.';
		renderForm($error);
	} 
	else if ( $_FILES['userFile']['size'] > 859200 ) {
		$error = 'Sorry file too large.'; 
		renderForm($error);
	// Copy image file into a variable
	}
	else if ( !($handle = fopen ($_FILES['userFile']['tmp_name'], "r")) ) {
		$error = 'Error opening temp file.'; 
		renderForm($error);				
	}
	else if ( !($img = fread ($handle, filesize($_FILES['userFile']['tmp_name']))) ) {
		$error = 'Error reading temp file.'; 
		renderForm($error);
	} 
	else {
		fclose ($handle);
	   // Commit image to the database
			  
		$img = mysql_real_escape_string($img);
		$query = 'UPDATE product SET image="'.$img.'", imgtype= "'.$_FILES['userFile']['type'].'" WHERE productID= "'.$productID.'"'
		or die(mysql_error());
		if ( !(mysql_query($query)) ) {
			$error ='Error writing image to database.'; 
			renderForm($error);
		}
		else {
			echo "<script type='text/javascript'>alert('Image successfully copied to database')</script>";
			header ('Refresh :0; URL=viewProductList.php');
		}
	}
 }
 else
 {
	 renderForm($error);
 }
	?>