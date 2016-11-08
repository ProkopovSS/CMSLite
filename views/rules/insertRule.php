<div class="empty"></div>
	<div class="admin-block" style="width: 1080px;">	 
	 	<?php echo "Правило - разрешить группе пользователей доступ к разделу".$rule['rules'];?>
	 </div>
<div class="empty"></div>

<form action="/admin/rules/insert" method="post"  enctype="multipart/form-data">
	
	<div class="admin-block" style="width: 345px; height: 280px;">
	<label for="display_name" >Правило</label>
	<input type="text"  name="rules" id="name" style="width: 335px;" value="<?php echo $rule['rules'];?>"/>
		
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