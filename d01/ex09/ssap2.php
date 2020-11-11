#!/usr/bin/php
<?PHP
    function ft_split($str)
	{
        $arr = preg_split("/ +/", trim($str));
        if (empty($arr))
            return (NULL);
		return ($arr);
    }
    
    if ($argc != 1)
    {
        $alph = array();
        $num = array();
        $other = array();

        array_shift($argv);
        foreach ($argv as $av)
        {
            $a = ft_split($av);
            foreach ($a as $item)
            {
                if (ctype_alpha ($item))
                    array_push($alph, $item);
                else if (ctype_digit ($item))
                    array_push($num, $item);
                else
                    array_push($other, $item);
            }
        }
        usort($alph, 'strnatcasecmp');
        sort($num, SORT_STRING);
        sort($other);
        $alph = array_merge($alph, $num, $other);
        foreach ($alph as $word)
            echo $word . "\n";
    }
?>