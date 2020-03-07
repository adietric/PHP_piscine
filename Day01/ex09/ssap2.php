#!/usr/bin/php
<?PHP
function	sort_pers($a, $b)
{
	$i = 0;
	$val_tmp_a;
	$val_tmp_b;
	while ($a[$i] && $b[$i])
	{
		if (!(ctype_alpha($a[$i])) && ctype_alpha($b[$i]))
			return (1);
		if (ctype_alpha($a[$i]) && !(ctype_alpha($b[$i])))
			return (0);
		else if ((!(ctype_alpha($a[$i])) && !(ctype_digit($a[$i]))) && ctype_digit($b[$i]))
			return (1);
		else if (ctype_digit($a[$i]) && !(ctype_digit($b[$i])) && !(ctype_alpha($b[$i])))
			return (0);
		else if (ctype_alpha($a[$i]) && ctype_alpha($b[$i]))
		{
			if (($a[$i] >= 'a' && $a[$i] <= 'z') && ($b[$i] >= 'A' && $b[$i] <= 'Z'))
			{
				$val_tmp_a =  strtoupper($a[$i]);
				$val_tmp_b = $b[$i];
			}
			else if (($b[$i] >= 'a' && $b[$i] <= 'z') && ($a[$i] >= 'A' && $a[$i] <= 'Z'))
			{
				$val_tmp_b =  strtoupper($b[$i]);
				$val_tmp_a = $a[$i];
			}
			else
			{
				$val_tmp_a = $a[$i];
				$val_tmp_b = $b[$i];
			}
			if ($val_tmp_a > $val_tmp_b)
				return (1);
			if ($val_tmp_a === $val_tmp_b)
			{
				$i++;
				continue;
			}
			return (0);	
		}
		else if (ctype_digit($a[$i]) && ctype_digit($b[$i]))
		{
			if ($a[$i] > $b[$i])
				return (1);
		}
		else if (!(ctype_digit($a[$i])) && !(ctype_digit($b[$i]))
		&& !(ctype_alpha($a[$i])) && !(ctype_alpha($b[$i]))) 
		{
			if ($a[$i] > $b[$i])
				return (1);
		}
		$i++;
	}
}
if ($argv[1])
{
	$my_tab = $argv;
	$final_tab = array();

	unset($my_tab[0]);
	foreach ($my_tab as $tab_str)
	{
		$tab_str = trim($tab_str, " "); 
		$my_str = preg_replace('!\s+!', ' ', $tab_str);
		$fin = explode(" ", $my_str);
		$final_tab = array_merge ($final_tab , $fin);
	}
	usort($final_tab, "sort_pers");
	foreach($final_tab as $r)
		echo ("$r\n");
}
?>