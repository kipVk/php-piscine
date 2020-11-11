#!/usr/bin/php
<?PHP
    function ft_split($str)
	{
        $arr = preg_split("/ +/", trim($str));
		if (empty($arr))
			return (NULL);
		return ($arr);
    }
    
    if ($argc > 1)
    {
        $words = array();
        array_shift($argv);
        $words = ft_split($argv[0]);
        $first = $words[0];
        $count = count($words);
        if ($count > 1)
        {
            array_shift($words);
            foreach ($words as $word)
            {
                $count --;
                if ($count > 1)
                    echo "$word ";
                else
                    echo "$word $first \n";
            }
        }
        else
            echo "$first \n";
    }
?>