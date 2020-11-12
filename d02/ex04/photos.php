#!/usr/bin/php
<?php
    if ($argc == 2)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $argv[1]);
        curl_setopt($curl, CURLOPT_FAILONERROR, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        $str = curl_exec($curl);
        curl_close($curl);

        $regex  = '/<img.*src *= *"([^"].+?)"[^>]*\/?>/i';
        preg_match_all($regex, $str, $match);
        if (!empty($match[1]))
        {
            $iarray = array();
            $url = str_replace('https://', '', $argv[1]);
            $url = str_replace('http://', '', $url);
            $url = preg_replace('/\/$/','',$url);
            $fol = $url;
            foreach ($match[1] as $ilink)
            {    
                if(!preg_match('/http|www/', $ilink))
                {
                    if(preg_match('/^\//', $ilink))
                        array_push($iarray,$url.$ilink);
                    else
                        array_push($iarray,$url.'/'.$ilink);
                }
                else
                    array_push($iarray,$ilink);
            }
            if (!file_exists($fol))
            {
                mkdir($fol, 0755, true);
            }
            echo $fol;
            foreach ($iarray as $im) {
                $curl = curl_init ($im);
                curl_setopt($curl, CURLOPT_HEADER, 0);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
                curl_setopt($curl, CURLOPT_TIMEOUT, 2);
                $rawdata=curl_exec($curl);
                curl_close ($curl);
                $name = substr($im, strrpos($im, '/') + 1);
                if (!file_exists("$fol/$name")) {
                    $fp = fopen("$fol/$name",'x');
                    fwrite($fp, $rawdata);
                    fclose($fp);
                }
            }
        }
    }
?>