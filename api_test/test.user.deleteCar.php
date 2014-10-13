<?php
include "test_template.php";
##########

$data = array('access_token'=>ACCESS_TOKEN,
			  'car_id'=>5);
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.deleteCar",$data,'POST');


