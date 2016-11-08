<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="http://bandsit.ru/editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm1",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<div class="empty"></div>
	<div class="admin-block" style="width: 1080px;">	 
	 	<?php echo "Материал-".$article['name'];?>
	 </div>

<div class="empty"></div>
	
 
<form action="http://bandsit.ru/admin/article/update" method="post"  enctype="multipart/form-data">
	<div class="admin-block" style="width: 700px;">	
		<div style="font-size: 16;">	
		
			<label for="editor1">Редактор</label>	
			
			<textarea id="elm1" name="text" coll="80"  rows="30"><?php echo $article['text'];?></textarea>
		
		</div>
	</div>
	
	<div class="admin-block" style="width: 345px;">
	<label for="name" >Название</label>
	<input type="text"  name="name" id="name" style="width: 335px;" value="<?php echo $article['name'];?>"/>
	
	<label for="categori">Категория</label>
		<select name="categori" style="width: 335px;">
			<?php foreach ( $categories as $cat ) 
				{?>
				<option <?php if($cat["id_category"]==$article['ss_categories_id_category']) echo 'selected'?> value="<?php echo $cat["id_category"]?>"><?php echo $cat["name"]?></option>
				<?php }?>
		</select>

	<label for="user">Пользователь</label>
			
			<select name="user" style="width: 335px;">
				<?php foreach ( $users as $user ) 
				{?>
				<option  <?php if($user["id_user"]==$article['ss_users_id_user']) echo 'selected'?> value="<?php echo $user["id_user"]?>"><?php echo $user["display_name"]?></option>
				<?php }?>
			</select>
		
	<label for="title">Описание</label>
			
		<textarea name="title" id="title"  style="width: 335px;"  rows="4"><?php echo $article['title'];?></textarea>
		
	</br>
	</br>
	<label for="status">Отображать материал</label>
		
		<input type="checkbox" name="status" checked="<?php if ($article['status']) echo "true"; else echo "false";?>" />
	
		<input type="hidden"  name="id_article" value="<?php echo $article['id_article'];?>"/>
		</br>
		</br>
		<input type="submit" style="width: 75px;">
	</div>
</form>