<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="user"){
      header('Location: index.php?err=2');
    }
	include 'headerUser.php'; 
	?>
<title>Project | Cramiture.com</title>
		<!--<div id="floorplan"><embed src="style/img/trsf7.swf"></div>-->
		<div id="floorplan"><embed style="width:990px;height:500px" src="style/img/CustomizePanel.swf"></div>
		
   <?php include 'footer.php'; ?>