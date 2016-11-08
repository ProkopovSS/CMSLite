<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
	<title><?php echo $_SERVER['SERVER_NAME'];?></title>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8 ">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/romandor/js/styles/railscasts.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/romandor/css/admin.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>
<body>

<div class="wrap">


<!-- content -->
	<div class="center-admin">
		
	<!-- menu -->
<div class="menu-container-admin">
	<div class="menu-container-item-admin">
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>" target="_blank">
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/home.png" alt="video" width="64" height="64" align="middle"/>
		<p>Сайт</p>
	</a>
	</div>
	<div class="menu-container-item-admin">
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/article/index">
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/articles.png" alt="video" width="64" height="64" align="middle"/>
		<p>Статьи</p>
	</a>
	</div>
	<div class="menu-container-item-admin">
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/tags/indexTags">
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/tags.png" alt="video" width="64" height="64" align="middle"/>
		<p>Теги</p>
	</a>
	</div>
	<div class="menu-container-item-admin">
      <!--http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/photo/indexPhoto-->
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/menu/indexMenu">
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/alacarte.png" alt="video" width="64" height="64" align="middle"/>
		<p>Меню</p>
	</a>
	</div>
	<div class="menu-container-item-admin">
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/gallery/indexGallery">
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/photo.png" alt="video" width="64" height="64" align="middle"/>
		<p>Фото</p>
	</a>
	</div>
		<div class="menu-container-item-admin">
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/users/index">
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/user.png" alt="video" width="64" height="64" align="middle"/>
		<p>Люди</p>
	</a>
	</div>
	<div class="menu-container-item-admin">
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/group/index">
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/groups.png" alt="video" width="64" height="64" align="middle"/>
		<p>Группы</p>
	</a>
	</div>
	<div class="menu-container-item-admin">
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/rules/index">
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/rules.png" alt="video" width="64" height="64" align="middle"/>
		<p>Доступ</p>
	</a>
	</div>
	<div class="menu-container-item-admin">
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/login/log_out">
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/images/logout.png" alt="video" width="64" height="64" align="middle"/>
		<p>Выход</p>
	</a>
	</div>
</div>
<!-- end menu -->	
	<?php controller::init();?>
	</div>
<!-- end content-->

</div>	


</body>
</html>