<?php
include "test_template.php";
##########

$data = array('access_token'=>"f313e38dfb990557b49f475d42e89237ddda905a34a086fa48e7f26d9894242b",
			  'obd_imei'=>'123456',
			  'obd_pw'=>'654321',
			  'vehicle_name'=>'test1',
			  'vehicle_avatar'=>'avatar1',
			  'vehicle_brand'=>'audi',
			  'vehicle_type'=>'a8',
			  'init_mile'=>'1884',
			  'vin'=>'159753');
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.addDevice",$data,'POST');