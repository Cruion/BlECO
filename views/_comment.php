<blockquote>
    <?php if ($comment["critique"] == true) { ?>
    <span class="label label-info">Critique</span>
    <p></p>
    <?php } ?>
    <p><?php echo UTil::bbCode(nl2br(htmlspecialchars($comment["body"]))); ?></p>
    <small class="smallCap"><?php echo $comment["givenName"] . " " . $comment["familyName"] . " [" . $comment["name"] . "]"; ?> - <?php echo date("D j F Y\, g:i a", strtotime($comment["posted"])); ?></small>
</blockquote>