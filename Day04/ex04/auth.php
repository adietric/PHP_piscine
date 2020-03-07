<?php
	function auth($login, $passwd)
	{
		if (@file_get_contents('../private/passwd') === FALSE)
			return FALSE;
		$users_storage = unserialize(file_get_contents('../private/passwd'));
		foreach($users_storage as $user)
		{
			if ($user['login'] === $login && $user['passwd'] === hash('whirlpool', $passwd))
				return TRUE;
		}
		return FALSE;
	}
?>
