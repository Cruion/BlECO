<div class="col-xs-2">
    <a href="<?php echo Util::getHost(); ?>/public/groups/<?php echo $group["slug"]; ?>" >
        <img src="/<?php echo $group["groupIcon"]; ?>" alt="<?php echo $group["name"]; ?>" class="img-thumbnail" />
        <div class="well well-sm" style="overflow-x: auto">
            <?php $posts = get_group_blogs($group["groupId"]); ?>
            <p class="text-center smallCap"><strong><?php echo $group["name"]; ?></strong> <span class="badge pull-right"><?php echo count($posts); ?></p>
        </div>
    </a>
</div>