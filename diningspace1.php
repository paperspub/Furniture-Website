<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
include 'headerAdmin.php' 
?>

<title>How to Decorate Your Dining Space</title>
    <h1 class="title">Measuring Your Dining Space</h1>

    <div class="intro">
		To create a space that's comfortable and functional, you need to make sure you have enough room to relax and maneuver. Use these guidelines to design a welcoming dining room. Need additional advice about measuring or product suggestions to fit your space? Our expert Design Associates are ready to help. 800.301.9720.
	</div>

		<img src="style/images/tableseating.png" style="width:700px" alt="">
		<br>
		<div class="line"></div>
		<h1>Seating</h1>
		<p>The number of chairs you are able to place at the table is determined in multiple ways. In fact, two tables with the same size top might accommodate different numbers of people based on the leg placement and top overhang.</p>
		<p>If you are trying to maximize seating, consider a pedestal or trestle table or even benches as seating. This eliminates the table legs and the chair legs bumping into each other.</p>
		<h2>Width of place setting</h2>
		<img src="style/img/dining room/dining5.jpg" style="width:700px" alt="">
		<br>
		<br>
		<p>
		The general guideline is to allow 24 inches for every person at your table. However, using a tablecloth instead of individual placemats or bench seating instead of chairs allows for cozier seating. The complexity of your place settings is also a factor: multiple utensils and extra glassware at each seat requires more space for each person.</p>
		<h2>Depth of table</h2>
		<img src="style/img/dining room/dining2.jpg" alt=""><br><br><p>
		The minimum depth for a dining table is 30 inches. If you rely on your table for serving space, a depth of 36 inches or larger provides more room for platters, bowls, pitchers and centerpieces.</p>
		<h2>Distance between the table and walls or furniture</h2>
		<img src="style/img/dining room/dining10.jpg" alt=""><br><br>
		<p>If possible, leave at least 36 inches between the edge of your table and other furniture or the wall. This provides enough room for someone to walk behind the chairs while others are seated or to open a door on a nearby cabinet. If you have room, 48 inches of space is ideal.</p>
		<h2>Clearance under the table</h2>
		<img src="style/img/dining room/dining7.jpg" alt=""><br><br>
		<p>If you have dining chairs with arms, the space between the table and the floor will determine if the arms can tuck all the way under the table. Also consider the clearance for crossing your legs underneath the table.</p>
		<h2>Rugs</h2>
		<img src="style/img/dining room/dining1.jpg" alt=""><br><br>
		<p>When choosing the size of the rug beneath your dining table, remember that the rug needs to accommodate all the legs of the chairs, even when the chairs are pushed away from the table (such as when guests get up from the table). At least 24 inches from the edge of the table to the edge of the rug will give you plenty of room and prevent chair legs from catching on the edge of the rug.</p>	
  <?php include 'footerAdmin.php' ?>
