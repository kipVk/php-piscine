#!/usr/bin/php
<?php
    function ft_get_months()
    {
        setlocale(LC_TIME, "fr_FR");
        foreach (range(1,12) as $i)
        {
            $month_english = date("F",mktime(0,0,0,$i,1,0));
            $timestamp = strtotime($month_english);
            $month_french = strftime("%B", $timestamp);
            $result[ucwords($month_french)] = $i;
        }
        return ($result);
    }

    function ft_get_weekday()
    {
        setlocale(LC_TIME, "fr_FR");
        foreach (range(1,7) as $i)
        {
            $day_english = date('l', strtotime("Sunday +{$i} days"));
            $timestamp = strtotime($day_english);
            $day_french = strftime("%A", $timestamp);
            $result[ucwords($day_french)] = $i;
        }
        return ($result);
    }

    if ($argc == 2)
    {
        $valid = 0;
        $str = ucwords($argv[1]);
        if (substr_count($str,' ') == 4)
            $arr = explode(" ", "$str");
        else
        {
            echo "Wrong Format\n";
            die;
        }
        date_default_timezone_set('Europe/Paris');
        $check_date = preg_match('/^(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche) ([0-9]|1[0-9]|2[0-9]|3[0-1]) (Janvier|Fevrier|Mars|Avril|Mai|Juin|Juillet|Aout|Septembre|Octobre|Novembre|Decembre) ([0-9]{4}) (([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]))$/', $str, $check);
        print_r($check);
        if (!$check_date)
            exit("Wrong Format\n");
        $months_arr = ft_get_months();
        $days_arr = ft_get_weekday();
        $day_week = $days_arr[$check[1]];
        $d = $check[2];
        $m = $months_arr[$check[3]];
        $y = $check[4];
        $t = $check[5];
        $h = $check[6];
        $min = $check[7];
        $sec = $check[8];
        $time = strtotime($y . '-' . $m . '-' . $d . ' ' . $t);
        echo $time;
    }
?>