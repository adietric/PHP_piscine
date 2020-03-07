<?php
if ($_GET['action'] === 'set' && $_GET['value'] && $_GET['name'])
	setcookie($_GET['name'], $_GET['value']);
else if ($_GET['action'] === 'get' && $_COOKIE[$_GET['name']])
	echo ($_COOKIE[$_GET['name']])."\n";
else if ($_GET['action'] === 'del' && $_GET['name'])
	setcookie($_GET['name'], NULL, time()-1);
?>