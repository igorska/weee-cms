<div class="" style="overflow: hidden; background: #f9f9f9; height: 50px; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
    <div class="span1" style="margin-left: 0px;">
        <a href="<?php echo $model->href; ?>"><img src="<?php echo $model->avatar; ?>" class="avatar"/></a>
    </div>

    <div class="span7" style="margin-left: -2px;">      
        <a href="<?php echo $model->href; ?>" style="font-weight: bold; color: #333; font-size: 14px; line-height: 18px;"><h4><?php echo $model->name; ?></h4></a>
        <?php echo $model->folowers_count; ?> подписчиков
    </div>
</div>