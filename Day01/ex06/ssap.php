#!/usr/bin/php
<?PHP
if ($argv[1])
{	
	$my_tab = $argv;
	$final = array();
	unset($my_tab[0]);
	foreach ($my_tab as $tab_str)
	{
		$tab_str = trim($tab_str, " "); 
		$my_str = preg_replace('/\s+/', ' ', $tab_str);
		$fin = explode(" ", $my_str);
		$final = array_merge ($final , $fin);
	}
	sort($final, SORT_STRING);
	foreach($final as $r)
		echo ("$r\n");
}
?>