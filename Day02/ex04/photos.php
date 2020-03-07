#!/usr/bin/php
<?PHP
if (!($argv[1]))
	return;
$fd = curl_init($argv[1]);
curl_setopt($fd, CURLOPT_RETURNTRANSFER, true);
$str = curl_exec($fd);
preg_match_all("/<img( .*? | +)src *= *\"(.*?)\".*?>/", $str, $tab);
foreach ($tab as $i => $value)
	if ($i > 1)
		foreach($value as $ii => $value_i)
		{
			$name = substr(strrchr($value_i, "/"), 1);
			$direct = substr(strrchr($argv[1], "/"), 1);
			if (file_exists($direct) === FALSE)
				mkdir($direct);
			$false = @file_get_contents($value_i);
			if ($false === false)
				@file_put_contents("./".$direct."/".$name, @file_get_contents($argv[1]."/".$value_i));
			else
				@file_put_contents("./".$direct."/".$name, @file_get_contents($value_i));
		}
?>