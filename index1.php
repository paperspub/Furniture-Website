<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
include 'headerAdmin.php';
 ?>
<title>Home | Cramiture.com</title>
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
		<div class="line"></div>
		<h1 class="title">Services We Provide:</h1><br>
        <div class="one-half">
			<h3><img src="style/images/icon-sofa.png" alt="">Furniture Gallery</h3>
			<p>You can browse, inquire or purchase the furnitures through the furniture gallery. </p>
        </div>
		<div class="one-half last">
		<h3><img src="style/images/icon-package.png" alt="">Purchase Furniture Online</h3>
		<p>Purchasing furniture is made easy with the online purchasing from Cramiture. Choose from the furniture gallery, checkout and your purchase will be delivered to your doorstep within 14 days! </p>
		</div>
		<div class="clear"></div>
		<div class="one-half">
			<h3><img src="style/images/icon-app.png" alt="">Floor Plan Tool</h3>
			<p>A floor plan is a tool that gives users the option to draw, edit, create their very own floor plan. You can save and print the floor plan based off the design you have created!</p>
		</div>
		<div class="clear"></div>

<?php include 'footerAdmin.php'; ?>