#!/usr/bin/php
<?PHP

function	find_($login, $id, $int)
{
	$str_finger = shell_exec("finger $login");
	$tab = explode("\n", $str_finger);
	foreach($tab as $i => $value)
	{
		if ($i > 1)
		{
			$value = preg_replace('/\s+/', ' ', $value);
			$tab_r = explode(" ", $value);
			if ($int === 0 && strcmp($tab_r[8], "$id,") === 0)
				return ($tab_r[3]);
			else if ($int === 1 && strcmp($tab_r[8], "$id,") === 0)
				return ($tab_r[4]);
		}
	}
}
	$str = shell_exec('w');
	$tab = explode("\n", $str);
	$final = array ();
	foreach($tab as $i => $value)
	{
		if ($i > 1)
		{
			$value = preg_replace('/\s+/', ' ', $value);
			$tab_r = explode(" ", $value);
			if ($i === 2)
				$final[$i - 2] = array ($tab_r[0], $tab_r[1], "", "", $tab_r[3]);
			else
				$final[$i - 2] = array ($tab_r[0], "tty".$tab_r[1], "", "", $tab_r[3]);
		}
	}
	unset($final[$i - 2]);
	foreach($final as $i => $value)
	{
		$final[$i][2] = find_($final[$i][0], $final[$i][1], 0);
		$final[$i][3] = find_($final[$i][0], $final[$i][1], 1);
		if ($i === 0)
		{
			$tmp_month = $final[$i][2]; 
			$tmp_date = $final[$i][3]; 
		}
	}
	$taille = array (0, 0, 0, 0 ,0);
	foreach($final as $i => $value)
		foreach ($value as $ii => $value_i)
			if (strlen($value_i) > $taille[$ii])
				$taille[$ii] = strlen($value_i);
	$taille[1] += 1;
	foreach($final as $i => $value)
	{
		if ($i > 0)
			echo "\n";
		foreach ($value as $m => $value_m)
		{
			if ($m === 2 && strcmp($value_m, "") === 0)
				echo str_pad($tmp_month, $taille[$m] + 1, " ");
			else if ($m === 3 && strcmp($value_m, "") === 0)
				echo str_pad($tmp_date, $taille[$m] + 1, " ");
			else 
				echo str_pad($value_m, $taille[$m] + 1, " ");
		}
	}
	echo "\n";
?>