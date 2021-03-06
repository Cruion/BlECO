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
            <h1 class="smallCap">DECO3801/7381 <small>Design Computing Studio 3 - Build</small></h1>

            <div class="row">
                <div class="col-md-9">
                    <h2>Blogs</h2>

                    <?php
                    foreach ($blogs as $blog)
                    {
                        include("views/_blog.php");
                    }
                    if (count($blogs) == 10) {
                        ?>
                    
                    <button id="loadMoreBtn" type="button" class="btn btn-primary btn-lg btn-block" onclick="loadMore()">Load more blogs!</button>
                    
                    <?php
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

<script type="text/javascript">
    var offset = 1;
    
    $(document).ready(function() {

        $('[data-toggle="tooltip"]').tooltip({html: true});

    });
    
    function loadMore() {
        $("#loadMoreBtn").prop("disabled",true);
        
        
        $.ajax({
            type: "POST",
            url: "<?php echo Util::getHost(); ?>/public/blog",
            data: { offset: offset },
            success: function(data) {
                $("#loadMoreBtn").replaceWith(data);
            },
            dataType: "html"
        });
        offset++;
    }
</script>         
        
<?php include("views/template/footer.php"); ?>
