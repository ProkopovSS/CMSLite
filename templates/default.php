<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
	<title><?php echo $_SERVER['SERVER_NAME'];?></title>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8 ">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/js/styles/railscasts.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/css/style.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>

<!-- menu -->
<div class="menu-container">
	<div class="menu-container-item">
	<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">Главная</a>
	</div>
</div>
<!-- end menu -->

<div class="wrap">
<!-- content -->
	<div class="center">
	<?php controller::Get_metod_controller('tags','index');?>
	<?php controller::init();?>
	</div>
<!-- end content-->


</div>	
<!-- footer -->
<div  class="footer">
	<div class="footer-container">
		<div class="footer-item">
			Главная
		</div>
		<div class="footer-item">
			Регистрация
		</div>
		<div class="footer-item">
			Поддержка
		</div>
	</div>
</div>
<!-- footer -->

</body>
</html>