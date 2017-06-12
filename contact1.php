<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
 include 'headerAdmin.php' 
 ?>
<title>Contact Us | Cramiture.com</title>
    <h1 class="title">Contact Us</h1>
	<div class="line"></div>
		<h3>Cramiture Co. Ltd</h3>
			<p>Address : No.1, Persiaran Bukit Utama,
			Bandar Utama, 47800 Petaling Jaya,
			Selangor, Malaysia.</p>
			<p>Phone No: 1230-4560-0789</p>
			<p>Fax No: 1230-4560-0788</p>
			<p>Email: cramiture@gmail.com</p>
			<iframe src="https://maps.google.com/maps?hl=en&q=KBU International College&ie=UTF8&t=roadmap&z=12&iwloc=B&output=embed"></iframe>
			<br><br><div class="line"></div>
			<h4>Have questions? <br>Fill up the form below and we will get back to you as soon as possible!</h4>
			<div class="form-container">
			  <form class="forms" action="#" method="post">
				<fieldset>
				  <ol>
					<li class="form-row text-input-row">
					  <label>Name</label>
					  <input type="text" name="name" value="" class="text-input required">
					</li>
					<li class="form-row text-input-row">
					  <label>Email</label>
					  <input type="text" name="email" value="" class="text-input required email">
					</li>
					<li class="form-row text-input-row">
					  <label>Subject</label>
					  <input type="text" name="subject" value="" class="text-input required">
					</li>
					<li class="form-row text-area-row">
					  <label>Message</label>
					  <textarea name="message" class="text-area required"></textarea>
					</li>
					<li class="form-row hidden-row">
					  <input type="hidden" name="hidden" value="">
					</li>
					<li class="button-row">
					  <input type="submit" value="Submit" name="submit" class="btn-submit">
					</li>
				  </ol>
				  <input type="hidden" name="v_error" id="v-error" value="Required">
				  <input type="hidden" name="v_email" id="v-email" value="Enter a valid email">
				</fieldset>
			  </form>
			<div class="response"></div>
		</div>
  <?php include 'footerAdmin.php' ?>
