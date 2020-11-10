#!/usr/bin/php
<?PHP
    function ft_split($str)
	{
		$arr = preg_split("/ +/", trim($str));
		if (!count($arr) || !$arr[0])
			return (NULL);
		return ($arr);
    }
    
    if ($argc == 2)
    {
        $str = ft_split($argv[1]);
        $count = count($str);
        foreach ($str as $word)
        {
            if ($count > 1)
                echo "$word ";
            else
                echo "$word";
            $count --;
        }
    }
?>