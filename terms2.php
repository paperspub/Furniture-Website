<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index1.php?err=2');
    }
include 'adminheader.php' 
?>
    <h1 class="title">Terms and Conditions</h1>

	<p>By using Cramiture.com or any other service by Cramiture.com 
	you are agreeing to be bound by the following terms and conditions ("Terms of Service"). </p>
	<p>Cramiture.com reserves the right to update and change the Terms of Service from time to time without notice. 
	Any new features that augment or enhance the current Service, including the release of new tools and resources,
	shall be subject to the Terms of Service. Continued use of the Service after any such changes shall constitute 
	your consent to such changes. You can review the most current version of the Terms of Service at any time at
	<a href="terms.html">http://www.cramiture.com.my/terms/ </a></p>
	<p>Violation of any of the terms below will result in the termination of your Account. While Cramiture.com 
	prohibits such conduct and content on the Service, you understand and agree that Cramiture.com cannot be 
	responsible for the content posted on the service and you nonetheless may be exposed to such materials. You 
	agree to use the Service at your own risk.</p>
	<p><h4>Account Terms</h4>
	<ol>
	<li>You must be 13 years or older to use this Service.</li>
	<li>You must be a human. Accounts registered by "bots" or other automated methods are not permitted.</li>
	<li>You must provide a valid email address in order to complete the signup process.</li>
	<li>Your login may only be used by one person; a single login shared by multiple people is not permitted. 
	You may create separate logins for as many people as you'd like.</li>
	<li>You are responsible for maintaining the security of your account and password. Cramiture.com cannot 
	and will not be liable for any loss or damage from your failure to comply with this security obligation.</li>
	<li>You are responsible for all Content posted and activity that occurs under your account (even when Content 
	is posted by others who have accounts under your account).</li>
	<li>If you are using a free account you are not permitted to block ads.</li>
	<li>One person or legal entity may not maintain more than one free account.</li>
	<li>You may not use the Service for any illegal or unauthorized purpose. You must not, in the use of the 
	Service, violate any laws in your jurisdiction (including but not limited to copyright laws).</li></ol></p>
	<p><h4>Payment, Refunds, Upgrading and Downgrading Terms</h4>
	<ol><li>A valid credit card is required for paying accounts. Free accounts are not required to provide
	a credit card number.</li>
	<li>If you initially sign up for a PLUS or PRO account, and you don't cancel that account within 30 days, 
	you will be billed monthly starting on the 30th day after your account was initially created. If you cancel 
	prior to the processing of your first invoice on the 30th day, you will not be charged.</li>
	<li>An upgrade from the free 1-project plan to any paying plan will end your free trial. You will be billed 
	for your first month immediately upon upgrading.</li>
	<li>The Service is billed in advance on a monthly basis and is non-refundable. There will be no refunds or
	credits for partial months of service, upgrade/downgrade refunds, or refunds for months unused with an open 
	account. In order to treat everyone equally, no exceptions will be made.</li>
	<li>All fees are exclusive of all taxes, levies, or duties imposed by taxing authorities, and you shall be 
	responsible for payment of all such taxes, levies, or duties, excluding only United States (federal or state) taxes.</li>
	<li>For any upgrade or downgrade in plan level, your credit card that you provided will automatically be 
	charged the new rate on your next billing cycle.</li>
	<li>Downgrading your Service may cause the loss of Content, features, or capacity of your Account.Cramiture.com
	does not accept any liability for such loss.</li></ol></p>
	<p><h4>Cancellation and Termination</h4>
	<ol><li>You are solely responsible for properly cancelling your account. An email or phone request to cancel your 
	account is not considered cancellation. You can cancel your account at any time by clicking on the Account link in 
	the global navigation bar at the top of the screen. The Account screen provides a simple no questions asked
	cancellation link.</li>
	<li>All of your Content will be immediately deleted from the Service upon cancellation. This information
	can not be recovered once your account is cancelled.</li>
	<li>If you cancel the Service before the end of your current paid up month, your cancellation will take effect 
	immediately and you will not be charged again.</li>
	<li>Cramiture.com, in its sole discretion, has the right to suspend or terminate your account and refuse any
	and all current or future use of the Service, or any other Cramiture.com service, for any reason at any time.
	Such termination of the Service will result in the deactivation or deletion of your Account or your access to 
	your Account, and the forfeiture and relinquishment of all Content in your Account. Cramiture.com reserves the
	right to refuse service to anyone for any reason at any time.</li></ol></p>
	<p><h4>Modifications to the Service and Prices</h4>
	<ol><li>Cramiture.com reserves the right at any time and from time to time to modify or discontinue, temporarily 
	or permanently, the Service (or any part thereof) with or without notice.</li>
	<li>Prices of all Services, including but not limited to monthly subscription plan fees to the Service, are 
	subject to change upon 30 days notice from us. Such notice may be provided at any time by posting the changes 
	to the Cramiture Site (www.Cramiture.com) or the Service itself.</li>
	<li>Cramiture.com shall not be liable to you or to any third party for any modification, price change, suspension
	or discontinuance of the Service.</li></ol></p>
	<p><h4>Copyright and Content Ownership</h4>
	<ol><li>We claim no intellectual property rights over the material you provide to the Service. Your profile and 
	materials uploaded remain yours. However, by setting your pages to be shared publicly, you agree to allow others 
	to view and share your Content.</li>
	<li>Cramiture.com does not pre-screen Content, but Cramiture.com and its designee have the right (but not the
	obligation) in their sole discretion to refuse or remove any Content that is available via the Service.</li>
	<li>The look and feel of the Service is copyright © 2015-2016 Cramiture.com. All rights reserved. You may not
	duplicate, copy, or reuse any portion of the HTML/CSS or visual design elements without express written permission 
	from Cramiture.com.</li></ol></p>
	<p><h4>General Conditions</h4>
	<ol><li>Your use of the Service is at your sole risk. The service is provided on an "as is" and "as available" basis.</li>
	<li>Technical support is only provided to paying account holders and is only available via email.</li>
	<li>You understand that Cramiture.com uses third party vendors and hosting partners to provide the necessary hardware,
	software, networking, storage, and related technology required to run the Service.</li>
	<li>You must not modify, adapt or hack the Service or modify another website so as to falsely imply that it is 
	associated with the Service, Cramiture.com, or any other Cramiture.com service.</li>
	<li>You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the
	Service, or access to the Service without the express written permission by Cramiture.com.</li>
	<li>We may, but have no obligation to, remove Content and Accounts containing Content that we determine in our sole 
	discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable
	or violates any party's intellectual property or these Terms of Service.</li>
	<li>Verbal, physical, written or other abuse (including threats of abuse or retribution) of any Cramiture.com customer,
	employee, member, or officer will result in immediate account termination.</li>
	<li>You understand that the technical processing and transmission of the Service, including your Content, may be transferred
	unencrypted and involve 
	<ol type="a">
	<li>transmissions over various networks; and </li>
	<li>changes to conform and adapt to technical requirements of connecting networks or devices.</li>
	</ol>
	<li>You must not upload, post, host, or transmit unsolicited email, SMSs, or "spam" messages.</li>
	<li>You must not transmit any worms or viruses or any code of a destructive nature.</li>
	<li>If your bandwidth significantly exceeds the average bandwidth usage (as determined solely by Cramiture.com) of other 
	Cramiture customers, we reserve the right to immediately disable your account or throttle your file hosting until you can 
	reduce your bandwidth consumption.</li>
	<li>Cramiture.com does not warrant that 
		<ol type="i">
		<li>the service will meet your specific requirements, </li>
		<li>the service will be uninterrupted, timely, secure, or error-free, </li>
		<li>the results that may be obtained from the use of the service will be accurate or reliable, </li>
		<li>the quality of any products, services, information, or other material purchased or obtained by you
		through the service will meet your expectations, and </li>
		<li>any errors in the Service will be corrected.</li>
		</ol></li>
	<li>You expressly understand and agree that Cramiture.com shall not be liable for any direct, indirect, incidental, 
	special, consequential or exemplary damages, including but not limited to, damages for loss of profits, goodwill, use, 
	data or other intangible losses (even if Cramiture.com has been advised of the possibility of such damages), 
	resulting from: 
		<ol type="i">
		<li>the use or the inability to use the service; </li>
		<li>the cost of procurement of substitute goods and services resulting from any goods, data, information or services 
		purchased or obtained or messages received or transactions entered into through or from the service; </li>
		<li>unauthorized access to or alteration of your transmissions or data;</li>
		<li>statements or conduct of any third party on the service; </li>
		<li>or any other matter relating to the service.</li>
		</ol></li>
	<li>The failure of Cramiture.com to exercise or enforce any right or provision of the Terms of Service shall not
	constitute a waiver of such right or provision. The Terms of Service constitutes the entire agreement between you and
	Cramiture.com and govern your use of the Service, superceding any prior agreements between you and Cramiture.com (including, 
	but not limited to, any prior versions of the Terms of Service).</li>
	<li>Questions about the Terms of Service should be sent to support at Cramiture dot com.</li></ol></p>

</p>
<?php include 'adminfooter.php' ?>
