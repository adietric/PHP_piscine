#!/usr/bin/php
<?PHP
if ($argv[1])
{	
	$my_str = $argv[1];
	$final = trim($my_str, " ");
	$my_str = preg_replace('!\s+!', ' ', $final);
	echo $my_str;
	echo ("\n");
}
?>