<?php 

class animate {
	static function el($classes='animated fadeInUp', $defaults_selected=array()){

		$defaults = array(
			'background'=>'animatedsuperslow fadeIn animateddelay1',
			'heading'=>'animatedslow fadeIn',
			'el-up'=>'animated fadeInUp',
		);

		if(is_array($defaults_selected)){
			foreach ($defaults_selected as $value) {
				if(array_key_exists($value, $defaults)) $classes .= ' '.$defaults[$value];
			}
		}

		//lets cleanse
		$classes = implode(' ', array_unique(explode(' ', $classes)));

		echo sprintf('data-vp-add-class="%s"', $classes);
		return true;
	}
}