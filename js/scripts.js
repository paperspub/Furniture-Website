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
/*	PRETTYPHOTO
/*-----------------------------------------------------------------------------------*/

$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({autoplay_slideshow: false, overlay_gallery: false, social_tools:false, deeplinking: false, theme:'pp_default', slideshow:5000});
});


/*-----------------------------------------------------------------------------------*/
/*	COLOUR MENU
/*-----------------------------------------------------------------------------------*/
$(document).ready(function(){
	$("#blueDesc,#yellowDesc,#orangeDesc,#purpleDesc,#brownDesc,#blackDesc,#greyDesc,#greenDesc").hide();
	$("#red img").css("border","1px solid #9e9e9e");
	$("#red").click(function(){
		$("#redDesc").show(200);
		$("#blueDesc,#yellowDesc,#orangeDesc,#purpleDesc,#greenDesc,#brownDesc,#blackDesc,#greyDesc").hide(100);
		$("#red img").css("border","1px solid #9e9e9e");
		$("#blue img,#yellow img,#orange img,#purple img,#green img,#brown img,#black img,#grey img").css("border","none");
	});
	$("#blue").click(function(){
		$("#blueDesc").show(200);
		$("#redDesc,#yellowDesc,#orangeDesc,#purpleDesc,#greenDesc,#brownDesc,#blackDesc,#greyDesc").hide(100);
		$("#blue img").css("border","1px solid #9e9e9e");
		$("#red img,#yellow img,#orange img,#purple img,#green img,#brown img,#black img,#grey img").css("border","none");
	});
	$("#yellow").click(function(){
		$("#yellowDesc").show(200);
		$("#redDesc,#blueDesc,#orangeDesc,#purpleDesc,#greenDesc,#brownDesc,#blackDesc,#greyDesc").hide(100);
		$("#yellow img").css("border","1px solid #9e9e9e");
		$("#blue img,#red img,#orange img,#purple img,#green img,#brown img,#black img,#grey img").css("border","none");
	});
	$("#orange").click(function(){
		$("#orangeDesc").show(200);
		$("#redDesc,#blueDesc,#yellowDesc,#purpleDesc,#greenDesc,#brownDesc,#blackDesc,#greyDesc").hide(100);
		$("#orange img").css("border","1px solid #9e9e9e");
		$("#blue img,#red img,#yellow img,#purple img,#green img,#brown img,#black img,#grey img").css("border","none");
	});
	$("#purple").click(function(){
		$("#purpleDesc").show(200);
		$("#redDesc,#blueDesc,#yellowDesc,#orangeDesc,#greenDesc,#brownDesc,#blackDesc,#greyDesc").hide(100);
		$("#purple img").css("border","1px solid #9e9e9e");
		$("#blue img,#red img,#yellow img,#orange img,#green img,#brown img,#black img,#grey img").css("border","none");
	});
	$("#brown").click(function(){
		$("#brownDesc").show(200);
		$("#redDesc,#blueDesc,#yellowDesc,#orangeDesc,#purpleDesc,#greenDesc,#blackDesc,#greyDesc").hide(100);
		$("#brown img").css("border","1px solid #9e9e9e");
		$("#blue img,#red img,#yellow img,#orange img,#purple img,#green img,#black img,#grey img").css("border","none");
	});
	$("#green").click(function(){
		$("#greenDesc").show(200);
		$("#redDesc,#blueDesc,#yellowDesc,#orangeDesc,#purpleDesc,#brownDesc,#blackDesc,#greyDesc").hide(100);
		$("#green img").css("border","1px solid #9e9e9e");
		$("#blue img,#red img,#yellow img,#orange img,#purple img,#brown img,#black img,#grey img").css("border","none");
	});
	$("#black").click(function(){
		$("#blackDesc").show(200);
		$("#redDesc,#blueDesc,#yellowDesc,#orangeDesc,#purpleDesc,#brownDesc,#greenDesc,#greyDesc").hide(100);
		$("#black img").css("border","1px solid #9e9e9e");
		$("#blue img,#red img,#yellow img,#orange img,#purple img,#brown img,#green img,#grey img").css("border","none");
	});
	$("#grey").click(function(){
		$("#greyDesc").show(200);
		$("#redDesc,#blueDesc,#yellowDesc,#orangeDesc,#purpleDesc,#brownDesc,#blackDesc,#greenDesc").hide(100);
		$("#grey img").css("border","1px solid #9e9e9e");
		$("#blue img,#red img,#yellow img,#orange img,#purple img,#brown img,#black img,#green img").css("border","none");
	});
	
});


/*-----------------------------------------------------------------------------------*/
/*	HOVER
/*-----------------------------------------------------------------------------------*/
	
$(document).ready(function() {
        $('.items .box .image, .items .box .left-side').mouseenter(function(e) {

            $(this).children('a').children('span').fadeIn(200);
        }).mouseleave(function(e) {

            $(this).children('a').children('span').fadeOut(200);
        });

    });
/*-----------------------------------------------------------------------------------*/
/*	SLIDER
/*-----------------------------------------------------------------------------------*/

$(window).load(function() {
			$('.flexslider').flexslider({
				slideshowSpeed: 4000
			});
});