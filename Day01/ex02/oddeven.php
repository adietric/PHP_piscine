#!/usr/bin/php
<?PHP
$fd = fopen("php://stdin", 'r');
$inf = 0;
while ($inf !== 1)
{
	echo("Entrez un nombre: ");
	if(!($nb_str = fgets(STDIN)))
	{
		echo ("^D\n");
		break;
	}
	$nb_str = str_replace("\n","",$nb_str);
	if ((ctype_digit($nb_str) 
	|| (($nb_str[0] === '-' ||  $nb_str[0] === '+')
	&& ctype_digit(substr($nb_str, 1)))))
	{
		$mod = substr($nb_str, -1);
		$mod = $mod % 2;
		if ($mod === 0)
			echo("Le chiffre $nb_str est Pair\n");
		else
			echo("Le chiffre $nb_str est Impair\n");
	}
	else
		echo("'$nb_str' n'est pas un chiffre\n");
}
fclose($fd)
?>
