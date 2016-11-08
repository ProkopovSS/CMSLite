<div class="empty"></div>
	<div class="admin-block" style="width: 1080px;">	 
	 	<?php echo "Пользователь-".$user['display_name'];?>
	 </div>
<div class="empty"></div>

<form action="http://bandsit.ru/admin/users/insert" method="post"  enctype="multipart/form-data">
	
	<div class="admin-block" style="width: 345px; height: 280px;">
	<label for="display_name" >Отображаемое имя</label>
	<input type="text"  name="display_name" id="name" style="width: 335px;" value="<?php echo $user['display_name'];?>"/>
		
	<label for="title">e-mail</label>
	<input type="text"  name="e-mail" id="name" style="width: 335px;" value="<?php echo $user['e-mail'];?>"/>
	
	<label for="title">Пароль</label>
	<input type="text"  name="password" id="name" style="width: 335px;" value="<?php echo $user['password'];?>"/>
	
	<label for="title">Группа</label>
	<select name="group_id" style="width: 335px;">
				<?php foreach ( $groups as $group ) 
				{?>
				<option value="<?php echo $group["id"]?>"><?php echo $group["name"]?></option>
				<?php }?>
			</select>
	
	<input type="submit" style="width: 75px;">
	</div>
	
</form>