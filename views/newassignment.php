<?php include "views/template/header.php";?>
<!--=========================================================================-->
<!-- Start Content Section                                                   -->
<!--=========================================================================-->
<div class="container">
    <?php if ($_SESSION['guest'] == "notGuest" && $numPosts["numPosts"] == 0) {?>
      <!--  <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4 class="smallCap">Warning!</h4>
            <p>You have currently not submitted a blog for this week. You have <?php echo $currentWeek["remaining"];?> remaining.</p>
        </div> -->
<?php }?>
    <h1 class="smallCap"><?php echo $_SESSION['courseCode'];?> <small><?php echo $_SESSION['courseName'];?></small></h1>

    <div class="row">
<?php if ($_SESSION['guest'] == "notGuest") {?>
            <h2>Submit Assignment</h2>

            <p><?php echo $response ?></p>

            <form class="form-horizontal" action="/new-assignment" method="post"  enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Select Assignment</label>
                        <div class="col-sm-10">
                            <select name="assignment" id="assignment">
                                <option value="#">Select Assignment</option>
                                <?php 
                                foreach($assignments as $assignment) {
                                ?>
                                <option value="<?php echo trim($assignment['title']); ?>"><?php echo trim($assignment['title']); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Attach File</label>
                        <div class="col-sm-10">
                            <input type="file" name="attachment" id="attachment" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-lg-2 control-label">Notes</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="6" id="body" name="body" onkeyup="bodyChange()" onchange="bodyChange()"></textarea>
                        </div>
                      </div>
                     <div class="form-group">
                        <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </fieldset>
            </form>
    </div>
    
        </div>


<?php } else {?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4 class="smallCap">No permission!</h4>
                <p>You do not have permission to post to the blogs.</p>
            </div>
<?php }?>
    </div>
</div>
<!--=========================================================================-->
<!-- Stop Content Section                                                    -->
<!--=========================================================================-->

<?php include "views/template/footer.php";?>