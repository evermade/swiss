# Swiss Theme

The bestest Wordpress theme Evermade.

## Requirements

* Advanced Custom Fields Pro plugin
* Cache busting at your nginx or apache level, see [https://github.com/h5bp/server-configs-nginx/blob/master/h5bp/location/cache-busting.conf](https://github.com/h5bp/server-configs-nginx/blob/master/h5bp/location/cache-busting.conf)

## Usage

* If using with Dockerpress when you are editing files ensure you run `em gulp` from the project app root so files are copied to `dist/`

## Theme Details

#### General

* Briefly discuss any features of this project, for example REST API

#### Gulp

* If you need to add more files to the Gulp watch, a JS or CSS library, then add it to the corresponding index in the `gulpfile.js` paths var in the project app root.

#### Front end magic

* Using Bootstrap, mostly commented out, using the grid only.
* Font Awesome is in use and available out of the box
* [Remodal](https://github.com/VodkaBears/Remodal#remodal) is the current implemented modal

#### Blocks

* **Scheme**, this allows users to create scheme of content within a page. It gracefully falls back if no scheme blocks are used on the page, where the default scheme is open in the header until another scheme block is found or the footer where the previous scheme is then  closed.
* **Columns block**, this allows users to create 1 - 4 horizontal columns of content.
* **Hero**, does what it says on the tin.

#### Actions/Hooks/Filters

* A couple of hooks to remove the redundant WP version, extra info meta tags in the header.
* An ACF admin JS hook to collapase all ACF blocks by default in the WP Admin.
* We have added a **Swiss** text domain for languages. An example `<?php _e('Enjoy', 'swiss'); ?>`
* We have registered a custom shortcode for buttons in the TinyMCE WP Admin editor

## Tests

Coming soon, if you beat me to it, please comment here :)


## Notes

* All front end dependencies must go through Bower, 3 digit versioning
* Any code please namespace.

## Contributors

* Paul Stewart