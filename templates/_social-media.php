<?php if (empty($data)) {
    return false;
} ?>

<ul class="c-social-media-ul">

    <?php foreach ($data as $key => $value): ?>

        <li><a href="<?php echo $value['url']; ?>"><i class="fab fa-<?php echo $value['service']; ?>" aria-hidden="true"></i></a></li>

    <?php endforeach; ?>

</ul>