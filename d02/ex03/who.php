#!/usr/bin/php
<?php
    
    $file = fopen("/var/run/utmpx", "r");
    if ($file)
    {
        date_default_timezone_set('Europe/Helsinki');
        while ($ufile = fread($file, 628)) 
        {
            $unpack = unpack("a256u/a4tid/a32tname/ilog/iunk/itstamp/", $ufile);
            if ($unpack['unk'] == 7)
            {
                echo trim($unpack['u']) . str_repeat(' ', 6);
                echo trim($unpack['tname']) . str_repeat(' ', 2);
                echo date("M ", $unpack['tstamp']);
                echo str_pad(date("j ", $unpack['tstamp']), 3, " ", STR_PAD_LEFT);
                echo date("H:i", $unpack['tstamp']) . " \n";
            }
        }
    }
?>