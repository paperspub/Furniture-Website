<?php 
 	include 'base.php';
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['Username'];
    if(!isset($_SESSION['Username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }	
	include 'adminheader.php';
?>
<title>Admin Panel</title>
	<h1 class="title">Furniture Purchase the Easy Way!</h1>
		<div class="intro">
			Cramiture is a leading furniture provider with choices ranging from 
		elegant coffee tables to luxurious king size beds.
		</div>

		<div id="slider">
			<div class="flexslider">
				<ul class="slides">
				<li><img src="style/img/banner.jpg" alt=""></li>
				<li><img src="style/img/bedroom/bedroom2.jpg" alt=""></li>
				<li><img src="style/img/bedroom/bedroom3.jpg" alt=""></li>
				<li><img src="style/img/bedroom/bedroom4.jpg" alt=""></li>
				</ul>
			</div>
		</div>
<?php	
	include 'adminfooter.php';
?>
	