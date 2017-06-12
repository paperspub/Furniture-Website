<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="user"){
      header('Location: start.php?err=2');
    }
include 'headerUser.php'; 
?>
<title>About Us | Cramiture.com</title>
<h1 class="title">Taking the Headache Out of Buying Furniture</h1>
		
			<p>Let’s be real: shopping for furniture can be a chore, in the
		worst sense of the word. Driving from store to store, forgetting 
		measurements, walking past so many sofas that they all start to
		look the same…Sound familiar?</p>
		<p>Furniture.com is committed to bringing the convenience and 
		ease of online shopping to the world of furniture, offering a 
		selection of thousands of items that you can browse at your 
		convenience. (You can even shop in your pajamas—we won’t tell.)
		Looking for a sectional that can stand up to four kids and a dog?
		A sofa for a pint-sized apartment? A cocktail table that’s both 
		mid-century-inspired and budget-friendly? We’ve got it.</p>
		<p>To help ease the anxiety that can accompany online shopping,
		we hand-pick the best in quality and style for our products, 
		have a dedicated Customer Care team and use the best technology
		possible to make sure that when you place an order, your information 
		stays your information. Our white glove delivery service ensures 
		that you don’t have to worry about assembling that King-sized sleigh 
		bed you just bought, and helps to make the setup process a breeze. 
		(Bonus: you don’t have to guilt your friends into helping you unload
		that new sofa.) There’s a better way to buy furniture. Let us show 
		you how.</p>
		
		<img src="style/images/aboutus.jpg" style="width:850px; margin:auto">
  <?php include 'footer.php'; ?>