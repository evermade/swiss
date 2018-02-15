<ul class="c-list c-list--horizontal c-list--padded">
    <li class=""><?php _e('Share this page', 'swiss'); ?></li>
    <?php foreach ($services as $key => $value): ?>
    <li><a href="<?php echo $value['url'];?>" title="<?php _e('Share', 'swiss'); ?> <?php echo ucfirst($key);?>" class=""><i class="<?php echo $value['icon'];?>"></i> <?php echo ucfirst($key);?></a></li>
    <?php endforeach; ?>
</ul>