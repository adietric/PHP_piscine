#!/usr/bin/php
<?PHP

function	trans($str, $i)
{
	$tab = explode("\n", $str);
	$tab[0] = $i;
	foreach ($tab as $i => $value)
		if (strcmp($value, "") === 0)
			unset($tab[$i]);
	$final = implode("\n", $tab);
	return ($final);
}

if (!($argv[1]) || $argc !== 2)
	return;
$str = @file_get_contents($argv[1]);
$tab = @explode(PHP_EOL.PHP_EOL, $str);
preg_match_all("/[0-9]{2}:[0-9]{2}:[0-9]{2},[0-9]{3} --> [0-9]{2}:[0-9]{2}:[0-9]{2},[0-9]{3}/", $str, $num);
$number = count($num[0]);
$nb_t = count($tab);
if ($nb_t !== $number)
{
	echo ("Invalid File\n");
	return;
}
foreach($tab as $i => $tab_v)
{
	$tab_r = explode("\n", $tab_v);
	if (!(preg_match ("/^[0-9]{2}:[0-9]{2}:[0-9]{2},[0-9]{3} --> [0-9]{2}:[0-9]{2}:[0-9]{2},[0-9]{3}$/", $tab_r[1]))
		|| !(ctype_digit($tab_r[0])))
	{
		echo ("Invalid File\n");
		return;
	}
	$final_tab[] = $tab_r[1].",".$i;
}
sort($final_tab);
foreach ($final_tab as $fi => $f_t)
{
	if ($fi > 0)
		echo("\n\n");
	$nb = substr($f_t, -1);
	$tab[$nb] = trans($tab[$nb], $fi + 1);
	echo($tab[$nb]);
}
	echo("\n");
?>