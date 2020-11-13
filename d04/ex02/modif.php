<?php

    $pwd_file = "../private/passwd";
    $login    = $_REQUEST["login"];
    $oldpw    = $_REQUEST["oldpw"];
    $newpw    = $_REQUEST["newpw"];
    $submit   = $_REQUEST["submit"];

    if ($login && $oldpw && $newpw && $submit && $submit == "OK")
    {
        if (!file_exists($pwd_file)) 
        {
            echo "ERROR\n";
            return ;
        }
        else
        {
            $u_db = unserialize(file_get_contents($pwd_file));
            if ($u_db)
            {
                
                foreach ($u_db as $key => $user)
                {
                    if ($user["login"] === $login)
                    {
                        $oldpw = hash("whirlpool", $oldpw, false);
                        if ($user["passwd"] == $oldpw)
                        {
                            $u_db[$key]["passwd"] = hash("whirlpool", $newpw, false);
                            file_put_contents($pwd_file, serialize($u_db));
                            echo "OK\n";
                            return ;
                        }
                        else
                        {
                            echo "ERROR\n";
                            return ;
                        }
                    }
                    else
                    {
                        echo "ERROR\n";
                        return ;
                    }
                }
            }
        }
    }
    echo "ERROR\n";
    return;
?>