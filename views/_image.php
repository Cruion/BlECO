<div class="col-md-3">
    <a href="img/<?php echo $image["uri"]; ?>" data-lightbox="image-1" data-toggle="tooltip" data-placement="top" title="img/<?php echo $image["uri"]; ?>" data-title="<?php echo "<strong><em>img/".$image["uri"]."</em></strong><br />".$image["description"]."&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<strong>".$image["givenName"]." ".$image["familyName"]." [".$image["name"]."]</strong>" ?>"><img src="img/<?php echo $image["uri"]; ?>" alt="Uploaded image" class="img-thumbnail" /></a>
    <div class="well well-sm" style="overflow-x: auto">
        <p style="font-size: x-small" class="text-center">img/<?php echo $image["uri"]; ?></p>
        <hr />
        <p style="font-size: x-small" class="text-center smallCap"><strong><?php echo $image["givenName"]." ".$image["familyName"]; ?></strong></p>
        <p style="font-size: x-small" class="text-center smallCap"><?php echo $image["name"]; ?></p>
    </div>
</div>