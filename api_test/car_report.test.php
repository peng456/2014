<?php
include "test_template.php";
##########

$data = array('mid'=>'mid',
			  'sid'=>'40b810e8b2b47f8f2e6d7057fae31f7cf9ee2763',
			  'access_token'=>'88e19c9001afe4405a080a94b628167a7b96fc9324580086e71dcc028b1e0e7c',
			  'longtitude'=>13.378854,
			  'latitude'=>10.276783,
			  'time'=>1189898959,
			  'engine'=>0);
echo 'post data:</br>';
var_dump($data);
echo '</br>';
request_api("http://localhost/vanet/api.php?p=car_report",$data);

