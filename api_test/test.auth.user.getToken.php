<?php
include "test_template.php";
##########

$data = array('phone'=>'u',
			  'password'=>'p');
echo 'user:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.auth.user.getToken",$data,'POST');

