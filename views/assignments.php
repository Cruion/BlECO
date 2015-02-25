<?php include "views/template/header.php";?>
        <!--=========================================================================-->
        <!-- Start Content Section                                                   -->
        <!--=========================================================================-->
        <div class="container">
            <h1 class="smallCap">Assignments</h1>

            <div class="row">
                <div class="col-md-9">

                    <?php
$blogTag = "assignments";
$noComments = 1;
$showAuthor = 0;
foreach ($blogs as $blog) {
	include "views/_blog.php";
}
if (false && count($blogs) == 10) {
	?>

                    <button id="loadMoreBtn" type="button" class="btn btn-primary btn-lg btn-block" onclick="loadMore()">Load more blogs!</button>

                    <?php }?>

                </div>
                <div class="col-md-3">
                    <?php if ($_SESSION['guest'] == "notGuest") {?>
                    <a href="/new-blog" class="btn btn-block btn-lg btn-info">New Post</a>
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
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <!--=========================================================================-->
        <!-- Stop Content Section                                                    -->
        <!--=========================================================================-->

<?php include "views/template/footer.php";?>