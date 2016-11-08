<div class="main-content-art">
	<div>
		<p class="main-header">
		<?php echo '<a href="http://bandsit.ru/main/index/'.$page['link'].'" style="color: #333333;text-decoration: underline;">'.$page['name'].'</a> | '.$article['name'];?>
		</p>
	</div>
	<div style="margin: 30px;">
		<?php echo $article['text'];?>
	</div>
					<!-- -->
	<div class="aricles-widgets">
	<!-- Put this script tag to the <head> of your page -->
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
		<script type="text/javascript">
  			VK.init({apiId: 4031759, onlyWidgets: true});
		</script>
						<!-- Put this div tag to the place, where the Like block will be -->
		<div class="aricles-widgets-item">
		<div style="display: inline-block;" id="vk_like"></div>
		</div>
		<script type="text/javascript">
		VK.Widgets.Like("vk_like", {type: "button"});
		</script>
					
					<!-- -->
					<!-- -->
		<div class="aricles-widgets-item">
		<div id="fb-root"></div>
		</div>
		<script>(function(d, s, id) {
 		var js, fjs = d.getElementsByTagName(s)[0];
 		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
  		js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div class="aricles-widgets-item">
			<div style="display: inline-block;" class="fb-like" data-href="" data-width="22" 
					data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
		</div>
		<div class="aricles-widgets-item">	
				<div style="display: inline-block; margin-left: 40px;">
					<a target="_blank" class="mrc__plugin_uber_like_button" href="http://connect.mail.ru/share" data-mrc-config="{'cm' : '1', 'sz' : '20', 'st' : '2', 'tp' : 'mm'}">Нравится</a>
					<script src="http://cdn.connect.mail.ru/js/loader.js" type="text/javascript" charset="UTF-8"></script>
				</div>
		</div>
		<div class="aricles-widgets-item">
		<div style="display: inline-block; margin-left: -150px;">
					<a href="https://twitter.com/share" class="twitter-share-button" 
					data-via="twitterapi" data-lang="en">Tweet</a>
					<script>!function(d,s,id)
					{var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id))
					  {
						js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js"; 
						fjs.parentNode.insertBefore(js,fjs);}}
						(document,"script","twitter-wjs");</script>	
				    </div>
		</div>
	</div>
	
	
	<div style="position:relative; display: inline-block; width:900px; padding-left: 30px">		
		<div class="preview_block">
  			 <p class="preview_text"><?php echo $article['title'];?></p>
		</div>
	</div>
					
	<div style="position:relative; display: inline-block; width:1000px; padding-left:50px;">			
		<div style="display: inline-block;">
			<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>					
			<script type="text/javascript">
			VK.init({apiId: 4031759, onlyWidgets: true});
			</script>
			
			<div id="vk_comments"></div>
			<script type="text/javascript">
			VK.Widgets.Comments("vk_comments", {limit: 15, width: "600", attach: "*"});
			</script>
		</div>	
							
						
	</div>
								
	<div class="main-bottom">
			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/Earth.png" alt="video" width="36" height="36" align="left" style="margin: 5px;"/>
			<div style="display: inline-block; margin-left: 40px; margin-top: 15px;"><?php echo $article['date'];?></div>
			<div style="display: inline-block; margin-left: 40px; margin-top: 15px;"><?php echo $article['display_name'];?> </div>
			<div style="display: inline-block; margin-left: 40px; margin-top: 15px;"><?php echo $article['cat_name'];?> </div>
	</div>
	
</div>