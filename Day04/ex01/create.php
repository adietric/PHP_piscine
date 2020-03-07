<?PHP
	if ($_POST['submit'] && $_POST['submit'] === 'OK' && $_POST['login'] && $_POST['passwd'])
	{
		$file_content = NULL;
		if (file_exists("../private") === FALSE)
			mkdir("../private");
		if (file_exists("../private/passwd"))
			$file_content = unserialize(file_get_contents("../private/passwd"));
		if (!($file_content))
		{
			$tab['login'] = $_POST['login'];
			$tab['passwd'] = hash('whirlpool', $_POST['passwd']);
			$tab_f[] = $tab;
			file_put_contents("../private/passwd", serialize($tab_f));
			echo("OK\n");
		}
		else if ($file_content)
		{
			$false = 0;
			foreach ($file_content as $i => $val)
				if ($val['login'] === $_POST['login'])
					$false = 1;
			if ($false === 1)
					echo("ERROR\n");
			else
			{
				$n_tab['login'] = $_POST['login'];
				$n_tab['passwd'] = hash('whirlpool', $_POST['passwd']);
				$file_content[] = $n_tab;
				file_put_contents("../private/passwd", serialize($file_content));
				echo("OK\n");
			}
		}
	}
	else
		echo("ERROR\n");
?>