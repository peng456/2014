<?php
include "test_template.php";
##########

$data = array('access_token'=>"f313e38dfb990557b49f475d42e89237ddda905a34a086fa48e7f26d9894242b",
			  'receiver_id'=>3,
			  'duration'=>0);
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.positionShare",$data,'POST');