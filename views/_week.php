<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $week["weekId"]; ?>">
                <?php echo $week["weekName"]; ?> <span class="badge pull-right"><?php echo count($week["blogs"]); ?></span>
            </a>
        </h4>
    </div>
    <div id="collapse<?php echo $week["weekId"]; ?>" class="panel-collapse collapse <?php if ($once) { ?>in<?php } ?>">
        <div class="panel-body">
            <?php
                $sideBlogs = $week["blogs"];
                foreach ($sideBlogs as $sideBlog) {
                    ?>
            <p>
                <a href="<?php echo Util::getHost(); ?>/blog/<?php echo $sideBlog["slug"]; ?>"><?php echo $sideBlog["title"]; ?></a>
            </p>
                    <?php
                }
            ?>
        </div>
    </div>
</div>