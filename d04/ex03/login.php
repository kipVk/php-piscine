<?php
    require_once("auth.php");
    session_start();
    $pwd_file = "../private/passwd";
    $login    = $_REQUEST["login"];
    $pwd      = $_REQUEST["passwd"];
    $submit   = $_REQUEST["submit"];

    if ($login && $pwd && auth($login, $pwd))
    {
      $_SESSION["loggued_on_user"] = $login;
      echo "OK\n";
    }
    else 
    {
      $_SESSION["loggued_on_user"] = "";
      echo "ERROR\n";
	  }
?>