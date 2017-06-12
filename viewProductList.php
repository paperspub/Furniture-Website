<?php include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
	
	include 'adminheader.php';
?>
<?php
	echo "<title>Product List | Cramiture.com</title>";
	echo "<h1>Product List</h1>";
   $query = "SELECT productID,productName,category,price,desctxt,stock FROM product GROUP BY productName ORDER BY productName";
   if ( !($result = mysql_query($query)) ) {
      die('<p>Error reading database</p></body></html>');
   } else {
		echo "<br><table border='1' cellpadding='10' style='text-align:center;'>";
		echo '<tr><th>Product ID</th><th>Image</th><th>Product Name</th><th>Category</th><th>Price (RM)</th><th>Description</th><th>Stock</th><th></th><th></th></tr>';
		for ( $i = 0 ; $i < mysql_num_rows($result) ; $i++ ) {
			$row = mysql_fetch_assoc($result);
			
			echo '<tr><td>'.$row['productID'].'</td>';
			echo '<td><img width=100px height=100px src="getImage.php?id=' . $row['productID'] . '" alt="' . $row['productName'] . '" title="' . $row['productName']  .'"/><br>';
			echo '<a href="updateImage.php?productID='.$row['productID'].'"><button>Update Image</button></a></td>' ;
			echo '<td>'.$row['productName'].'</td>';
			echo '<td>'.$row['category'].'</td>';
			echo '<td>'.$row['price'].'</td>';
			echo '<td>'.$row['desctxt'].'</td>';
			echo '<td>'.$row['stock'].'</td>';
			echo '<td><a href="updateFurniture.php?productID='.$row['productID'].'"><button>Update Details</button></a></td>';
			echo '<td><a href="deleteProduct.php?productID='.$row['productID'].'"><button>Delete Product </button></a></td>';
			echo '</div>';
			echo '</div>';
		}
		echo '</table>';
    }
	include 'adminfooter.php';
?>
	