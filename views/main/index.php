<div class="main-content">

<!------------------------->	

<div class="main-container-block"> 
 <?php 
 $i=1;
 if (count($articles) < 1)
 {
 	echo "<center> <h1>В данном разделе пока нет материалов.</h1></center>";
 }
 
 else
 
 {
 
 	foreach ($articles as $article) 
 		{
 ?>
 <div class="main-item" id="<?php echo $article['id_article'];?>">
	<p class="main-item-p"><?php echo $article['name'];?></p>
	<p class="main-item-title"><?php echo $article['title'];?></p>
	<div class="main-bottom-block">
			<img style="float: left;  margin-top: 15px;" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/Writing.png" alt="writing" width="36" height="36" align="left"/>
			<div style="float: left;  margin-top: 25px;"><p><?php echo $article['date'];?></p></div>
			<div style="float: left;  margin-top: 25px;"><p><?php echo $article['cat_name'];?></p></div>
			<div style="float: left;  margin-top: 25px;"><p><?php echo $article['display_name'];?></p></div>
			<div class="main-more">		
			<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/article/get_article/<?php echo $article['id_article'];?>">Подробнее</a>
			</div>
	</div>
		
 </div>
<?php 
 	$i++; 
 			}
 		}
 ?>

</div>
</div>
