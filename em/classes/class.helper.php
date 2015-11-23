<?php
/**
 * A class with generic helper methods
 */
class Helper {

	/**
	 * [animate description]
	 * @param  string $classes           [description]
	 * @param  array  $defaults_selected [description]
	 * @return [type]                    [description]
	 */
	static function animate($classes='animated fadeInUp', $defaults_selected=array()){

		$defaults = array(
			'background'=>'animatedsuperslow fadeIn animateddelay1',
			'heading'=>'animatedslow fadeIn',
			'el-up'=>'animated fadeInUp',
			'el-in'=>'animated fadeIn',
		);

		if(is_array($defaults_selected)){
			foreach ($defaults_selected as $value) {
				if(array_key_exists($value, $defaults)) $classes .= ' '.$defaults[$value];
			}
		}

		//lets cleanse
		$classes = implode(' ', array_unique(explode(' ', $classes)));

		echo sprintf('data-animate="%s"', $classes);
		return true;
	}

	/**
	 * [image description]
	 * @param  [type] $obj  [description]
	 * @param  string $size [description]
	 * @return [type]       [description]
	 */
	static function image($img=null, $size='large', $classes=''){
		if(isset($img) && is_array($img) && isset($img['sizes'][$size])){
			$caption = (!empty($img['cpation']))? $img['cpation'] : basename($img['sizes'][$size]);
			return '<img src="'.$img['sizes'][$size].'" alt="'.$caption.'" class="'.$classes.'" />';
		}
		else {
			return false;
		}
	}

	/**
	 * a generic sprintf for handling both arrays and single strings for quick if templating
	 * @param  string $str   [description]
	 * @param  [type] $input [description]
	 * @return [type]        [description]
	 */
	static function sprint($str='', $input){

		//if an array
		if(is_array($input) && !empty($input)){

			$broken = false;
			$data = array();

			foreach($input as $field){
				if(!empty($field)){
					$data[] = $field;
				}
				else {
					$broken = true;
					break;
				}
			}

			if(!empty($data) && !$broken){
				return vsprintf($str, $data);
			}
		}
		elseif(!empty($input)) {
			//else just a single sprint
			return sprintf($str, $input);
		}

		return null;
	}

	/**
	 * [excerpt description]
	 * @param  [type]  $str   [description]
	 * @param  integer $limit [description]
	 * @return [type]         [description]
	 */
	static public function excerpt($str, $limit = 255){
		$strlen = strlen($str);	
		return ($strlen>=$limit) ? substr($str, 0, $limit)."&hellip;" : $str;		
	}
	
	/**
	 * [truncate description]
	 * @param  [type]  $s      [description]
	 * @param  [type]  $l      [description]
	 * @param  string  $e      [description]
	 * @param  boolean $isHTML [description]
	 * @return [type]          [description]
	 */
	public static function truncate($s, $l, $e = '...', $isHTML = false){
		$i = 0;
		$tags = array();
		if($isHTML){
			preg_match_all('/<[^>]+>([^<]*)/', $s, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
			foreach($m as $o){
				if($o[0][1] - $i >= $l)
					break;
				$t = substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
				if($t[0] != '/')
					$tags[] = $t;
				elseif(end($tags) == substr($t, 1))
					array_pop($tags);
				$i += $o[1][1] - $o[0][1];
			}
		}
		return substr($s, 0, $l = min(strlen($s),  $l + $i)) . (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '') . (strlen($s) > $l ? $e : '');
	}

	/**
	 * [js_log description]
	 * @param  string $info [description]
	 * @return [type]       [description]
	 */
	static function js_log($info=''){
	    echo "<script>console.log(".json_encode($info).");</script>";
	}

	static function is_dev(){
		return (defined('WP_ENV') && WP_ENV=='development')? true : false;
	}

	/**
	 * [lorem description]
	 * @param  integer $number [description]
	 * @return [type]          [description]
	 */
	static function lorem($number=1){
		$str = 'This is a paragraph of text. ';
		
		for($i=0; $i<$number; $i++){
			$str .= $str;
		}

		return $str;

	}

	/**
	 * [log description]
	 * @param  [type] $msg [description]
	 * @return [type]      [description]
	 */
	static public function log($msg=null){
		if(defined('WP_DEBUG') && WP_DEBUG){
			echo "<pre>"; print_r($msg); echo "</pre>"; 
			return true;
		}
		return false;
	}
}