<div class="empty"></div>
	<div class="admin-block" style="width: 1080px;">	 
	 	<?php echo "Фото-".$photo['title'];?>
	 </div>
<div class="empty"></div>

<form action="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/photo/insert" method="post"  enctype="multipart/form-data">
	
	<div class="admin-block" style="width: 345px; height: 280px;">
	
	<label for="name" >Файл</label>
	<input type="file"  name="photo"/>
		
	<label for="name" >Название</label>
	<input type="text"  name="name" id="name" style="width: 335px;" value="<?php echo $photo['name'];?>"/>
		
	<label for="title">Описание</label>
	<textarea name="title" id="title"  style="width: 335px;"  rows="4"><?php echo $photo['title'];?></textarea>
	
	<input type="submit" style="width: 75px;">
	</div>
	
</form>
</form>
