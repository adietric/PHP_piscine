#!/usr/bin/php
<?PHP
function check_if_ok($tab, $check)
{
	$tab = explode(";", $tab);
	foreach($check as $i => $value)
		if ($i > 0)
			if($check[$i - 1] !== $check[$i])
			{
				echo("Attention, il faut que les paramètres soient de la même entrée. Réessayer\n");
				return (1);
			}
	foreach($check as $i => $value)
	{
		$ok = 0;
		foreach($tab as $ii => $value_i)
			if (strcmp($value_i, $value) === 0)
				$ok = 1;
		if ($ok === 0)
			{
				echo( "\"".$check[$i]."\" est inexistant dans le file. Veuillez recommencer\n");
				return (1);
			}
	}
	return (0);
}

function	nume_of($cequonveux, $mot_clef)
{
	foreach	($cequonveux as $i => $value)
		foreach ($mot_clef as $ii => $clef)
			if(strcmp($clef, $value) === 0)
				$cequonveux[$i] = $ii;
	return($cequonveux);
}

if ($argc > 2)
{
	$ok = 0;
	if (@file_get_contents($argv[1]) === FALSE)
		return ;
	$file = @file_get_contents($argv[1]);
	$tab = @explode("\n", $file);
	$mot_clef = @explode(";", $tab[0]);
	foreach ($mot_clef as $i => $value)
		if (strcmp($value, $argv[2]) === 0)
		{
			$reference = $value;
			$reference_i = $i;
			$ok = 1;
		}
	if ($ok === 0)
		return;
	$fd = fopen("php://stdin", 'r');
	echo ("Entrez votre commande: ");
	while ($str = fgets(STDIN))
	{
		if (strcmp($str, "\n") === 0)
		{
			echo ("Entrez votre commande: ");
			continue;
		}
		$final_tab = array();
		if (preg_match_all('/\[\'(.*?)\'\]/', $str, $d) !== FALSE)
		foreach ($d as $i => $dequi)
			if ($i > 0)
				$de_qui = $dequi[0]; 
		if (check_if_ok($file, $dequi) === 1)
		{
			echo ("Entrez votre commande: ");
			continue;
		}
		if (preg_match_all('/\$(.*?)\[/', $str, $c) !== FALSE)
		foreach ($c as $i => $cequonveux)
			if ($i > 0)
				$cequonveux = nume_of($cequonveux, $mot_clef);
		foreach ($tab as $tab_i => $tab_value)		
		{
			$search = explode(";", $tab_value);
			foreach ($search as $iii => $search_i)
				if (strcmp($search_i, $de_qui) === 0)
					$cette_tab = $search;
		}
		$my_str = (preg_split('/(\$.*?\[.*?])/', $str));
		foreach($cequonveux as $ii => $value_ce)
		{
			$final_tab[] = $my_str[$ii];
			if ($value_ce === 3)
				$final_tab[] = "\"";
			$final_tab[] = $cette_tab[$value_ce];
			if ($value_ce === 3)
				$final_tab[] = "\"";
		}
		while ($my_str[$ii++])
			$final_tab[] = $my_str[$ii];
		$false = @implode("", $final_tab);
		
		
		
		
		if (strcmp($false, "") === 0)
		{
			echo ("PHP Parse error:  syntax error, unexpected T_STRING in [....]\n");
			echo ("Entrez votre commande: ");
			continue;
		}
		$final = @implode("", $final_tab);
		try {
            eval($final);
        } catch(ParseError $fail) {
           	echo ("PHP Parse error:  syntax error, unexpected T_STRING in [....]\n");
			echo ("Entrez votre commande: ");
			continue;
        }
		echo ("Entrez votre commande: ");
	}
	if(!($str = fgets(STDIN)))
		echo ("^D\n");
}
?>