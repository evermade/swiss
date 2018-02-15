# Swiss

The bestest WordPress theme Evermade.

## Requirements

* [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/) plugin
* Cache busting at your Nginx or apache level, see [https://github.com/h5bp/server-configs-nginx/blob/master/h5bp/location/cache-busting.conf](https://github.com/h5bp/server-configs-nginx/blob/master/h5bp/location/cache-busting.conf)

## Usage

To be primarily used in a [Dockerpress build](https://bitbucket.org/evermade/dockerpress).

## General

* Briefly discuss any features of this project.

### Everblox

Please see [here](https://evermade.atlassian.net/wiki/spaces/EV/pages/432701441/Development) for more.

### Front end

* Using Bootstrap, mostly commented out, using the grid only.
* Font Awesome is in use and available out of the box
* All front end dependencies must go through npm, 3 digit versioning

### Actions/Hooks/Filters

* A couple of hooks to remove the redundant WP version, extra info meta tags in the header.
* An ACF admin JS hook to collapse all ACF blocks by default in the WP Admin.
* We have added a `Swiss` text domain for languages. An example `<?php _e('Enjoy', 'swiss'); ?>`
* We have registered a custom shortcode for buttons in the TinyMCE WP Admin editor

## Tests

Coming soon, if you beat me to it, please comment here :)

## Notes

* Any code please namespace.

## Issues

If you have an issue or have found a bug, please [create an issue](https://bitbucket.org/evermade/swiss/issues/new).

## Contributors

* Paul Stewart
