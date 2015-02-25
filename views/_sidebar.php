<?php if ($_SESSION['guest'] == "notGuest") {?>
                    <a href="/new-blog" class="btn btn-block btn-lg btn-info">New Post</a>
                    <a href="/new-assignment" class="btn btn-block btn-lg btn-success">Submit Assignment</a>
                    <?php }?>
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