<div class="empty"></div>
<div class="empty"></div>
	<div class="admin-block" style="width: 1080px;">	 
	 	<?php echo "Пользователь";?>
	 </div>
<div class="empty"></div>

<form action="http://bandsit.ru/admin/group/insert" method="post"  enctype="multipart/form-data">
	
	<div class="admin-block" style="width: 345px; height: 280px;">
	<label for="display_name" >Отображаемое имя</label>
	<input type="text"  name="name"  style="width: 335px;" value="<?php echo $group['name'];?>"/>
		
	<label for="title">Описание</label>
	<input type="text"  name="title" style="width: 335px;" value="<?php echo $group['title'];?>"/>
	
	<input type="submit" style="width: 75px;">
	</div>
	
</form>