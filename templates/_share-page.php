<div class="c-share">
    <h6 class="c-share__title"><?php _e('Share:', 'swiss'); ?></h6>
    <ul class="c-share__list">
        <?php foreach ($services as $key => $value): ?>
            <li>
                <a href="<?php echo $value['url'];?>" title="<?php _e('Share on ', 'swiss'); echo ucfirst($key);?>">
                    <i class="<?php echo $value['icon'];?>"></i>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>