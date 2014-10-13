<?php
include "test_template.php";
##########

$data = array('access_token'=>ACCESS_TOKEN,
			  'car_id'=>4,
			  'license'=>'京A 00001');
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.updateCar",$data,'POST');


$data = array('access_token'=>ACCESS_TOKEN,
			  'car_id'=>5,
			  'sn'=>'user1',
			  'pw'=>'pw1',
			  'vin'=>'p09012lwgeg12',
			  'license'=>'京A 00002');
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.updateCar",$data,'POST');

