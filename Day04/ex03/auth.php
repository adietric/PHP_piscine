<?php

function auth($login, $passwd)
{
	if (!(file_exists("../private/passwd")) || !($passwd) || !($login))
		return FALSE;
	$file_content = unserialize(file_get_contents("../private/passwd"));
	foreach ($file_content as $i => $val)
		if ($val['login'] === $login
			&& $val['passwd'] === hash('whirlpool', $passwd))
			return TRUE;
	return FALSE;
}
?>