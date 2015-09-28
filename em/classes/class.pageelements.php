<?php

/**
 * Helpers classe for page-elements.php template to present theme features.
 */
class PageElements {



	// Path to layouts.
	private $path_layouts = '';

	// Path to components.
	private $path_components = '';



	/**
	 * Init variables ect.
	 */
	public function __construct() {
		$this->path_layouts = get_template_directory() . '/templates/layouts';
		$this->path_components = get_template_directory() . '/templates/components';
	}



	/**
	 * Get list of available layouts.
	 */
	public function get_layouts() {

		// List of available layouts.
		$layouts = array();

		// Open dir.
		if ($handle = opendir($this->path_layouts)) {

		    /* This is the correct way to loop over the directory. */
		    while (false !== ($entry = readdir($handle))) {
				if ($entry != '.' && $entry != '..') {
					array_push($layouts, array(
						'filename' => $entry,
						'name' => '.' . str_replace('.php', '', $entry)
					));
				}
		    }

		    closedir($handle);
		}

		return $layouts;

	}



	/**
	 * Get list of available components.
	 */
	public function get_components() {

		// List of available layouts.
		$layouts = array();

		// Open dir.
		if ($handle = opendir($this->path_components)) {

		    /* This is the correct way to loop over the directory. */
		    while (false !== ($entry = readdir($handle))) {
				if ($entry != '.' && $entry != '..') {
					array_push($layouts, array(
						'filename' => $entry,
						'name' => '.' . str_replace('.php', '', $entry)
					));
				}
		    }

		    closedir($handle);
		}

		return $layouts;

	}



}
