<?php

   function createCookie($id, $name)    /* Create cookie and set cookie "forever" */
    {
        setcookie("id", $id, time()+99999999999, "/");
        setcookie("name", $name, time()+99999999999, "/");
    }

    function login()                    /* Create login function to check if is user login or not */
    {
        if(isset($_COOKIE['id']) AND isset($_COOKIE['name'])) 
        {
            return true;
        }
        return false;
    }
    
    ?>