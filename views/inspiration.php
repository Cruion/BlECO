<?php include "views/template/header.php";?>
        <!--=========================================================================-->
        <!-- Start Content Section                                                   -->
        <!--=========================================================================-->
        <div class="container">
            <h1 class="smallCap">Inspiration</h1>

            <div class="row">
                <div class="col-md-9">
<?php
$blogTag = "inspiration";
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
                    <?php include "views/_sidebar.php"?>
                </div>
        </div>
        <!--=========================================================================-->
        <!-- Stop Content Section                                                    -->
        <!--=========================================================================-->

<?php include "views/template/footer.php";?>