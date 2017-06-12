<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
 include 'headerAdmin.php' 
 ?>

    <h1 class="title">Privacy Policy</h1>
	<p>Cramiture is committed to protect the privacy of individuals who visit the website 
	and who make use of the on-line facilities.</p>
	<p>This privacy policy provides you with information in terms of articles 19 and 20 of
	the Data Protection Act. It also takes consideration of Recommendation 2/2001 of the 
	Article 29 Data Protection Working Party, adopted on 17 May 2001, on certain minimum 
	requirements for collecting personal data on-line.</p>
	<p>The policy can be easily accessible via a link at the bottom of each web page.</p>
	<ol>
	<li><h4>Data Controller</h4>
	<p>The data controller of this website is Cramiture whose office is situated at First City
	University College, Bandar Utama.</p></li>
	<li><h4>Information collected and purpose</h4>
	<u>Download Information</u>
	<p>When you visit our website the following information will automatically be processed 
	and this solely for the use of this association:<br>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;The requested web page or download;<br>
      &nbsp;&nbsp;&nbsp;&nbsp;Whether the request was successful or not;<br>
      &nbsp;&nbsp;&nbsp;&nbsp;The date and time when you accessed the site;</p>
 	The Internet address of the web site or the domain name of the computer from which you accessed the site;
 	The operating system of the machine running your web browser and the type and version of your web browser.</p>
	<u>Cookies</u>
	<p>Cookies are small pieces of data that the site transfers to the user’s computer hard drive
	when the user visits the website. Our website uses only session cookies which are erased when 
	the user closes the Web browser. The session cookie is stored in temporary memory and is not 
	retained after the browser is closed. Session cookies do not collect information from the user’s
	computer. They will typically store information in the form of a session identification that does 
	not personally identify the user.</p>
	<p>Personal data provided by the data subject</p>
	<p>When using this website’s online facilities, data subjects may be required to provide their
	personal data for the purposes of sending and receiving lost passwords.</p></li>
	<li><h4>Your rights as data subject</h4>
	<p>As an individual you may exercise your right to access the data held about you by this company by
	submitting your request in writing to the data controller.</p>
	<p>Although all reasonable efforts will be made to keep your information updated, you are kindly requested 
	to inform us of any change referring to the personal data held by the association. In any case if you consider
	that certain information about you is inaccurate, you may request rectification of such data. You also have
	the right to request the blocking or erasure of data which has been processed unlawfully.</p></li>
	<li><h4>Links to other Web Sites</h4>
	<p>To give you a better service our site can connect you with a number of links to other local and 
	international organisations and agencies. When connecting to such other websites you will no longer
	be subject to this policy but to the privacy policy of the new site.</p></li>
	<li><h4>Transaction Security Policy<u><h5>(this section should be included when the site makes use of a
	payment gateway for financial transactions)</h5></u></h4>
	<p>This site uses Secure Sockets Layer (SSL) to ensure secure transmission of your personal data.
	You should be able to see the padlock symbol in the status bar on the bottom right hand corner of the 
	browser window. The url address will also start with https:// depicting a secure webpage. SSL applies 
	encryption between two points such as your PC and the connecting server. Any data transmitted during 
	the session will be encrypted or scrambled and then decrypted or unscrambled at the receiving end. 
	This will ascertain that data cannot be read during transmission.</p></li>
	<li><h4>Changes to this Privacy Policy</h4>
	<p>If there are any changes to this privacy policy, we will replace this page with an updated version. 
	It is therefore in your own interest to check the "Privacy Policy" page any time you access our web 
	site so as to be aware of any changes which may occur from time to time.</p></li>
	<li><h4>Feedback</h4>
	<p>Any comments or suggestions that you may have and which may contribute to a better quality of service
	will be welcome and greatly appreciated.</p>

	</p>

  <?php include 'footerAdmin.php' ?>
