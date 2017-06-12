<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="user"){
      header('Location: index.php?err=2');
    }
	include 'headerUser.php'; 
	?>
<title>Caring for Furniture | Cramiture.com </title>
    <h1 class="title">Caring for Furniture</h1>

    <div class="intro">
		Fine wood furniture is a treasured possession in any home, and with good care, it can last for generations. 
		Upholstered furniture provides us with comfort, color and texture.
		Who doesn't love sinking into the cushioned softness of a favorite sofa?
	</div>

		<img src="style/img/neutralRoom.png" style="width:900px; margin:auto;" alt="">
		<br>
		<h1>Fine wood furniture</h1>
		<p>Care for fine furniture with these recommendations:</p>
		<h2>Avoid heat and light.</h2><p>
		In a natural state, wood contains a surprising amount of moisture. 
		Preserving appropriate moisture levels is key to the preservation of fine furniture. 
		Accordingly, position fine wood furniture away from heating vents, fireplaces or radiators. 
		Don't store fine furniture in attics, where temperature and humidity levels vary widely from summer to winter, day and night. 
		Avoid placing furniture in areas where it will sit in direct sunlight, which can fade fine furniture; 
		use drapes, sheers or protective window films to guard against the sun's rays.</p>
		<h1>Protect from damage</h1><p>
		Everyday life can be hard on wood furniture. Moisture from sweating beverage glasses leaves round rings in the finish, while the heat from a hot dish can ruin the wood finish beneath. 
		Provide cork- or felt-bottomed coasters if you will set glasses or mugs on fine wood, and always use trivets to support hot serving dishes. 
		Place mats, tablecloths or padded table covers protect dining room tables from spills or scrapes.</p>
		<h2>Clean safely.</h2>
		<p>Dust frequently. Occasionally, wood furniture will require heavier cleaning.
		To remove greasy soil or the film from cigarette smoke, mix a solution of oil soap and water as instructed on the oil soap package.
		Using a natural sponge, moisten it with oil soap and wring out most of the water. Gently stroke the furniture to loosen soil.
		Rinse the residue from the wood with a sponge wrung out in clear water, and then dry the piece with fresh cleaning cloths.</p>
		<p>Dust fine furniture often with a lamb's wool duster or barely damp white cotton cleaning cloth.
		Microfiber cloths do a good job of attracting and removing fine blown-in soil. 
		Avoid using a feather duster, as a broken quill can scratch and damage delicate finishes.</p>
		<h2>Dust damp</h2>
		<p>Dusting with a dry cloth can scratch, so lightly spritz your cleaning cloth with water, a spray dusting agent or wood polish.
		Never spray furniture directly, as overspray can leave a difficult-to-remove film. 
		Follow the grain of the wood as you dust to avoid cross-grain scratches.</p>
		<h2>Dust often</h2>
		<p>Frequent dusting removes dirt before it has a chance to settle in and make itself at home. 
		Dusting often keeps an oily build-up from forming on wood furniture.</p>

		<h3>Note: Seek professional advice before cleaning if the wood is in poor condition or the item of furniture is an antique.</h3>	
		</ul>
  <?php include 'footer.php'; ?>