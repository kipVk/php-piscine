#!/usr/bin/php
<?PHP

    if ($argc == 4)
    {
        $num1 = trim($argv[1]);
        $num2 = trim($argv[3]);
        $op = trim($argv[2]);
        if ($op == "+")
            echo $num1 + $num2 . "\n";
        else if ($op == "-")
            echo $num1 - $num2 . "\n";
        else if ($op == "*")
            echo $num1 * $num2 . "\n";
        else if ($op == "/")
            echo $num1 / $num2 . "\n";
        else if ($op == "%")
            echo $num1 % $num2 . "\n";
    }
    else
        echo "Incorrect Parameters\n";
?>