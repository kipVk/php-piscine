#!/usr/bin/php
<?PHP
    if ($argc > 2)
    {
        $key = $argv[1];
        foreach (range(2, $argc) as $i)
        {
            $arr = explode(":", $argv[$i]);
            if(!strcmp($key, $arr[0]) && $arr[1])
                $value = $arr[1];
        }
    }
    if (!is_null($value))
        echo $value . "\n";
?>