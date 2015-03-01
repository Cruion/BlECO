<?php
include("views/template/header.php");
?>

<!--=========================================================================-->
<!-- Start Content Section                                                   -->
<!--=========================================================================-->
<div class="container">
    <h1 class="smallCap">DECO3801/7381 <small>Design Computing Studio 3 - Build</small></h1>

    <h2>Images</h2>
    <div class="row">
        <?php if ($_SESSION['guest'] == "notGuest") { ?>
        <div class="col-md-3">
            <?php
            if (isset($responseCode) && $responseCode == "success")
            {
                ?>
     <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Success!</strong> <?php echo $response; ?>
                </div>
                <?php
            }
            elseif (isset($responseCode) && $responseCode == "error")
            {
                ?>
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Oh snap!</strong> <?php echo $response; ?>
                </div>
    <?php
}
?>
            <form class="form" action="/images" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Upload</legend>
                    <div class="form-group">
                        <label for="image">File</label>
                        <input type="file" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class ="col-md-9">
        <?php } else { ?>
            <div class ="col-md-12">
        <?php } ?>
            <?php
            $index = 0;

            foreach ($images as $image)
            {
                if ($index % 4 == 0)
                {
                    ?>
                    <div class="row">
                        <?php
                    }
                    include("views/_image.php");

                    if ($index % 4 == 3)
                    {
                        ?>

                    </div>
                    <?php
                }


                $index = $index + 1;
            }
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


<?php include("views/template/footer.php"); ?>
