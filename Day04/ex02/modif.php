<?PHP
	if ($_POST['submit'] && $_POST['submit'] === 'OK' && $_POST['login'] && $_POST['oldpw']
		&& $_POST['newpw'])
	{
		$true = 0;
		if (file_get_contents("../private/passwd") === FALSE)
		{
			echo("ERROR\n");
			return;
		}
		$file_content = unserialize(file_get_contents("../private/passwd"));
		foreach ($file_content as $i => &$val)
			if ($val['login'] === $_POST['login'])
			{
				$true = 1;
				break;
			}
		if ($true === 0)
			echo("ERROR\n");
		else
		{
			$check_old = hash('whirlpool', $_POST['oldpw']);
			if ($check_old !== $val['passwd'])
			{
				echo("ERROR\n");
				return;
			}
			else
				$val['passwd'] = hash('whirlpool', $_POST['newpw']); 
			$file_content[] = $val;
			file_put_contents("../private/passwd", serialize($file_content));
			echo("OK\n");
		}
	}
	else
		echo("ERROR\n");
?>