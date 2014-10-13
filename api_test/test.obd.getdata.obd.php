<?php
include "test_template.php";
##########

$data = array('access_token'=>ACCESS_TOKEN,
			  'from'=>1,
			  'count'=>2);
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.obd.getdata.obd",$data,'GET');


