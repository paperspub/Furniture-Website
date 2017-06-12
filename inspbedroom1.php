<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
include 'headerAdmin.php';
 ?>

		<h1 class="title">Inspiration Gallery</h1>

		<div class="intro">
			In search of inspiration? Browse through our vast collection of bedrooms, dining rooms and living room designs to get more ideas!
		</div>
		<div class="line"></div>
		
		<h1>Bedroom</h1>
		
		<div id="slider">
			<div class="flexslider">
				<ul class="slides">
				<li><img src="style/img/bedroom/bedroom6.jpg" alt=""><div class="line"></div><h3>The sleek, modern design of our Cass table is a great option if you like a lot of surface area, and the overhang makes it easy to neatly tuck chairs away when they’re not in use.
				<br><br>Like this furniture? Get it here!<br><a href="#"><p>Casa table collection</p></h3></li>
				<li><img src="style/img/bedroom/bedroom1.jpg" alt=""></li>
				<li><img src="style/img/bedroom/bedroom2.jpg" alt=""></li>
				<li><img src="style/img/bedroom/bedroom3.jpg" alt=""></li>
				<li><img src="style/img/bedroom/bedroom4.jpg" alt=""></li>
				<li><img src="style/img/bedroom/bedroom5.jpg" alt=""></li>
				</ul>
			</div>
		</div>
		<?php include 'footerAdmin.php' ?>
