<?php
	session_start();
	include './auth.php';
	if ($_POST['login'] && $_POST['passwd'])
	{
		if (auth($_POST['login'], $_POST['passwd']) === TRUE)
			$_SESSION['loggued_on_user'] = $_POST['login'];
		else
		{
			$_SESSION['loggued_on_user'] = "";
			echo "ERROR\n";
			return ;
		}
	}
	else
	{
		echo "ERROR\n";
		return ;
	}
?>
<html><body>
<iframe name="chat" src="./chat.php" width="100%"height="550px"></iframe>
<iframe name="speak" src="./speak.php" width="100%" height="50px"></iframe>
</body></html>
