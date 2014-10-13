<?php
include "test_template.php";
##########

$data = array('access_token'=>ACCESS_TOKEN,
			  'vin'=>'p09012lwgeg',
			  'license'=>'12312',
			  'init_mile'=>1212,
			  'current_mile'=>212,
			  'engine_size'=>1.8);
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.addCar",$data,'POST');


$data = array('access_token'=>ACCESS_TOKEN,
			  'sn'=>'user1',
			  'pw'=>'pw1',
			  'vin'=>'p09012lwgeg1',
			  'license'=>'川A CR141',
			  'init_mile'=>1212,
			  'current_mile'=>212,
			  'engine_size'=>1.8);
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.addCar",$data,'POST');

