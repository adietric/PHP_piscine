<?PHP
	session_start();
	if ($_GET['submit'] && $_GET['submit'] === 'OK' && $_GET['login'] && $_GET['passwd'])
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
?>
<html><body>
	<form method="GET" >
		Identifiant: <input type="text" name="login" maxlength="200" value="<?php echo ($_SESSION['login'])?>" />
		<br/>
		Mot de passe: <input type="password" name="passwd" maxlength="200" value="<?php echo ($_SESSION['passwd'])?>" />
		<input type="submit" name="submit" value="OK" />
	</form>
</body></html>

