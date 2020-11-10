#!/usr/bin/php
<?PHP
    function ft_split($str)
	{
		$arr = preg_split("/ +/", trim($str));
		if (!count($arr) || !$arr[0])
			return (NULL);
		return ($arr);
    }
    
    if ($argc != 1)
    {
        $words = array();
        array_shift($argv);
        foreach ($argv as $av)
        {
            $a = ft_split($av);
            $words = array_merge($words, $a);
        }
        sort($words);
        foreach ($words as $word)
            echo $word . "\n";
    }
?>