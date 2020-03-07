#!/usr/bin/php
<?PHP
if ($argv[1])
{
	$my_str = $argv[1];
	$tab = explode(' ', $my_str);
	$wrong = 0;
	foreach($tab as $i => $value)
		;
	if ($i !== 4)
	{
		echo("Wrong Format\n");
		return ;
	}
	date_default_timezone_set('Europe/Paris');
	if (!(preg_match("/^[Ll]undi /", $my_str) === 1)
		&& !(preg_match("/^[Mm]ardi /", $my_str) === 1)
		&& !(preg_match("/^[Mm]ercredi /", $my_str) === 1)
		&& !(preg_match("/^[Jj]eudi /", $my_str) === 1)
		&& !(preg_match("/^[Vv]endredi /", $my_str) === 1)
		&& !(preg_match("/^[Ss]amedi /", $my_str) === 1)
		&& !(preg_match("/^[Di]manche /", $my_str) === 1))
		$wrong = 1;
	if (!(preg_match("/[a-z] [0-9] [a-zA-z]/", $my_str) === 1)
		&& !(preg_match("/[a-z] [0-9][0-9] [a-zA-z]/", $my_str) === 1))
		$wrong = 1;
	if (!(preg_match("/[0-9] [Jj]anvier [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Ff](e|é)vrier [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Mm]ars [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Aa]vril [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Mm]ai [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Jj](uin|uillet) [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Aa]o(u|û)t [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Ss]eptembre [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Oo]ctobre [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Nn]ovembre [0-9]/", $my_str) === 1)
		&& !(preg_match("/[0-9] [Dd](e|é)cembre [0-9]/", $my_str) === 1))
		$wrong = 1;
	if (!(preg_match("/(e|r|s|l|i|n|t) [0-9][0-9][0-9][0-9] [0-9]/", $my_str) === 1))
		$wrong = 1;
	if (!(preg_match("/[0-9] [0-9][0-9]:[0-9][0-9]:[0-9][0-9]$/", $my_str) === 1))
		$wrong = 1;
	if ($wrong === 1)
	{
		echo("Wrong Format\n");
		return ;	
	}
	if (preg_match("/[Jj]anvier/", $my_str) === 1)
		$month = "01";
	else if (preg_match("/[Ff](e|é)vrier/", $my_str) === 1)
		$month = "02";
	else if (preg_match("/[Mm]ars/", $my_str) === 1)
		$month = "03";
	else if (preg_match("/[Aa]vril/", $my_str) === 1)
		$month = "04";
	else if (preg_match("/[Mm]ai/", $my_str) === 1)
		$month = "05";
	else if (preg_match("/[Jj]uin/", $my_str) === 1)
		$month = "06";
	else if (preg_match("/[Jj]uillet/", $my_str) === 1)
		$month = "07";
	else if (preg_match("/[Aa]o(u|û)t/", $my_str) === 1)
		$month = "08";
	else if (preg_match("/[Ss]eptembre/", $my_str) === 1)
		$month = "09";
	else if (preg_match("/[Oo]ctobre/", $my_str) === 1)
		$month = "10";
	else if (preg_match("/[Nn]ovembre/", $my_str) === 1)
		$month = "11";
	else if (preg_match("/[Dd](e|é)cembre/", $my_str) === 1)
		$month = "12";
	$date = $tab[3].'-'.$month.'-'.$tab[1].' '.$tab[4];
	$hour = explode(":", $tab[4]);
	echo mktime($hour[0], $hour[1], $hour[2], $month, $tab[1], $tab[3])."\n";
}
?>
