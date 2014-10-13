<?php
include "test_template.php";
##########

$data = array('type'=>'user',
			  'username'=>'u',
			  'password'=>'u');
echo 'user:</br>';
var_dump($data);
request_api("http://www.itec2014.com/liudan.dev/api.php",$data);

