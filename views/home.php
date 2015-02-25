<?php include "views/template/header.php";?>
        <!--=========================================================================-->
        <!-- Start Content Section                                                   -->
        <!--=========================================================================-->
        <div class="container">
            <!--
                <?php if ($_SESSION['guest'] == "notGuest" && $numPosts["numPosts"] == 0) {?>
                <div class="alert alert-dismissable alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4 class="smallCap">Warning!</h4>
                    <p>Your group has currently not submitted a blog for this week. You have <?php echo $currentWeek["remaining"];?> remaining.</p>
                </div>
                <?php }?>
            -->
<h1 class="smallCap">Course Announcements</h1>
            <div class="row">
                <div class="col-md-9">



                    <?php
$blogTag = "announcements";
$noComments = 1;
foreach ($blogs as $blog) {
	include "views/_blog.php";
}
if (count($blogs) == 10) {
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
                </div>
            </div>
        </div>
        <!--=========================================================================-->
        <!-- Stop Content Section                                                    -->
        <!--=========================================================================-->

<?php include "views/template/footer.php";?>

<script type="text/javascript">
    var offset = 1;

    $(document).ready(function() {

        $('[data-toggle="tooltip"]').tooltip({html: true});

    });

    function loadMore() {
        $("#loadMoreBtn").prop("disabled",true);


        $.ajax({
            type: "POST",
            url: "<?php echo Util::getHost();?>/blog",
            data: { offset: offset },
            success: function(data) {
                $("#loadMoreBtn").replaceWith(data);
            },
            dataType: "html"
        });
        offset++;
    }
</script>