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

					$default_headers = array('Description' => 'Description', 'Tags' => 'Tags', 'Preview' => 'Preview');
					$filedata = get_file_data($this->templates_path . '/layouts/' . $entry, $default_headers);

					$preview = false;
					if ($filedata['Preview']) {
						$preview = true;
					}

					// Get css and js paths.
					$cssPath = '/assets/css/scss/components/_' . $this->get_component_asset_name($entry) . '.scss';
					$jsPath = '/assets/js/components/' . $this->get_component_asset_name($entry) . '.js';

					array_push($layouts, array(
						'filename' => $entry,
						'description' => $filedata['Description'],
						'tags' =>  !empty($filedata['Tags']) ? explode(',', $filedata['Tags']) : array(),
						'preview' => $preview,
						'csspath' => $cssPath,
						'cssexists' => file_exists(get_template_directory() . $cssPath),
						'jspath' => $jsPath,
						'jsexists' => file_exists(get_template_directory() . $jsPath),
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

		    while (false !== ($entry = readdir($handle))) {
				if ($entry != '.' && $entry != '..') {

					$default_headers = array('Description' => 'Description', 'Tags' => 'Tags', 'Preview' => 'Preview');
					$filedata = get_file_data($this->templates_path . '/components/' . $entry, $default_headers);

					$preview = false;
					if ($filedata['Preview']) {
						$preview = true;
					}

					// Get css and js paths.
					$cssPath = '/assets/css/scss/components/_' . $this->get_component_asset_name($entry) . '.scss';
					$jsPath = '/assets/js/components/' . $this->get_component_asset_name($entry) . '.js';

					array_push($layouts, array(
						'filename' => $entry,
						'description' => $filedata['Description'],
						'tags' =>  !empty($filedata['Tags']) ? explode(',', $filedata['Tags']) : array(),
						'preview' => $preview,
						'csspath' => $cssPath,
						'cssexists' => file_exists(get_template_directory() . $cssPath),
						'jspath' => $jsPath,
						'jsexists' => file_exists(get_template_directory() . $jsPath),
						'name' => '.' . str_replace('.php', '', $entry)
					));
				}
		    }

		    closedir($handle);
		}

		return $layouts;

	}



	/**
	 *  Return an asset name for component. Asset name is
	 *  a name used to load CSS and JS files. Asset name is the element name
	 *  without modifiers.
	 *
	 *  Ex: component--large.php => component
	 *  Ex: hero--videobg.php => video
	 */
	public function get_component_asset_name($filename) {

		$without_extension = preg_replace('/\.php$/', '', $filename);
		return preg_replace('/\-\-.*/', '', $without_extension);

	}



	/**
	 * Get list of all mixins.
	 */
	public function get_mixins() {

		// List of available layouts.
		$layouts = array();

		// Open dir.
		if ($handle = opendir(get_template_directory() . '/assets/css/scss/mixins')) {

		    while (false !== ($entry = readdir($handle))) {
				if ($entry != '.' && $entry != '..') {

					$default_headers = array('Description' => 'Description', 'Tags' => 'Tags', 'Preview' => 'Preview');
					$filename = get_template_directory() . '/assets/css/scss/mixins/' . $entry;
					$filedata = get_file_data($filename, $default_headers);

					$preview = false;
					if ($filedata['Preview']) {
						$preview = true;
					}

					array_push($layouts, array(
						'filename' => $entry,
						'description' => $filedata['Description'],
						'tags' =>  !empty($filedata['Tags']) ? explode(',', $filedata['Tags']) : array(),
						'preview' => $preview,
						'name' => $entry,
						'definitions' => $this->get_mixin_definitions(file_get_contents($filename))
					));
				}
		    }

		    closedir($handle);
		}

		return $layouts;

	}



	/**
	 * Extract mixin definitions from source.
	 */
	public function get_mixin_definitions($source) {

		$definitions = array();

		$rows = explode("\n", $source);

		foreach ($rows as $row) {

			// Is mixin row.
			if (preg_match('/@mixin/', $row)) {

				// Remove bracket.
				$row = str_replace('{', '', $row);

				// Add color coding.
				$row = preg_replace("/(@mixin)/i", "<span style='color:grey'>$1</span>", $row);
				//$row = preg_replace("/@mixin(.*)/i", "<span style='color:red'>$1</span>", $row);

				// Add to list.
				array_push($definitions, $row);

			}

		}

		return $definitions;

	}

	static public function get_meta($file=null){
		$default_headers = array('Description' => 'Description', 'Tags' => 'Tags', 'Preview' => 'Preview');
		return get_file_data($file, $default_headers);
	}

}
