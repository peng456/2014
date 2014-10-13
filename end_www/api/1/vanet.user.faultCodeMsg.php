<?php

/**
 * API 2.18
 * get fault info list
 *
 * @author deanmongel
 */

$data = $_POST ;

if (!isset($data['access_token']))
{
	die_json_msg('parameter invalid', 10001);
}
	
$item = model('vanet_token')->get_one(array('token_type'=>'user',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid',10000);

$user_id = (int)$item['owner_id'];


$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $user_id") ;

if (!$data_user)
{
	die_json_msg('database error: get user info fail',10003) ;
}

$faultcode_data = $db->get_all("SELECT * from end_vanet_car_breakdown where car_id={$data_user[0]['default_carid']} and is_solve = 0 ");
$faultcode_count = 0 ;
foreach ($faultcode_data as $key => $value) 
{
	$faultinfo_data = $db->get_all("SELECT * from end_vanet_car_faultcode where code='{$value['fault_code']}'");
	$faultinfo_count = 0 ;
	foreach ($faultinfo_data as $key => $value2) 
	{
		$faultinfo_count ++ ;
		unset($faultinfo_data[$key]['faultcode_id']) ;
		unset($faultinfo_data[$key]['code']) ;
		unset($faultinfo_data[$key]['content']) ;	
	}
	$fault_data[$faultcode_count]['faultcode'] = $value['fault_code'] ;
	$fault_data[$faultcode_count]['fault_content_count'] = $faultinfo_count ;
	$fault_data[$faultcode_count]['content'] = $faultinfo_data ;
	$faultcode_count ++ ;
}

$car_data = $db->get_all("SELECT * from end_vanet_car where car_id = {$data_user[0]['default_carid']}") ;
if (1000 - $car_data[0]['maintenancemiles'] <= 500) 
{
	$reminding = 1 ;
}
else
{
	$reminding = 0 ;
}

json_send(array('reminding'=>$reminding,
				'remained_mile'=>1000 - $car_data[0]['maintenancemiles'],
				'count'=>$faultcode_count,
				'data'=>$fault_data));