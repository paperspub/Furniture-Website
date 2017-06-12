<?php include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
	
	include 'headerAdmin.php';
?>
	
<?php
	$errno = $_GET['errno'];
   if ($errno == 3) {
		echo "Not enough stock!";
    }
	include 'footerAdmin.php';
?>