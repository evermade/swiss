<section class="b-toolbox">
    <div class="b-toolbox__container">
        <?php
            $files = glob(get_template_directory().'/templates/toolbox/playground/*.php');
        ?>

        <form class="b-toolbox__playground-form" action="<?php echo home_url( add_query_arg( null, null )); ?>" method="GET" accept-charset="utf-8">
            <p>Create files under /templates/toolbox/playground/. Try to find elements from <a href="http://codepen.evermade.fi/">Evermade's Codepen</a></p>
            <label for="file">Select a dev file</label>
            <select name="file" class="js-on-change-submit">
                <option value="">--</option>
            <?php foreach($files as $file): ?>
                <option value="<?php echo basename($file);?>"><?php echo basename($file);?></option>
            <?php endforeach; ?>
            </select>
            <input type="hidden" name="t" value="playground">
        </form>

    </div>
</section>

<?php if(isset($_GET['file'])): ?>
<?php
$template = get_template_directory().'/templates/toolbox/playground/'.$_GET['file'];
if(file_exists($template)) include($template);
?>
<?php endif; ?>