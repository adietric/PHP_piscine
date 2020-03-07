<?PHP
function ft_split($str_arg)
{
	$my_tab = explode(" ", $str_arg);
    foreach ($my_tab as $k => $v)
	{
        if (empty($v))
            unset($my_tab[$k]);
	}
	array_filter($my_tab);
	sort($my_tab, SORT_STRING);
	return($my_tab);
}
?>
