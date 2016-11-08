/**
 * @author new
 */
$(document).ready(function ()
 { 	
		$('.main-block').click( function () { 
		var id = $(this).attr('id');
		var url = "http://bandsit.ru/article/get_article/"+id; 
 		document.location.href = url; 
		}) 
	});
/**
 * 
 */
$(document).ready(function ()
 { 	
		$('.search').click( function () 
		{ 
		$('.search_box').css({
 			display:'block',
			});
 		}) 
 });
 /**
  * 
  */
 $(document).ready(function ()
 { 	
		$('.search_close').click( function () 
		{ 
		$( "#resSearch" ).empty();	
		$('.search_box').css({
 			display:'none',
			});
 		}) 
 });
/**
 * 
 */
$(document).ready(function()
{
		$(".main-block").hover(function() {
        $(this).stop().animate({ backgroundColor: "#333333"}, 400);
        },function() {
        $(this).stop().animate({ backgroundColor: "#ffffff" }, 400);
        });	
 }); 
/**
 * 
 */		 

$(function(){
  $("#search_field").keyup(function(){
     var search = $("#search_field").val();
     $.ajax({
       type: "POST",
       url: "http://bandsit.ru/search/get_search",
       data: {"search": search},
       cache: false,                                 
       success: function(response){
          $("#resSearch").html(response);
       }
     });
     return false;
   });
});	