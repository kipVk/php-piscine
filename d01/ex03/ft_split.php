<?PHP
    function ft_split($str)
	{
		$arr = preg_split("/ +/", trim($str));
		sort($arr);
		if (empty($arr))
			return (NULL);
		return ($arr);
	}
?>