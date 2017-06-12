function placeholderIsSupported() {
		test = document.createElement('input');
		return ('placeholder' in test);
}


$(document).ready(function(){
  placeholderSupport = placeholderIsSupported() ? 'placeholder' : 'no-placeholder';
  $('html').addClass(placeholderSupport);  
});



//reference : https://www.freshdesignweb.com/css-registration-form-templates/

//to include captcha: http://www.the-art-of-web.com/php/captcha/