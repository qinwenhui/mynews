<?php
header("Content-type:text/html;charset=utf-8");
define("SERVER_ROOT", dirname(__FILE__));
define("SITE_ROOT","localhost");			

require_once(SERVER_ROOT . '/controllers/' . 'router.php');
?>