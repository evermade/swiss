a bare ass wordpress theme.

clone me.
sudo npm install
bower install
gulp

and enjoy :)

Some dev notes

In best use with the WP Build via Composer.

Try to use the same variables names across blocks, by resetting the value when reused rather than creating yet another variable in memory.

If you use setup_postdata to setup post data within a template be sure to wp_reset_postdata to return the main query obj back to original post.

