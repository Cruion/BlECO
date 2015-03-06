<?php include("views/template/header.php"); ?>

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
            

            <div class="row">
                <div class="col-md-9">
                    <h2><?php echo $group["name"]; ?></h2>

                    <?php
                    foreach ($blogs as $blog)
                    {
                        include("views/_blog.php");
                    }
                    ?>
                </div>
                <div class="col-md-3">
                    <h2>Weeks</h2>
                    <div class="panel-group" id="accordion">
                    
                    <?php
                    $once = true;
                    foreach ($weeks as $week)
                    {
                        include("views/_week.php");
                        
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

<?php include("views/template/footer.php"); ?>
