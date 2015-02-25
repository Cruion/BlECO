<?php

class PublicHomeHandler {
    function get() {
        
        $blogs = get_blogs();
        $weeks = get_weeks_before_now();
        foreach ($weeks as $key => $week)
        {
            $tempArray = [];
            $sideBlogs = get_blogs_between($week["startDate"], $week["endDate"]);
            foreach ($sideBlogs as $sideBlog)
            {
                $tempArray[] = $sideBlog;
            }
            $weeks[$key]["blogs"] = $tempArray;
        }
        
        include("views/home.php");
    }
}

?>