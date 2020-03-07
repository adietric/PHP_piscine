<?php
	session_start();
	date_default_timezone_set('Europe/Paris');
	if ($_SESSION['loggued_on_user'])
	{
		if ((file_exists('../private/chat') === TRUE))
		{
			if (($fd = fopen('../private/chat', 'r')) === FALSE)
				echo "ERROR\n";
			if (flock($fd, LOCK_EX))
			{
				$msg_tab = unserialize(file_get_contents('../private/chat'));
				flock($fd, LOCK_UN);
			}
			else
				return ;
			fclose($fd);
		}
		if ($msg_tab)
		{
			foreach($msg_tab as $i => $msg)
				echo date('[d/m/Y-H:i] ', $msg['time']).$msg['login'].": ".$msg['msg']."<br />\n";
		}
	}
?>

<html>
	<body>
		<form action="chat.php" target="chat" method="POST"></form>
	</body>
</html>
