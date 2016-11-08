<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
	<title>BandsIT.ru</title>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8 "></meta>
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/js/styles/railscasts.css"></link>
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/css/style.css"></link>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/js/menu.js"></script>
	<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/js/other.js"></script>	
</head>
<body>

<div class="wrap">
	<div class="center">
		<?php controller::Get_metod_controller('login','index');?>
	</div>
</div>	
</body>
</html>