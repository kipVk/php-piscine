<?php
    if (isset($_SERVER["PHP_AUTH_USER"]) && isset($_SERVER["PHP_AUTH_PW"]))
    {
        echo "<html><body>";
        $users = array();
        $users["zaz"] = "Ilovemylittleponey";
        $name = $_SERVER["PHP_AUTH_USER"];
        $pass = $_SERVER["PHP_AUTH_PW"];
        if (isset($users[$name]) && $users[$name] == $pass)
        {
            echo "\nHello Zaz<br />\n";
            echo "<img src='data:image/png;base64,";
            echo base64_encode(file_get_contents("../img/42.png"));
            echo "'>\n</body></html>\n";
        }
        else
        {
            header("WWW-Authenticate:  Basic realm=''Member area''");
            header("HTTP/1.0 401 Unauthorized");
            echo "That area is accessible for members only";
            echo ("</body></html>\n");
        }
    }
?>