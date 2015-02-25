<div class="panel <?php if ($blog["name"] == "Course Staff") { ?>panel-success <?php } else { ?> panel-default <?php } ?>">
    <div class="panel-heading clearfix">
        <div class="row">
            <div class="col-xs-2">
                <img src="/<?php echo $blog["groupIcon"]; ?>" class="img-thumbnail" />
            </div>
            <div class="col-xs-10">
        <h3><?php echo $blog["title"] ?></h3>
        <p class="smallCap"><?php echo $blog["givenName"] . " " . $blog["familyName"] . " [" . $blog["name"] . "]"; ?> - <?php echo date("D j F Y\, g:i a", strtotime($blog["published"])); ?></p>
<?php if (! is_null($blog["modified"])) { ?> <p class="smallCap">Modified - <?php echo date("D j F Y\, g:i a", strtotime($blog["modified"])); ?></p> <?php } ?>
            </div>
            
        </div>
        
    </div>
    <div class="panel-body">
        <?php
        if ($blog["video"] != null) {
            ?>
            <div class="embed-responsive embed-responsive-16by9">
                <embed
                    class="embed-responsive-item"
                    allowfullscreen="true"
                    src="http://www.youtube.com/v/<?php echo $blog["video"]; ?>"
                    type="application/x-shockwave-flash">
                </embed>
            </div>
            <br />
            <?php
        }
        ?>
            <p><?php echo UTil::bbCode(nl2br(htmlspecialchars($blog["body"]))); ?></p>
        <hr />
        <h4><?php echo $blog["comments"]; ?> Comment(s)</h4>
        <?php if ($blog["comments"] > 0) {
            $comments = get_comments_by_id($blog["blogId"]);
            foreach ($comments as $comment) {
                include("views/_comment.php");
            }
        } ?>
    </div>
    <div class="panel-footer">
        <p>Permalink: <a href="<?php echo Util::getHost(); ?>/public/blog/<?php echo $blog["slug"]; ?>"><?php echo Util::getHost(); ?>/public/blog/<?php echo $blog["slug"]; ?></a></p>
    </div>
</div>