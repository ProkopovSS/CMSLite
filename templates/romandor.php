<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
	<title><?php echo $_SERVER['SERVER_NAME'];?></title>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8 ">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/romandor/css/style.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/romandor/css/gs.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/css/demo.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/js/jquery.orbit.min.js"></script>
	<style type="text/css">
	  		#featured {
	  			 width: 940px; height: 450px; 
	  			 background: #009cff url('/orbit/loading.gif') no-repeat center center; 
	  			 overflow: hidden; }
	</style>
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/romandor/css/simplelightbox.min.css">
    
	<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit({
					'bullets': true,
					'timer' : true,
					'animation' : 'horizontal-slide'
				});
			});
			
		$(document).ready(function ()
 		{ 
			$('.EartImg').click( function () 
			{ 
				
				if($('.embed-container').css('height')=='0px')
				{
				$('.embed-container').animate({'height':'640px'},1000);
				}
				else
				{
				$('.embed-container').animate({'height':'0'},1000)
				}
			});
		});
		
		$(document).ready(function(){

        var $menu = $("#main-menu-container");

        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.removeClass("default").addClass("fixed");
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.removeClass("fixed").addClass("default");
            }
        });//scroll
    });
    
     $(document).ready(function ()
 { 	
	$('.searchTab').click( function () 
	{ 
	   
		switch($('#searchBox').attr('vs')){
		case '0': $('#searchBox').animate({'opacity' : '1'}, 400);
				  $('#searchBox').attr('vs','1');	
				  break;
		case '1': 
				  if($('#searchBox').val()=="")
				  {
					$('#searchBox').animate({'opacity' : '0'}, 400);
					$('#searchBox').attr('vs','0');
				  }
				  else
				  {
					alert('text');    
				  }
				  break;
		}
	});
 });
		</script>  	
		
</head>
<body>

<!-- menu -->
<div class="header-container">
	<div class="header">
	<p>Роман Дорожный</p>
	<div class="subHeaderLine">
	 <div class="subHeader">
	   <h1 class="lText">ЖУРНАЛИСТ</h1>
		 <img class="EartImg"  src="/images/0001.gif" width="28" height="28" align="center" ></img>
	   <h1 class="rText">ПУТЕШЕСТВЕННИК</h1>
	 </div>
	</div>
	</div>
</div>
<!-- end menu -->
<div id="main-menu-container" class="default">
	<div class="main-menu">
		 <?php controller::Get_metod_controller('menu','index',array('id'=>'8'));?>
		 <?php controller::Get_metod_controller('search','searchOnPage');?>
		<div class="menu_icon">
			<a href="#">
			 <img style=" " src="/images/menu.png" width="32" height="22" ></img>
		 	</a>
		</div>
	</div>
</div>
<div class="wrap">
<!-- content -->
<style>.embed-container {
		position: relative; padding-bottom: 0; max-width: 100%;} 
		.embed-container iframe, 
		.embed-container object, 
		.embed-container iframe{position: absolute; top: 0; left: 0; width: 100%; height: 100%;} 
		small{position: absolute; z-index: 40; bottom: 0; margin-bottom: -15px;}
		</style>
<div class="embed-container">
<iframe width="1024" height="640" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" title="Тестовая карта" src="//www.arcgis.com/apps/Embed/index.html?webmap=427d28f19d7e4ac187d7323713e20b78&amp;extent=37.2364,55.4616,38.6729,55.8644&amp;zoom=true&amp;scale=true&amp;search=true&amp;searchextent=true&amp;disable_scroll=true&amp;theme=dark">
</iframe>
</div>
	<div class="center">
	<?php controller::init();?>
	</div>
<!-- end content-->


</div>	
<!-- footer -->
<div  class="footer">
	<div class="footer-container">
		<div class="footer-item">
		
		</div>
		<div class="footer-item">
			
		</div>
		<div class="footer-item">
			
		</div>
	</div>
</div>
<!-- footer -->

</body>
</html>