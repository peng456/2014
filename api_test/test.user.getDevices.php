<?php
include "test_template.php";
##########

$data = array('access_token'=>"faa6a8b54ee9cdc5e0b400920fc53e2980ca1ba166ae705f1217ab271f6d2e52",
			  'from'=>1,
			  'count'=>2);
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.getDevices",$data,'POST');