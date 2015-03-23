<?php
include "views/template/header.php";
?>

<!--=========================================================================-->
<!-- Start Content Section                                                   -->
<!--=========================================================================-->
<div class="container">
    <h1 class="smallCap">Groups</h1>

            <?php
$index = 0;

foreach ($groups as $group) {
	if ($index % 6 == 0) {
		?>
                    <div class="row">
                        <?php
}
	include "views/_group.php";

	if ($index % 6 == 5) {
		?>

                    </div>
                    <?php
}

	$index = $index + 1;
}

if ($index % 6 != 0) {
	?>

                    </div>
                    <?php
}

?>

    <?php
if ($_SESSION['guest'] == "notGuest") {
	?>

        <hr />
        <h3>Update group logo</h3>
        <form class="form-horizontal" action="/groups" method="post">
                <fieldset>

                    <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="image" name="image" placeholder="img/uqjweige_53db9c69a09de.png (uses uploaded file)">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </fieldset>
            </form>

    <?php }
?>

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
