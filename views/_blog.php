
<?php

if (isset($blogTag)) {
	if (!in_array($blogTag, explode(",", $blog['tags']))) {
		return;
	}
}

?>


<div class="panel <?php if ($blog["name"] == "Course Staff") {?>panel-success <?php } else {?> panel-default <?php }?>">
    <div class="panel-heading clearfix">
        <div class="row">
            <div class="col-xs-2">
                <img src="/<?php echo $blog["groupIcon"];?>" class="img-thumbnail" />
            </div>
            <div class="col-xs-9">
        <h3><?php echo $blog["title"]?></h3>
        <?php if (isset($showAuthor)) {?>
<p class="smallCap"><?php echo $blog["givenName"];?> - <?php echo date("D j F Y\, g:i a", strtotime($blog["published"]));?></p>
  <?php }if (!isset($showAuthor)) {?>
        <p class="smallCap"><?php echo $blog["givenName"] . " " . $blog["familyName"] . " [" . $blog["name"] . "]";?> - <?php echo date("D j F Y\, g:i a", strtotime($blog["published"]));?></p>
        <?php if (!is_null($blog["modified"])) {?> <p class="smallCap">Modified - <?php echo date("D j F Y\, g:i a", strtotime($blog["modified"]));?></p> <?php }?>
    <?php }?>
</div>
            <div class="col-xs-1">
                <?php
if ($userDetails["name"] == $blog["name"]) {

	?>
            <p>
                <a href="<?php echo Util::getHost();?>/blog/<?php echo $blog["slug"];?>/edit" class="btn btn-default btn-xs " role="button">Edit</a>
            </p>

        <?php
}
?>
            </div>

        </div>

    </div>
    <div class="panel-body">
        <?php
if ($blog["video"] != null && preg_match('/[a-zA-Z]/', $blog["video"]) > 0) {
	?>
            <div class="embed-responsive embed-responsive-16by9">
                <embed
                    class="embed-responsive-item"
                    allowfullscreen="true"
                    src="http://www.youtube.com/v/<?php echo $blog["video"];?>"
                    type="application/x-shockwave-flash">
                </embed>
            </div>
            <br />
            <?php

} else if ($blog["video"] != null && preg_match('/[a-zA-Z]/', $blog["video"]) == 0) {
	?>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="//player.vimeo.com/video/<?php echo $blog["video"];?>?byline=0&portrait=0" width="400" height="225" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <br />
            <?php
}
?>
            <p><?php echo UTil::bbCode(nl2br(htmlspecialchars($blog["body"])));?></p>
<?php if (!isset($noComments)) {
	?>
        <hr />
        <h4><?php echo $blog["comments"];?> Comment(s)</h4>
        <?php if ($blog["comments"] > 0) {
		$comments = get_comments_by_id($blog["blogId"]);
		foreach ($comments as $comment) {
			include "views/_comment.php";
		}
	}?>
        <?php global $guest;if ($guest == "notGuest") {?>
        <form class="form-horizontal" method="post" action="/blog/<?php echo $blog['blogId'];?>/comment">
          <fieldset>
            <legend>New Comment</legend>
            <div class="form-group">
              <label for="textArea" class="col-xs-2 control-label">Comment</label>
              <div class="col-xs-10">
                <textarea class="form-control" rows="3" name="body" id="body"></textarea>
                <p class="help-block">Can format comment using bbcode style formating. Accepted formatting: <code data-toggle="tooltip" data-placement="top" title="<strong>[b]</strong> bold text <strong>[/b]</strong>">b</code>, <code data-toggle="tooltip" data-placement="top" title="<strong>[i]</strong> italic text <strong>[/i]</strong>">i</code>, <code data-toggle="tooltip" data-placement="top" title="<strong>[img]</strong> img/uqjweige_53db9c69a09de.png <strong>[/img]</strong>">img</code>, <code data-toggle="tooltip" data-placement="top" title="<strong>[url]</strong> www.google.com <strong>[/url]</strong>">url</code>, <code data-toggle="tooltip" data-placement="top" title="<strong>[code]</strong> &lt; p &gt; Example text &lt; /p &gt; <strong>[/code]</strong>">code</code>.</p>
              </div>
            </div>
                <div class="form-group">
              <div class="col-xs-10 col-xs-offset-2">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="commentType" name="critique" value="critique"> This is a critique.
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-3 col-xs-offset-9">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </fieldset>
        </form>
                <?php }?>

                <?php }?>
                 </div>
<?php if (!isset($noComments)) {
	?>            <div class="panel-footer">
                <p>Permalink: <a href="<?php echo Util::getHost();?>/blog/<?php echo $blog["slug"];?>"><?php echo Util::getHost();?>/blog/<?php echo $blog["slug"];?></a></p>
                <p>Public Permalink: <a href="<?php echo Util::getHost();?>/public/blog/<?php echo $blog["slug"];?>"><?php echo Util::getHost();?>/public/blog/<?php echo $blog["slug"];?></a></p>
            </div>

                <?php }?>

</div>


