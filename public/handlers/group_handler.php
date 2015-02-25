<?php

class PublicGroupHandler
{
    function get()
    {
        
        $groups = get_groups();
        include("views/groups.php");
    }
}

?>