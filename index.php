<?php
include('Classes/controller.php');
include('Classes/database.php');
include('Classes/Security.php');
security::init($_SERVER['REQUEST_URI']);
?>

