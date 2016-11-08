<div class="empty"></div>
	<div class="admin-block" style="width: 1080px;">	 
	 	<?php echo "Тег-".$tag['name'];?>
	 </div>
<div class="empty"></div>

<form action="http://bandsit.ru/admin/tags/insert" method="post"  enctype="multipart/form-data">
	
	<div class="admin-block" style="width: 345px; height: 280px;">
	<label for="name" >Название</label>
	<input type="text"  name="name" id="name" style="width: 335px;" value="<?php echo $tag['name'];?>"/>
		
	<label for="title">Описание</label>
			
	<textarea name="title" id="title"  cols="45"  rows="4"><?php echo $tag['title'];?></textarea>

	<input type="submit" style="width: 75px;">
	</div>
	
</form>