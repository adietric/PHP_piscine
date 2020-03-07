#!/usr/bin/php
<?PHP
if ($argv[1])
{
	$final = array();
	$my_str = $argv[1];
	$my_str = trim($my_str, " "); 
	$my_str = preg_replace('!\s+!', ' ', $my_str);
	$fin = explode(" ", $my_str);
	$last_w = $fin[0];
	unset($fin[0]);
	foreach($fin as $r)
		echo ("$r ");
	echo ("$last_w\n");
}
?>