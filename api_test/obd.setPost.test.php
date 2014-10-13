<?php
include "test_template.php";
##########

$data = array('pid'=>23457,
			  'longtitude'=>21.11,
			  'latitude'=>21.12,
			  'gps_time'=>134567345,
			  'speed'=>30.3,
			  'course'=>90.1);
echo 'user:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.obd.setPos",$data);

