<?php

class LogoutHandler
{
    function get()
    {
        header("Location: http://api.uqcloud.net/logout");
        exit;
    }
}

?>