<?php
include "test_template.php";
##########

$data = array('access_token'=>"04712ff542a0f4c69c420446af141d1d3baf72d889a53121f822fe916b9af2f6",
			  'longitude'=>123.456,
			  'latitude'=>789.123);
echo 'request data:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.user.positionUpload",$data,'POST');
