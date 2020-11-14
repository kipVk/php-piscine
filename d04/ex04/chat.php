<?php
    session_start();
    $chat_file = "../private/chat";
    if ($_SESSION["loggued_on_user"] === "")
    {
        echo "ERROR\n";
        die();
    }
    date_default_timezone_set("Europe/Helsinki");

    if (file_exists($chat_file))
    {
        $content = file_get_contents($chat_file, LOCK_EX);
        $chats = unserialize($content);
        foreach ($chats as $msg)
        {    
            $time = $msg["time"];
            echo date("[H:i]", $time);
            echo " <b>".$msg["login"]."</b>: ".$msg["msg"]."<br />\n";
        }
    }
?>