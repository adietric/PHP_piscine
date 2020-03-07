#!/usr/bin/php
<?PHP
if ($argv[1])
{
	$my_str = $argv[1];
	$my_str = preg_replace("/\s+/", ' ', $my_str);
	$my_str = preg_replace("/^\s*/", '', $my_str);
	$my_str = preg_replace("/\s*$/", '', $my_str);
	echo $my_str."\n";
}
?>