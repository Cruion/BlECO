<?php include "views/template/header.php";?>

        <!--=========================================================================-->
        <!-- Start Content Section                                                   -->
        <!--=========================================================================-->
        <div class="container">
            <!--
                        <div class="alert alert-dismissable alert-warning">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4 class="smallCap">Warning!</h4>
                            <p>Your group has currently not submitted a blog for this week. You have X day(s) and X hour(s) remaining.</p>
                        </div>
            -->
            <h1 class="smallCap"><?php echo $_SESSION['courseProfile']['coursecode']?> <small><?php echo $_SESSION['courseProfile']['coursename']?></small></h1>

            <div class="row">
                <div class="col-md-12">

                    <?php
include "views/_blog.php";
?>
                </div>
            </div>
        </div>
        <!--=========================================================================-->
        <!-- Stop Content Section                                                    -->
        <!--=========================================================================-->

<script type="text/javascript">
    $(document).ready(function() {

        $('[data-toggle="tooltip"]').tooltip({html: true});

    });
</script>

<?php include "views/template/footer.php";?>
