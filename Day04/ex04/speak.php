<?php
	session_start();
	date_default_timezone_set('Europe/Paris');
	if ($_SESSION['loggued_on_user'])
	{
		if ($_POST['submit'] === 'OK' && $_POST['msg'])
		{
			if ((file_exists('../private/chat') === TRUE)
				&& ($fd = fopen('../private/chat', 'r')) != NULL)
			{
				if (flock($fd, LOCK_EX))
				{
					$msg_tab = unserialize(file_get_contents('../private/chat'));
					$msg = ['login' => $_SESSION['loggued_on_user'], 'time' => time(), 'msg' => $_POST['msg']];
					$msg_tab[] = $msg;
					file_put_contents('../private/chat', serialize($msg_tab));
					flock($fd, LOCK_UN);
				}
				else
					return ;
				fclose($fd);
			}
			else
			{
				$msg = ['login' => $_SESSION['loggued_on_user'], 'time' => time(), 'msg' => $_POST['msg']];
				$msg_tab[] = $msg;
				file_put_contents('../private/chat', serialize($msg_tab));
			}
		}
	}
	else
	{
		echo "ERROR\n";
		return ;
	}
?>
<html>
	<head>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
		<form action="speak.php" target="speak" method="POST">
				<input name="msg" type="text">
				<input name="submit" type="submit" value="OK">
			</form>
	</body>
</html>
