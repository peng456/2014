<?php
// include_once __DIR__."/../end_www/helper/common_api.php";
// $data = array('type'=>'user',
// 			  'username'=>'u',
// 			  'password'=>'u');
// $json_data = json_encode($data);
// echo do_post_request("http://localhost/vanet/api.php?p=auth",$json_data);
include "test_template.php";
##########

$data = array('type'=>'user',
			  'username'=>'u',
			  'password'=>'u');
echo 'user:</br>';
var_dump($data);
request_api("http://localhost/vanet/api.php?p=auth",$data);

$data = array('type'=>'maker',
			  'username'=>'m',
			  'password'=>'m');
echo '</br>maker:</br>';
var_dump($data);
request_api("http://localhost/vanet/api.php?p=auth",$data);

$data = array('type'=>'device',
			  'mid'=>'mid',
			  'did'=>'2013',
			  'token'=>'2013');
echo '</br>device:</br>';
var_dump($data);

request_api("http://localhost/vanet/api.php?p=auth",$data);

