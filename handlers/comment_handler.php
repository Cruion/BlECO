<?php
class CommentHandler {
    function post($blogId) {
        if (isset($_POST["body"]) && strlen(trim($_POST['body'])) > 0) {
            $userDetails = userAuth();
            $userName = $userDetails["userName"];
            
            if (isset($_POST["critique"])) {
                set_critique($blogId, trim($_POST['body']), $userName);
            } else {
                set_comment($blogId, trim($_POST['body']), $userName);
            }
            
            header("Location: ".Util::getHost()."/blog");
        }
    }
}

?>