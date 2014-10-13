<?php
include "test_template.php";
##########

$data = array('sid'=>'9c56b2baaa71e71fcb6c7fb8694766e644fea9e7',
			  'access_token'=>'bdd477a386f5547a1db558c99ee5eed10dfc574db38f11572305f867bc8fb1d5',
			  'mid'=>'mid',
			  'did'=>'2013',
			  'token'=>'2013');
echo 'user:</br>';
var_dump($data);
echo '</br>';
request_api("http://localhost/vanet/api.php?p=bind_device",$data);

