<?php
include "test_template.php";
##########

$data = array('sn'=>'user1',
			  'pw'=>'pw1');
echo 'obd:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.auth.obd.getToken",$data,'POST');

