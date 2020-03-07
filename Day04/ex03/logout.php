<?php
session_start();
if ($_SESSION)
	$_SESSION['loggued_on_user'] = NULL;
?>