<?php
include_once __DIR__."/../end_www/helper/common_api.php";

define('ACCESS_TOKEN', 'f313e38dfb990557b49f475d42e89237ddda905a34a086fa48e7f26d9894242b');

if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false)
	define('BASE_HOST', 'http://'.$_SERVER['SERVER_NAME'].'/vanet/vanet/api.php?p=');
else
	define('BASE_HOST', 'http://'.$_SERVER['SERVER_NAME'].'/api.php?p=');


function request_api($url, $data, $method="POST")
{
	if ($method == 'POST')
	{
		$http_data = http_build_query($data);
		print_r($http_data) ;
		echo "<p>$url</p>";
		echo do_post_request($url, $http_data, $method);
	}
	elseif ($method == 'GET')
	{
		foreach ($data as $key => $value) {
			$url .= "&$key=$value";
		}
		echo "<p>$url</p>";
		echo do_post_request($url, $data, $method);
	}
}