$(document).ready(function() 
	{
		slideImages();
	});
	
function slideImages()
{
	var e = $(".frontPage").children().length;
	$(".imageShow").stop(true).delay(9000).fadeOut(1000,
		function(){
			$(this).attr('class',"imageHide");
		
			if($(this).index()==e-1)
			{
				$(".frontPage").children().first().attr('class',"imageShow").removeAttr('style');
				$("imageShow").stop(true).fadeIn(1000);
			}
			else
			{
				$(this).next().attr('class',"imageShow").removeAttr('style');;
				//$(this).next().removeAttr('style');
				$("imageShow").stop(true).fadeIn(1000).stop(true);
			}
			slideImages();
		});
	
} 

$(document).ready(function ()
 { 	
	$('.lImage').click( function () 
	{ 
		
		var e = $(".frontPage").children().length;
		$(".imageShow").stop(true).fadeOut(1000,
		function(){
			$(this).attr('class',"imageHide");
		
			if($(this).index()==0)
			{
				$(".frontPage").children().last().attr('class',"imageShow").removeAttr('style');
				$("imageShow").stop(true).fadeIn(1000);
			}
			else
			{
				$(this).prev().attr('class',"imageShow").removeAttr('style');;
				//$(this).next().removeAttr('style');
				$("imageShow").stop(true).fadeIn(1000).stop(true);
			}
			slideImages();
 	}); 
 });
 });
 
 
 $(document).ready(function ()
 { 	
	$('.rImage').click( function () 
	{ 
		
		var e = $(".frontPage").children().length;
		$(".imageShow").stop(true).fadeOut(1000,
		function(){
			$(this).attr('class',"imageHide");
		
			if($(this).index()==e-1)
			{
				$(".frontPage").children().first().attr('class',"imageShow").removeAttr('style');
				$("imageShow").stop(true).fadeIn(1000);
			}
			else
			{
				$(this).next().attr('class',"imageShow").removeAttr('style');;
				//$(this).next().removeAttr('style');
				$("imageShow").stop(true).fadeIn(1000).stop(true);
			}
			slideImages();
 	}); 
 });
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