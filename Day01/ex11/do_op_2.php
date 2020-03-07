#!/usr/bin/php
<?PHP
if ($argc != 2)
    {
        echo "Incorrect Parameters\n";
        return ;
    }
    $i = 0;
    $str = $argv[1];
    $operation = 0;
    $is_op_1 = 0;
    $is_op_2 = 0;
    while ($str[$i] == " ")
        $i++;
    if ($str[$i] == "+" || $str[$i] == "-")
    {
        $op_1 = $op_1.$str[$i];
        $i++;
    }
    $point = 0;
    while (($str[$i] >= "0" && $str[$i] <= "9") || ($str[$i] == "." && !$point))
    {
        if ($str[$i] == ".")
        {
            if ($point)
            {
                echo "Syntax Error\n";
                return ;
            }
            else
                $point = 1;
        }
        else
            $is_op_1 = 1;
        $op_1 = $op_1.$str[$i];
        $i++;
    }
    if (!$is_op_1)
    {
        echo "Syntax Error\n";
        return ;
    }
    while ($str[$i] == " ")
        $i++;
    if ($str[$i] == '+' || $str[$i] == '-' || $str[$i] == '/'
        || $str[$i] == '*' || $str[$i] == '%')
        $operation = $str[$i++];
    else
    {
        echo "Syntax Error\n";
        return ;
    }
    while ($str[$i] == " ")
    $i++;
    if ($str[$i] == "+" || $str[$i] == "-")
    {
        $op_2 = $op_2.$str[$i];
        $i++;
    }
    $point = 0;
    while (($str[$i] >= "0" && $str[$i] <= "9") || ($str[$i] == "." && !$point))
    {
        if ($str[$i] == ".")
        {
            if ($point)
            {
                echo "Syntax Error\n";
                return ;
            }
            else
                $point = 1;
        }
        else
            $is_op_2 = 1;
        $op_2 = $op_2.$str[$i];
        $i++;
    }
    if (!$is_op_2)
    {
        echo "Syntax Error\n";
        return ;
    }
    while ($str[$i] == " ")
        $i++;
    if ($str[$i] != NULL)
    {
        echo "Syntax Error\n";
        return ;
    }
    if ($operation == "+")
        echo $op_1 + $op_2;
    else if ($operation == "-")
        echo $op_1 - $op_2;
    else if ($operation == "/")
	{
		if ($op_2 === "0" || $op_2 === "+0" || $op_2 === "-0")
		{
        	echo "Syntax Error\n";
        	return ;
		}
        echo $op_1 / $op_2;
	}
    else if ($operation == "*")
        echo $op_1 * $op_2;
    else if ($operation == "%")
	{
		if ($op_2 === "0" || $op_2 === "+0" || $op_2 === "-0")
		{
        	echo "Syntax Error\n";
        	return ;
		}
        echo $op_1 % $op_2;
	}
?>
