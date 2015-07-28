<?php
//an example of a json response to give to a js script
$json = array();

$json['status'] = 'ok'; //for quick check at js side
$json['errors'] = array();//for errors
$json['data'] = array(); //for any custom data needing to be sent across
$json['html'] = null; //html

$input = $_GET;//get our input post, get, request, you choose

//grab url/post data, set defaults
$input['offset'] = (isset($input['offset']))? sprintf('%d', $input['offset']) : 0;
$input['per_page'] = (isset($input['per_page']))? sprintf('%d', $input['per_page']) : 10;
$input['search'] = (isset($input['search']))? sprintf('%s', $input['search']) : null;

//some validation rules
$validation = array(
	// 'search'=> array('msg'=>'Search term required.')
);

// some basic validation, maybe better with a validation class
foreach($validation as $key => $y){
    if (!isset($input[$key]) || empty($input[$key])) {
        $json['errors'][$key] = $y['msg'];
    }
    else {
    	//lets cleanse our input data
        switch ($key) {
            case 'offset':
            case 'per_page':
                $input[$key] = filter_var($input[$key], FILTER_SANITIZE_NUMBER_INT);
                break;
            case 'email':
                $input[$key] = filter_var($input[$key], FILTER_VALIDATE_EMAIL);
                break;
            default:
                $input[$key] = filter_var($input[$key], FILTER_SANITIZE_STRING);
                break;
        }

        //if santizied and empty, dont use as its failed to be filtered
        if(!isset($input[$key])) $json['errors'][$key] = $y['msg'];
    }
}

//so we have no errors lets get us some data
if(sizeof($json['errors'])==0){

	//a generic WP_Query
	$args = array(
		'post_type'=>'post',
		's'=>$input['search'],
		'offset' => $input['offset'],
		'posts_per_page'=>$input['per_page']
	);

	$custom_posts = new WP_Query($args);

	global $post;//we need access to the global post object

	if($custom_posts->found_posts > 0){

		$json['data']['found_posts'] = $custom_posts->found_posts;

		ob_start();

		foreach($custom_posts->posts as $key => $post){

			setup_postdata($post); 

			include(get_template_directory().'/templates/post-small.php');

		}

		$json['html'] = ob_get_contents();
		ob_clean();
	}
	else {
		$json['html'] = 'No posts found.';
		$json['errors']['Posts'] = 'No posts found.';
	}

}

header('Content-type: application/json;');
echo json_encode($json);