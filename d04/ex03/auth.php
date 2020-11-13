<?php
    function auth($login, $passwd)
    {
        $pwd_file = "../private/passwd";
        if (!file_exists($pwd_file)) 
            return FALSE;
        $u_db = unserialize(file_get_contents($pwd_file));
        if ($u_db)
        {
            foreach ($u_db as $key => $user)
            {
                if ($user["login"] === $login)
                {
                    $passwd = hash("whirlpool", $passwd, false);
                    if ($user["passwd"] == $passwd)
                    {
                        return TRUE;
                    }
                }
            }
        }
        return FALSE;
    }
?>