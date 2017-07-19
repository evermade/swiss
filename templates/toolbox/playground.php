<?php
    $files = glob(get_template_directory().'/templates/toolbox/playground/*.php');
?>

<br><br>

<form action="<?php echo home_url( add_query_arg( null, null )); ?>" method="GET" accept-charset="utf-8">
    <label for="file">Select a dev file</label>
    <select name="file" class="js-on-change-submit">
        <option value="">--</option>
    <?php foreach($files as $file): ?>
        <option value="<?php echo basename($file);?>"><?php echo basename($file);?></option>
    <?php endforeach; ?>
    </select>
    <input type="hidden" name="t" value="playground">
</form>

<br><br>

<?php if(isset($_GET['file'])): ?>
<?php
$template = get_template_directory().'/templates/toolbox/playground/'.$_GET['file'];
if(file_exists($template)) include($template);
?>
<?php endif; ?>