/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/
ddsmoothmenu.init({
	mainmenuid: "menu", 
	orientation: 'v', 
	classname: 'menu-v', 
	contentsource: "markup" 
})

/*-----------------------------------------------------------------------------------*/
/*	SIDEBAR HEIGHT
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
	var h = $(document).height();
	$('#sidebar').css({height: h+'px'});
});

/*-----------------------------------------------------------------------------------*/
/*	FLASH
/*-----------------------------------------------------------------------------------*/

$(document).ready(function(){
	checkWindow();

    // run test on resize of the window
    $(window).resize(checkWindow);	
});
function checkWindow(){
	var width = $(document).width();
	var height = $(document).height();
	
	$("#floorplan embed").css("width", width+"px");
	$("#floorplan embed").css("height", height+"px");
};
/*-----------------------------------------------------------------------------------*/
/*	MENU TOGGLE
/*-----------------------------------------------------------------------------------*/

$(document).ready(function(){
 	$("#menuBtn").click(function(){
		$("#sidebar").toggle(500);
	});	
});

/*-----------------------------------------------------------------------------------*/
/*	HOVER
/*-----------------------------------------------------------------------------------*/
	
$(document).ready(function() {
        $('.items .box .image, .items .box .left-side, .carousel ul li').mouseenter(function(e) {

            $(this).children('a').children('span').fadeIn(200);
        }).mouseleave(function(e) {

            $(this).children('a').children('span').fadeOut(200);
        });

    });