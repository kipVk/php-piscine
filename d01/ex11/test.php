#!/usr/bin/php
<?PHP
    function is_op($char)
    {
        if (strchr("+-*/%", $char))
            return (True);
        return (False);
    }

    function is_valid($op, $str)
    {
        if (substr_count($str, $op) == 1)
            return (True);
        else
            return (False);
    }

    function ft_get_operands($str)
    {
        $op_flag = False;
        $result = array();
        $str_ar = str_split($str);
        foreach ($str_ar as $char)
        {
            if(!is_null($char))
            {
                if (ctype_alpha($char))
                    return ($result);
                else if (is_op($char))
                {
                    if (is_valid($char, $str))
                    {
                        if($op_flag)
                            return ($result);
                        else
                        {
                            $op_flag = True;
                            $op = $char;
                        }
                    }
                }
                else if (ctype_digit($char))
                {
                    if (!$op_flag)
                        $num1 = $num1 . $char;
                    else
                        $num2 = $num2 . $char;
                }
                else if ($char == " ")
                    continue;
                else
                    return ($result);   
            }
        }
        if (!is_null($num1) && !is_null($num2) && $op && $op_flag)
        {
            $result = ["num1" => $num1, 
                "num2" => $num2,
                "op" => $op];
            return ($result);
        }
        return ($result);
    }
    print_r(ft_get_operands($argv[1]));
?>