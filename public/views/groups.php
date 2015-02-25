<?php
include("views/template/header.php");
?>

<!--=========================================================================-->
<!-- Start Content Section                                                   -->
<!--=========================================================================-->
<div class="container">
    <h1 class="smallCap">DECO3801/7381 <small>Design Computing Studio 3 - Build</small></h1>

    <h2>Groups</h2>
            <?php
            $index = 0;

            foreach ($groups as $group)
            {
                if ($index % 6 == 0)
                {
                    ?>
                    <div class="row">
                        <?php
                    }
                    include("views/_group.php");

                    if ($index % 6 == 5)
                    {
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
