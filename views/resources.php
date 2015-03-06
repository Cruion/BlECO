<?php include "views/template/header.php";?>
        <!--=========================================================================-->
        <!-- Start Content Section                                                   -->
        <!--=========================================================================-->
        <div class="container">
            <h1 class="smallCap">Resources</h1>

            <div class="row">
                <div class="col-md-9">

<?php
$blogTag = "resources";
//$noComments = 1;
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
                </div>
            </div>
        </div>
        <!--=========================================================================-->
        <!-- Stop Content Section                                                    -->
        <!--=========================================================================-->

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
            data: { offset: offset, excludedTags: '<?php echo $excludeTags;?>' },
            success: function(data) {
                $("#loadMoreBtn").replaceWith(data);
            },
            dataType: "html"
        });
        offset++;
    }
</script>

<?php include "views/template/footer.php";?>