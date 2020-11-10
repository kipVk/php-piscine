<?PHP
    function ft_is_sort($array)
    {
        $sorted = array_values($array);
        sort($sorted);
        if ( $array === $sorted ) 
            return (True);
        else
            return (False);
      }
?>