#!/usr/bin/php
<?PHP
function	to_g($str, $i)
{
	$eg = 0;
	$c = 0;
	while($str[$i])
	{
		if ($eg === 0)
		{
			if ($str[$i] !== ' ' && $str[$i] !== '=')
				return (0);
			else if ($str[$i] === '=')
				$eg = 1;
		}
		else if ($eg === 1)
		{
			if ($str[$i] !== '"' && $str[$i] !== ' ')
				return (0);
			else if ($str[$i] === '"')
				return ($c + 1);
		}
		$c++;
		$i++;
	}
	return (0);
}

function	is_title($str, $i)
{
	
	$str_test = substr(strtolower($str), $i);
	if (strncmp($str_test, " title", 6) === 0)
		return(1);
	return (0);
}

function	is_finish($str, $i)
{
	$str_test = substr($str, $i);
	if (strncmp($str_test, "</a>", 4) === 0)
		return(1);
	if (strncmp($str_test, "</A>", 4) === 0)
		return(1);
	return (0);
}

if ($argv[1])
{
	$do_it = 0;
	$on_a = 0;
	$title = 0;
	$content = 0;
	if (!($str = @file_get_contents($argv[1])))
		return;
	while ($str[$i])
	{
		$i = 0;
		while ($str[$i])
		{
			if ($str[$i] === '<' && $str[$i + 1] && (($str[$i + 1] === 'a')
				|| ($str[$i + 1] === 'A')))
			{
				$i += 2;
				$on_a = 1;
			}
			if ($on_a === 1 && $content === 0 && $title === 0)
			{
				if (is_title($str, $i) === 1)
				{
					$i += 6;
					if (to_g($str, $i) === 0)
						continue ;
					$i += to_g($str, $i);
					$do_it = 1;
					$title = 1;
				}
				if ($str[$i] === '>')
					$content = 1;
			}
			if ($do_it === 1 && $on_a === 1 && $title === 1 && $content === 0)
			{
				while ($str[$i] && $str[$i] !== '"')
				{
					$str[$i] = strtoupper($str[$i]);
					$i++;
				}
				$title = 0;
			}
			if ($do_it === 1 && $on_a === 1 && $title === 0 && $content === 1)
			{
				while($str[$i] && $str[$i] !== '<')
				{
					$str[$i] = strtoupper($str[$i]);
					$i++;
				}
				$content = 0;
				if (is_finish($str, $i) === 1)
				{
					$on_a = 0;
				}
				continue;
			}
			$i++;
		}
		echo $str;
	}
}
?>