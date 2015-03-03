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
$showAuthor = 0;
foreach ($blogs as $blog) {
	if ($blog["name"] == "Staff") {
		include "views/_blog.php";
	}
}
if (false && count($blogs) == 10) {
	?>

                    <button id="loadMoreBtn" type="button" class="btn btn-primary btn-lg btn-block" onclick="loadMore()">Load more blogs!</button>

                    <?php }?>

                </div>
                <div class="col-md-3">
                <?php //include "views/_sidebar.php"?>
                                <!-- <iframe src="https://freesecure.timeanddate.com/countdown/i4khder6/n47/cf12/cm0/cu4/ct0/cs0/ca0/cr0/ss0/cac000/cpc000/pcfff/tcfff/fs100/szw320/szh135/tatDECO3850%20-%20DECO7385%20Final%20Exhibit/tac000/tptTime%20since%20Event%20started%20in/tpc000/matThe%20Edge%2C%20Brisbane/mac000/mpc000/iso2015-06-03T12:00:00" allowTransparency="true" frameborder="0" width="323" height="69"></iframe> -->
<iframe src="http://free.timeanddate.com/countdown/i4kjgru5/n47/cf12/cm0/cu4/ct0/cs0/ca0/cr0/ss0/cac000/cpc000/pcfff/tcfff/fs100/szw320/szh135/tatCourse%20Projects%20Exhibiton/tac000/tptTime%20since/tpc000/matat%20The%20Edge%20in.../mac000/mptProjects%20Exhibition%20at%20The%20Edge/mpc000/iso2015-06-03T12:00:00" allowTransparency="true" frameborder="0" width="230" height="69"></iframe>
                
                <div class="clear"></div>
                    <hr>
                
                <p></p>
                <?php if ($_SESSION['guest'] == "notGuest") {?>
                <a href="/new-blog" class="btn btn-square btn-block btn-lg btn-info">
                    <div class='square-content'><div><span><i class="fa fa-pencil"></i><br>Post<br>new Blog</span></div></div>
                </a>

                <a href="/new-assignment" class="btn btn-square btn-block btn-lg btn-success">
                    <div class='square-content'><div><span><i class="fa fa-upload"></i><br>Submit<br>assignment</span></div></div>
                </a>
				<?php } ?>
				
				    <?php //include "views/_sidebar.php"?>
                
                <!-- <a href="/new-assignment" class="btn btn-square btn-block btn-lg btn-success">
                    <div class='square-content'><div><span><i class="fa fa-upload"></i><br>Submit</span></div></div>
                </a> -->

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