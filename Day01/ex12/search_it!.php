#!/usr/bin/php
<?PHP
if ($argc >= 3)
{
	$key = $argv[1];
	foreach($argv as $i => $val)
	{
		if ($i < 2)
			continue;
		if(strpos($val, ":") !== FALSE)
		{
			$check = explode(":", $val);
			if (strcmp($check[0], $key) === 0) 
			{
				if ($check[1] != NULL)
					$tmp = $check[1];
				else
					$null = "\n";
			}
		}
	}
	if ($tmp)
		echo $tmp."\n";
	else if ($null)
		echo $null;

}
?>