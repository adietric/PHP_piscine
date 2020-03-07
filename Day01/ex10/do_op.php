#!/usr/bin/php
<?PHP
if ($argc != 4)
	echo ("Incorrect Parameters\n");
else
{
	$nb_1 = trim($argv[1], "/[ \t]/"); 
	$nb_2 = trim($argv[3], "/[ \t]/"); 
	$oper = trim($argv[2], "/[ \t]/");
	if ($oper === '+')
		echo($nb_1 + $nb_2);	
	else if ($oper === '-')
		echo($nb_1 - $nb_2);	
	else if ($oper === '*')
		echo($nb_1 * $nb_2);
	else if ($oper === '/')
		echo($nb_1 / $nb_2);	
	else if ($oper === '%')
		echo($nb_1 % $nb_2);
	echo("\n");
}
?>