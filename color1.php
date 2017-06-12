<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
 include 'headerAdmin.php'
 ?>
<title>Colour | Cramiture.com</title>
    <h1 class="title">Colour schematics</h1>

    <div class="intro">
		Choosing colour combinations is one of the most intimidating steps for beginners.
		Colour has the power to change the shape and size of furnishings, as well as the shape and size of the room itself.
		Selecting colours is not difficult if you equip yourself with some basic information about colour and its effects.
	</div>
	 <div class="line"></div>
		<img src="style/images/color psychology1.png" style="width:100% " alt="">
		<br>
		<div class="line"></div>
		<h1>Choose Wisely</h1>
		<p>You don’t have to worry about trends in order to have a beautiful home.
		Colour trends will come and go. The people who live in a home make it beautiful by choosing colours that reflect their preferences and personalities.
		The trick is to blend the colours you like into a pleasing combination.</p>
		<p>Keep in mind that each colour has a psychological value. 
		Think about how certain colours make you feel. They can influence any emotion, from tranquility to rage. 
		To create peace and harmony in your home, choose your colours wisely.
		some colours in large amounts might have the opposite effect on you and your loved ones.<p>
		<h2>What mood do you want to create? Which colours will help you achieve that mood?</h2>
		<p>If you need help answering these questions, look at magazines, decorating books, blogs and websites for ideas. 
		Also, let your textiles be your guide. 
		Fabric, carpeting, furniture and tile are available in a more limited range of colours than paint, so choose them first and then decide on your paint colour.</p>
		
		<h2>Click on the colours on the colour menu below to see how colour affects mood!</h2>
		<div class="line"></div>
		<ul id="colour-menu" class="one-sixth">
		<li><button id="red" type="button"><img src="style/img/red.png" alt="red"></button></li>
		<li><button id="orange" type="button"><img src="style/img/orange.png" alt="orange"></button></li>
		<li><button id="yellow" type="button"><img src="style/img/yellow.png" alt="yellow"></button></li>
		<li><button id="green" type="button"><img src="style/img/green.png" alt="green"></button></li>
		<li><button id="blue" type="button"><img src="style/img/blue.png" alt="blue"></button></li>
		<li><button id="purple" type="button"><img src="style/img/purple.png" alt="purple"></button></li>
		<li><button id="brown" type="button"><img src="style/img/brown.png" alt="brown"></button></li>
		<li><button id="grey" type="button"><img src="style/img/grey.png" alt="grey"></button></li>
		</ul>  		
		
		<div id="redDesc" class="five-sixth last">
		<h3>Red</h3>
		<ul>
		  <li><p>Red raises a room’s energy level. The most intense colour, it pumps the adrenaline like no other hue. 
		  It is a good choice when you want to stir up excitement, particularly at night. In the living room or dining room, 
		  red draws people together and stimulates conversation. In an entryway, it creates a strong first impression.</p>
		  <p>Red has been shown to raise blood pressure and speed respiration and heart rate. It is usually considered too 
		  stimulating for bedrooms, but if you’re typically in the room only after dark, you’ll be seeing it mostly by lamplight,
		  when the colour will appear muted, rich and elegant.</p></li>
		  <li><img src="style/img/red room.png" alt="Red"> </li>
		</ul>
		<div class="line"></div>
		</div>
		<div id="blueDesc" class="five-sixth last">
		<h3>Blue</h3>
		<ul>
		  <li><p>Blue is said to bring down blood pressure and slow respiration and heart rate. That is why 
		  it is considered calming, relaxing and serene, and it is often recommended for bedrooms and bathrooms.</p>
		  <p>A pastel blue that looks pretty on the paint chip can come across as unpleasantly chilly on the walls
		  and furnishings, however, especially in a room that receives little natural light. If you opt for a light
		  blue as the primary colour in a room, balance it with warm hues for the furnishings and fabrics.</p>
		  <p>To encourage relaxation in social areas such as family rooms, living rooms or large kitchens, consider
		  warmer blues, such as periwinkle, or bright blues, such as cerulean or turquoise. Blue is known to have a
		  calming effect when used as the main colour of a room — but go for softer shades. Dark blue has the opposite 
		  effect, evoking feelings of sadness. Refrain from using darker blues in your main colour scheme.</p></li>
		  <li><img src="style/img/blue room.png" alt="Blue"> </li>
		</ul>
		<div class="line"></div>
		</div>
		
		<div id="yellowDesc" class="five-sixth last">
		<h3>Yellow</h3>
		<ul>
		  <li><p>Yellow captures the joy of sunshine and communicates happiness. It is an excellent choice for kitchens, 
		  dining rooms and bathrooms, where it is energizing and uplifting. In halls, entries and small spaces, yellow 
		  can feel expansive and welcoming.</p>
		  <p>Even though yellow although is a cheery color, it is not a good choice for main color schemes. Studies
		  show that people are more likely to lose their temper in a yellow interior. Babies also seem to cry more in 
		  yellow rooms. In large amounts, this color tends to create feelings of frustration and anger. In chromotherapy,
		  yellow is believed to stimulate the nerves and purify the body.</p></li>
		  <li><img src="style/img/yellow room.png" alt="Yellow"> </li>
		</ul>
		<div class="line"></div>
		</div>
		
		<div id="orangeDesc" class="five-sixth last">
		<h3>Orange</h3>
		<ul>
		  <li><p>Orange evokes excitement and enthusiasm, and is an energetic color. While not a good idea for a living room or
		  for bedrooms, this color is great for an exercise room; it will bring out all the emotions that you need released during
		  your fitness routine. In ancient cultures, orange was believed to heal the lungs and increase energy levels.</p></li>
		  <li><img src="style/img/orange room.png" alt="Orange"> </li>
		</ul>
		<div class="line"></div>
		</div>
		
		<div id="greenDesc" class="five-sixth last">
		<h3>Green</h3>
		<ul>
		  <li><p>Green is considered the most restful color for the eye. Combining the refreshing quality of blue and the 
		  cheerfulness of yellow, green is suited for almost any room on the house. In the kitchen, green cools things down; 
		  in a family room or living room, it encourages unwinding but has enough warmth to promote comfort and togetherness.</p>
		  <p>Green also has a calming effect when used as a main color for decorating. It is believed to relieve stress by 
		  helping people relax. It is also believed to help with fertility, making it a great choice for the bedroom.</p></li>
		  <li><img src="style/img/green room.png" alt="Green"> </li>
		</ul>
		<div class="line"></div>
		</div>
		
		<div id="purpleDesc" class="five-sixth last">
		<h3>Purple</h3>
		<ul>
		  <li><p>Purple, in its darkest values (eggplant, for example), is rich, dramatic and sophisticated. It is associated 
		  with luxury and creativity; as an accent or secondary color, it gives a scheme depth. Lighter versions of purple, 
		  such as lavender and lilac, bring the same restful quality to bedrooms as blue does, but without the risk of feeling chilly.</p></li>
		  <li><img src="style/img/purple room.png" alt="Purple"> </li>
		</ul>
		<div class="line"></div>
		</div>
		
		<div id="brownDesc" class="five-sixth last">
		<h3>Neutral (Brown)</h3>
		<ul>
		  <li><p>Neutrals (black, gray, white and brown) are basic to the decorator’s tool kit. All-neutral schemes fall 
		  in and out of fashion, but their virtue lies in their flexibility: Add color to liven things up; subtract it to
		  calm things down.</p>
		  <p>Black is best used in small doses as an accent. Indeed, some experts maintain that every room needs a touch of
		  black to ground the color scheme and give it depth. To make the job easier, rely on the interior designer’s most
		  important color tool: the color wheel.</p></li>
		  <li><img src="style/img/brown room.png" alt="Brown"> </li>
		</ul>
		<div class="line"></div>
		</div>
		
		<div id="greyDesc" class="five-sixth last">
		<h3>Neutral (Grey)</h3>
		<ul>
		  <li><p>Neutrals (black, gray, white and brown) are basic to the decorator’s tool kit. All-neutral schemes fall 
		  in and out of fashion, but their virtue lies in their flexibility: Add color to liven things up; subtract it to
		  calm things down.</p>
		  <p>Black is best used in small doses as an accent. Indeed, some experts maintain that every room needs a touch of
		  black to ground the color scheme and give it depth. To make the job easier, rely on the interior designer’s most
		  important color tool: the color wheel.</p></li>
		  <li><img src="style/img/grey room.png" alt="Grey"> </li>
		</ul>
		<div class="line"></div>
		</div>
		
		
 <?php include 'footerAdmin.php' ?>
