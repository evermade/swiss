<?php namespace Em;

class Theme {

	static public function get_image_sizes( $size = '', $recheck=false) {

        global $_wp_additional_image_sizes;

	        $sizes = array();
	        $get_intermediate_image_sizes = get_intermediate_image_sizes();

	        // Create the full array with sizes and crop info
	        foreach( $get_intermediate_image_sizes as $_size ) {

	                if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

	                        $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
	                        $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
	                        $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );

	                } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

	                        $sizes[ $_size ] = array( 
	                                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
	                                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
	                                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
	                        );

	                }

	        }

	        // Get only 1 size if found
	        if ( $size ) {

	                if( isset( $sizes[ $size ] ) ) {
	                        return $sizes[ $size ];
	                } else {
	                        return false;
	                }

	        }

	        return $sizes;
	}

	static function default_img($size='thumbnail', $text='img'){

		$sizes = \Em\Theme::get_image_sizes();

		if(isset($sizes[$size])){
			return sprintf('http://fakeimg.pl/%sx%s/eeeeee/666/?text=%s', $sizes[$size]['width'], $sizes[$size]['height'], $text);
		}

		return 'http://fakeimg.pl/650x350/eeeeee/666/?text='.$text;
	}

}