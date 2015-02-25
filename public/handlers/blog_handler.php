<?php

class PublicBlogHandler
{
    function get($slug)
    {
        
        $blog = get_blog_by_slug($slug);
        include("views/blog.php");
    }
}

?>