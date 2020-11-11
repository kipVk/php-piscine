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

    function customError($errstr)
    {
        echo $errstr;
        die();
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
            if (strchr("/%", $op) && $num2 == 0)
                customError("Undefined operation by 0\n");
            else
                $result = ["num1" => $num1, 
                    "num2" => $num2,
                    "op" => $op];
            return ($result);
        }
        return ($result);
    }

    function ft_do_operation($result)
    {
        switch($result["op"])
        {
            case "+":
                return ($result["num1"] + $result["num2"]);
            case "-";
                return ($result["num1"] - $result["num2"]);
            case "*";
                return ($result["num1"] * $result["num2"]);
            case "/";
                return ($result["num1"] / $result["num2"]);
            case "%";
                return ($result["num1"] % $result["num2"]);
        }
    }

    if ($argc == 2)
    {
        $result = ft_get_operands($argv[1]);
        if (!$result)
            customError("Syntax Error\n");
        echo ft_do_operation($result) . "\n";
    }
    else
        customError("Incorrect Parameters\n");
?>