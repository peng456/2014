<?php
include "test_template.php";
##########

$data = array('access_token'=>"f313e38dfb990557b49f475d42e89237ddda905a34a086fa48e7f26d9894242b",
			  'friendid'=>3);
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.agreeInvite",$data,'POST');