<?php
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === 'OK')
	{
		if ((file_exists('../private') === FALSE))
		{
			mkdir('../private');
			$user = ['login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd'])];
			$users_storage[] = $user;
			file_put_contents('../private/passwd', serialize($users_storage));
			header('Location: ./index.html');
			echo "OK\n";
			return ;
		}
		else
		{
			if ((file_exists('../private/passwd') === TRUE))
			{
				$users_storage = unserialize(file_get_contents('../private/passwd'));
				foreach($users_storage as $user)
					if ($user['login'] === $_POST['login'])
					{
						echo "ERROR\n";
						return ;
					}
			}
			$user = ['login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd'])];
			$users_storage[] = $user;
			file_put_contents('../private/passwd', serialize($users_storage));
			header('Location: ./index.html');
			echo "OK\n";
			return ;
		}
	}
	echo "ERROR\n";
?>
