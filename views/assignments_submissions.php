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
            <h1 class="smallCap">Assignments</h1>

            <div class="col-md-9">
            
                <?php foreach($assignments as $assignment) {?>

                    <div class="row">

                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <h3 class="assignment"><?php echo $assignment['assignment']; ?></h3>
                                        <p class="smallCap"><?php echo $assignment["author"];?> - <?php echo date("D j F Y\, g:i a", strtotime($assignment["published"]));?></p>
                                    </div>
                                    <div class="col-xs-9">
                                        <!-- <p>Submitted on <?php echo $assignment['published']; ?></p> -->
                                        <p>Available at <a target='_blank' href='http://deco3850.uqcloud.net/uploads/<?php echo $assignment['filename']; ?>'>http://deco3850.uqcloud.net/uploads/<?php echo $assignment['filename']; ?></a></p>
                                        <p><?php echo $assignment['notes']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                <?php }?>

            </div>

        </div>

<?php include "views/template/footer.php";?>
