<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
 include 'headerAdmin.php' 
 ?>

		<h1 class="title">Inspiration Gallery</h1>
		
		<div class="intro">
			In search of inspiration? Browse through our vast collection of bedrooms, dining rooms and living room designs to get more ideas!
		</div>
		<div class="line"></div>
		
		<h1>Dining Room</h1>
		
		<div id="slider">
			<div class="flexslider">
				<ul class="slides">
				<li><img src="style/img/dining room/dining1.jpg" alt=""><div class="inspdesc"><h3>The sleek, modern design of our Cass table is a great option if you like a lot of surface area, and the overhang makes it easy to neatly tuck chairs away when they’re not in use.
				<br><br>Like this furniture? Get it here!<br><a href="#"><p>Casa table collection</p></a> </h3></div></li>
				<li><img src="style/img/dining room/dining2.jpg" alt=""></li>
				<li><img src="style/img/dining room/dining3.jpg" alt=""></li>
				<li><img src="style/img/dining room/dining4.jpg" alt=""></li>
				<li><img src="style/img/dining room/dining5.jpg" alt=""></li>
				<li><img src="style/img/dining room/dining6.jpg" alt=""></li>
				<li><img src="style/img/dining room/dining7.jpg" alt=""></li>
				<li><img src="style/img/dining room/dining8.jpg" alt=""></li>
				<li><img src="style/img/dining room/dining9.jpg" alt=""></li>
				<li><img src="style/img/dining room/dining10.jpg" alt=""></li>	
				</ul>
			</div>
		</div>
		<?php include 'footerAdmin.php' ?>
