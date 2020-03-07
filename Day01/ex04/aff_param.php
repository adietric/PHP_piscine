#!/usr/bin/php
<?PHP
$tab = $argv;
unset($tab[0]);
$tab = array_values($tab);
$i = 0;
foreach($tab as $k)
	echo("$k\n");
?>