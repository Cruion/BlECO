<?php if ($_SESSION['guest'] == "notGuest") {?>
                    <a href="/new-blog" class="btn btn-square btn-block btn-lg btn-info">
                    <div class='square-content'><div><span><i class="fa fa-pencil"></i><br>Compose</span></div></div>
                    </a>
                    <!--<a href="/new-blog" class="btn btn-square btn-block btn-lg btn-success">
                    <div class='square-content'><div><span><i class="fa fa-upload"></i><br>Submit</span></div></div>
                    </a>--><?php }?>
                    <div class="clear"></div>
                    <hr>
                    <h2>Weeks</h2>
                    <div class="panel-group" id="accordion">

                        <?php
$once = true;
foreach ($weeks as $week) {
	include "views/_week.php";

	$once = false;
}
?>
                    </div>