<?php
$json = array(); //an example of a json response to give to a js script

$json['errors'] = array();//for errors
$json['data'] = array(); //for any custom data needing to be sent across

$input = $_POST; //get our input post, get, request, you choose

//some validation rules
$validation = array(
	'paged'=> array('msg'=>'paged required.', 'required'=>true, 'filter'=>FILTER_SANITIZE_NUMBER_INT),
	'per_page'=> array('msg'=>'Per Page', 'required'=>true, 'filter'=>FILTER_SANITIZE_NUMBER_INT),
);

// some basic validation, maybe better with a validation class later
foreach($validation as $k => $v){

	if(isset($v['required']) && $v['required']){

		//if set lets cleanse it
	    if (isset($input[$k])) {
	    	$input[$k] = filter_var($input[$k], $v['filter']);
	    }
	    else {
	    	$json['errors'][$k] = $v['msg'];
	    }
	}
}

//so we have no errors lets get us some data
if(sizeof($json['errors'])==0){

	//a generic WP_Query
	$args = array(
		'post_type'=>'post',
		'paged' => $input['paged'],
		'posts_per_page'=>$input['per_page']
	);

	$custom_posts = new WP_Query($args);

	global $post;//we need access to the global post object

	if($custom_posts->found_posts > 0){

		$json['data']['posts'] = $custom_posts->found_posts;

		ob_start();

		foreach($custom_posts->posts as $key => $post){

			setup_postdata($post); 

			include(get_template_directory().'/templates/blog/post-small.php');

		}

		$json['data']['html'] = ob_get_contents();
		ob_clean();
	}
	else {
		$json['errors']['end'] = 'No posts found.';
	}
}


header('Content-type: application/json;');
echo json_encode($json);