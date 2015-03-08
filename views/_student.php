<div class="col-xs-2">
    <a href="<?php echo Util::getHost(); ?>/students/<?php echo $student["userName"]; ?>" >
        <img src="<?php echo $student["userIcon"]; ?>" alt="<?php echo $student["givenName"]; ?> <?php echo $student["familyName"]; ?>" class="img-thumbnail" />
        <div class="well well-sm" style="overflow-x: auto">
            <?php $posts = get_student_blogs($student["userName"]); ?>
            <p class="text-center smallCap"><strong><?php echo $student["givenName"]; ?> <?php echo $student["familyName"]; ?></strong> <span class="badge pull-right"><?php echo count($posts); ?></p>
        </div>
    </a>
</div>