#!/usr/bin/php
<?PHP
    $stdin = fopen('php://stdin', 'r');
    $str = false;
    while (!$str && !feof($stdin))
    {
        echo "Enter a number: ";
        $input = fgets($stdin);
        if ($input)
        {
            $input = str_replace("\n", "", $input);
            if (is_numeric($input))
            {
                if ($input % 2 == 0)
                    printf("The number %d is even\n", $input);
                else
                    printf("The number %d is odd\n", $input);
            }
            else
                echo "'" . $input . "' is not a number\n";
        }
    }
    echo "\n";
?>