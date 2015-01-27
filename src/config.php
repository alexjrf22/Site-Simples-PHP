<?php
//Get Route
function getRoute()
{
	$current_path = parse_url('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	return array_filter(explode('/',$current_path['path']));
}
//Fetch page content
function fetchContent()
{
	$routs = include __DIR__.DIRECTORY_SEPARATOR.'rotasValidas.php';
	$route = getRoute();

	if( empty($route) ){
		require_once __DIR__.DIRECTORY_SEPARATOR.'pages/home.php';
	}else{
		if(in_array($route[1], array_keys($routs))){
			require_once __DIR__.DIRECTORY_SEPARATOR.$routs[$route[1]];
		}else{
			http_response_code(404);
			require_once __DIR__.DIRECTORY_SEPARATOR.'pages/error.php';
		}
	}
}
