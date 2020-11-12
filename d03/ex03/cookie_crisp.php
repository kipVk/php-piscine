<?php
    if (isset($_GET['action']) && isset($_GET['name']))
    {
        $action = $_GET['action'];
        $name = $_GET['name'];

        if ($action == 'set' && isset($_GET['value']))
            setcookie($name, $_GET['value'], time()+3600);
        else if ($action == 'get' && isset($_COOKIE[$name]))
            echo ($_COOKIE[$name]."\n");
        else if ($action == 'del')
            setcookie($name, '', 0);
    }
?>