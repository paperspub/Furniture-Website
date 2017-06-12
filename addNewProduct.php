<?php 
 	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
	$descText = '';
	$width = '1';
	$height = '1';
	$length = '1';
	$price = '';
	$stock = '';
	$productname = '';
	$category = '';
	$error = '';

	function renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error)
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
		<tr><th style='text-align:right;'>Name</th>
		<td><input type="text" size="20" name="productname" id="productname" value="<?php echo $productname; ?>" /></td></tr>
		<tr><th style='text-align:right;'>Description</th>
		<td><input type="text" size="60" name="descText" id="descText" value="<?php echo $descText; ?>" /></td></tr>
		<tr><th style='text-align:right;'>Category</th>
		<td><select name="category">
			<option value="Bed" <?php if($category == 'Bed'){ echo ' selected="selected"'; } ?>>Bed</option>
			<option value="Sofa" <?php if($category == 'Sofa'){ echo ' selected="selected"'; } ?>>Sofa</option>
			<option value="Table" <?php if($category == 'Table'){ echo ' selected="selected"'; } ?>>Table</option>
			<option value="Bookcase" <?php if($category == 'Bookcase'){ echo ' selected="selected"'; } ?>>Bookcase</option>
			<option value="TV Stand" <?php if($category == 'TV Stand'){ echo ' selected="selected"'; } ?>>TV Stand</option>
		  </select></td></tr>
		<tr><th style='text-align:right;'>Width</th>
		<td><input type="number" name="width" min="1" max="300" value='<?php echo $width; ?>'> inches</td></tr>
		<tr><th style='text-align:right;'>Height</th>
		<td><input type="number" name="height" min="1" max="300" value='<?php echo $height; ?>'> inches</td></tr>
		<tr><th style='text-align:right;'>Length</th>
		<td><input type="number" name="length" min="1" max="300" value='<?php echo $length; ?>'> inches</td></tr>
		<tr><th style='text-align:right;'>Price</th>
		<td><input type="text" size="10" name="price" id="price" value="<?php echo $price ?>"/></td></tr>
		<tr><th style='text-align:right;'>Stock</th>
		<td><input type="text" size="10" name="stock" id="stock" value="<?php echo $stock; ?>" ></td></tr>
		<tr><th style='text-align:right;'>Product Image : </th>
		<td><input type="file" size="40" name="userFile" id="userFile"></td></tr>
		<tr><td></td>
		<td><input type="submit" name="submit" id="submit" value="Upload Product"></form>&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php"><button>Cancel</button></a></td></tr>
		</fieldset>
		</table></div></div>
	<?php
	
		include 'adminfooter.php';
}	
 if (isset($_POST['submit']))
 {	
		$descText = htmlentities($_POST['descText']);
		$width = mysql_real_escape_string($_POST['width']);
		$height = mysql_real_escape_string($_POST['height']);
		$length = mysql_real_escape_string($_POST['length']);
		$price = mysql_real_escape_string($_POST['price']);
		$stock = mysql_real_escape_string($_POST['stock']);
		$productname = mysql_real_escape_string($_POST['productname']);
		$category = mysql_real_escape_string($_POST['category']);
		if(!empty($_POST['productname']) && !empty($_POST['descText']) && !empty($_POST['category']) && !empty($_POST['width']) && !empty($_POST['height']) && !empty($_POST['length']) && !empty($_POST['price']) && !empty($_POST['stock']))
		{
			if ( !isset($_FILES['userFile']['type'])) {
				$error = 'No image submitted.';
				renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error);
			}
			// Validate uploaded image file
			else if ( !preg_match( '/png|jpg|jpeg/', $_FILES['userFile']['type']) ) {
				$error = 'Only browser compatible images allowed.';
				renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error);
			} else if ( strlen($_POST['descText']) < 9 ) {
				$error = 'Please provide meaningful alternate text.'; 
				renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error);
			} else if ( $_FILES['userFile']['size'] > 859200 ) {
				$error = 'Sorry file too large.'; 
				renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error);
			// Copy image file into a variable
			} else if ( !($handle = fopen ($_FILES['userFile']['tmp_name'], "r")) ) {
				$error = 'Error opening temp file.'; 
				renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error);				
			} else if ( !($img = fread ($handle, filesize($_FILES['userFile']['tmp_name']))) ) {
				$error = 'Error reading temp file.'; 
				renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error);
			} else {
			   fclose ($handle);
			   // Commit image to the database
			  
			  $img = mysql_real_escape_string($img);
			   $query = 'INSERT INTO product (productName, category, width, height, length, price, image, imgtype, desctxt,stock) VALUES ("'.$productname.'", "'.$category.'", "'.$width.'","'.$height.'","'.$length.'", "'.$price.'", "'.$img.'", "'.$_FILES['userFile']['type'].'", "'.$descText .'", "'.$stock .'")';
			   if ( !(mysql_query($query)) ) {
				   $error ='Error writing image to database.'; 
					renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error);
			   } else {
				   echo "<script type='text/javascript'>alert('Image successfully copied to database')</script>";
				   header ('Refresh :0; URL=viewProductList.php');
			   }
			}
		}
		else if(empty($_POST['productname']) || empty($_POST['descText']) || empty($_POST['category']) || empty($_POST['width']) || empty($_POST['height']) || empty($_POST['length']) || empty($_POST['price']) || empty($_POST['stock']))
		{
			$error ='Please fill up all fields.'; 
			renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error);
		}
 }
 else
 {
	 renderForm($productname, $descText, $category,$width, $height, $length, $price, $stock, $error);
 }
	?>