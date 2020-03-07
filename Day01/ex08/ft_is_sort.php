<?PHP
function	ft_is_sort($tab)
{
	if ($tab)
	$tab_tmp = $tab;
	sort($tab);
	$i = 0;
	foreach($tab as $r)
	{
		if (!($tab[$i] === $tab_tmp[$i]))
			return (FALSE);
		$i++;
	}
	return (TRUE);
}
?>
