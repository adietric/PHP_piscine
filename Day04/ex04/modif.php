<?php
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] === 'OK')
	{
		if (@file_get_contents('../private/passwd') === FALSE)
		{
			echo "ERROR1111\n";
			return ;
		}
		$users_storage = unserialize(file_get_contents('../private/passwd'));
		foreach($users_storage as &$user)
		{
			if ($user['login'] === $_POST['login'])
			{
				if ($user['passwd'] !== hash('whirlpool', $_POST['oldpw']))
				{
					echo "ERROR\n";
					return ;
				}
				$user['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($users_storage));
				header('Location: ./index.html');
				echo "OK\n";
				return ;
			}
		}
	}
	echo "ERROR\n";
?>
