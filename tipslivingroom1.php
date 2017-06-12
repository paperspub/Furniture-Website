<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
	include 'headerAdmin.php' 
?>
<title> Tips in Choosing Living Room Furniture </title>
    <h1 class="title">Tips in Choosing Living Room Furniture</h1>
    <div class="intro">
		The living room is the space in a home that welcomes guests. With that, homeowners make sure that it is well-designed and that it could give comfort to all- not only for guests but for homeowners as well. 
		In designing a living room, the furniture is very important because aside from the visual appeal of the space, it also plays a vital role. Imagine a living area without furniture. 
		Where would you sit to relax and entertain guests? Where will you lounge while watching the television?
	</div>

		<h1>1. Start with the basics.</h1>
		<img src="style/images/domath.jpg" style="width:700px" alt=""><br>
		<p>
		Before you jump into other points, you have to start from the basic in picking pieces and in considering your space. 
		Look for the basic pieces like sofa, armchair, center table and side table. 
		Then look around your space so you will know the right size of furniture you will need for certain functions.</p>
		
		<br>
		<h1>2. Do the math.</h1>
		<img src="style/images/modern-living-room.jpg" style="width:700px" alt=""><br><p>
		Measure your living room and draw a floor plan of it or you can create a sketch of it on a piece of paper. Then plan the traffic using your plan and draw how you will be placing your furniture in it. This will give you a good picture of the room. Also, do not forget to include comfortable and passable pathways.</p>
		
		<br>
		<h2>3. Think of function.</h2>
		<img src="style/images/livingfunction.jpg" style="width:700px" alt=""><br>
		<p>What are the activities that you will do in your living room? This has great impact on what you will be placing in the living room like the modular cabinet for the television set, storage or a place where you can place your drinks if you have guests.</p>
		
		<h2>4. Consider existing architecture.</h2>
		<img src="style/images/structure.jpg" style="width:700px" alt=""><br>
		<p>It is very important that you look at the existing architectural elements in your house. This includes columns, windows and others. With this, you can plan well while considering them because if you fail to look at them, your furniture might not look good in the space. The design of the interior will also matter for you have to make sure that the furniture you get will suit the look.</p>
		<br>
		<h2>5. Create a plan.</h2>
		<img src="style/images/plan.png" style="width:700px" alt=""><br>
		<p>We have mentioned that you need to draw a plan for your living room. It can be a formal design or you can merely do your thing on a piece of a paper. For a better view of your living room, you can request for a 3D design of it with the furniture that you like. The interior designer can also help you decide on this. Then, after getting the design and the plan, make sure that you will stick with the plan.</p>
		<br>
		
		<h2>6. Fill the room with accent furniture.</h2>
		<img src="style/images/rock.jpg" style="width:700px" alt=""><br>
		<p>Aside from the basic furniture that a living room needs, add some accent furniture like an ottoman. This can also be an additional seating area especially when you have guests. Aside from that, these can add appeal to a room. You can also add other accessories on it like throw pillows.</p>
		<br>
		<?php include 'footerAdmin.php' ?>