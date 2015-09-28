<?php

/**
 * Helpers classe for page-elements.php template to present theme features.
 */
class PageElements {



	// Path to layouts.
	private $templates_path = '';



	/**
	 * Init variables ect.
	 */
	public function __construct() {
		$this->templates_path = get_template_directory() . '/templates';
	}



	/**
	 * Get list of available layouts.
	 */
	public function get_layouts() {

		// List of available layouts.
		$layouts = array();

		// Open dir.
		if ($handle = opendir($this->templates_path . '/layouts')) {

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
		if ($handle = opendir($this->templates_path . '/components')) {

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
	 * Check if this components has stylesheet.
	 */
	public function component_has_stylesheet($component) {

	}



}
