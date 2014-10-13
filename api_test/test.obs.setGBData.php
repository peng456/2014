<?php
include "test_template.php";
##########

$data = array('access_token'=>'7317f1835d472ad1',
			  'longtitude'=>122.6776,
			  'latitude'=>45.3789,
			  'DTC_CNT'=>1,
			  'DTCFRZF'=>'0B1F',
			  'LOAD_PCT'=>255,
			  'ECT'=>128,
			  'MAP'=>255,
			  'RPM'=>63335,
			  'VSS'=>255,
			  'SPARKADV'=>255,
			  'IAT'=>128,
			  'MAF'=>65535,
			  'TP'=>255,
			  'RUNTM'=>65535,
			  'MIL_DIST'=>65535,
			  'FLI'=>128,
			  'CLR_DIST'=>65535,
			  'VPWR'=>65535,
			  'AAT'=>255,
			  'FUEL_TYP'=>255,
			  'APP_R'=>255);
echo 'obd:</br>';
var_dump($data);
echo '</br>';
request_api(BASE_HOST."vanet.obd.SetMainData",$data,'POST');

