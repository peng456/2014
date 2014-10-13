<?php

/**
 * API 2.19
 * get friends rank
 *
 * @author deanmongel  2014.07.09
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

//$friends_count = get_query_item_count("SELECT count(*) from end_vanet_user_friends where user_id_a=$user_id or user_id_b=$user_id");

$data = $db->get_all("SELECT * from end_vanet_user_friends where user_id_a=$user_id and friend_state = 0 order by id desc ");

$friends_id = 0 ;

foreach ($data as $key => $value) 
{
	$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $value[user_id_b] ") ;
	if (!$data_user) 
	{
		die_json_msg('database error', 10102) ;
	}
	$friends_data[$friends_id]['user_id'] = $data_user[0]['user_id'] ;
	$friends_data[$friends_id]['portrait'] = $data_user[0]['avatar'] ;

	$socre_data = $db->get_all("SELECT * from end_vanet_car_score where car_id = {$data_user[0]['default_carid']} ") ;
	$friends_data[$friends_id]['user_grade'] = $socre_data[0]['grade'] ; 

	$car_data = $db->get_all("SELECT * from end_vanet_car where car_id = {$data_user[0]['default_carid']} ") ;
	$friends_data[$friends_id]['vehicle_brand'] = $car_data[0]['brand'] ;
	$friends_data[$friends_id]['vehicle_model'] = $car_data[0]['model'] ;
	$friends_data[$friends_id]['vehicle_avatar'] = $car_data[0]['vehicle_avatar'] ;
	$friends_data[$friends_id]['vehicle_name'] = $car_data[0]['vehicle_name'] ;

	$friends_id ++ ;
}

$data = $db->get_all("SELECT * from end_vanet_user_friends where user_id_b=$user_id order by id desc ");
foreach ($data as $key => $value) 
{
	$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $value[user_id_a]") ;
	if (!$data_user) 
	{
		die_json_msg('database error', 10102) ;
	}
	$friends_data[$friends_id]['user_id'] = $data_user[0]['user_id'] ;
	$friends_data[$friends_id]['portrait'] = $data_user[0]['avatar'] ;

	$socre_data = $db->get_all("SELECT * from end_vanet_car_score where car_id = {$data_user[0]['default_carid']} ") ;
	$friends_data[$friends_id]['user_grade'] = $socre_data[0]['grade'] ; 

	$car_data = $db->get_all("SELECT * from end_vanet_car where car_id = {$data_user[0]['default_carid']} ") ;
	$friends_data[$friends_id]['vehicle_brand'] = $car_data[0]['brand'] ;
	$friends_data[$friends_id]['vehicle_model'] = $car_data[0]['model'] ;
	$friends_data[$friends_id]['vehicle_avatar'] = $car_data[0]['vehicle_avatar'] ;
	$friends_data[$friends_id]['vehicle_name'] = $car_data[0]['vehicle_name'] ;
	$friends_id ++ ;
}

$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $user_id") ;
if (!$data_user) 
{
	die_json_msg('database error: get user info fail', 10003) ;
}

$socre_data = $db->get_all("SELECT * from end_vanet_car_score where car_id = {$data_user[0]['default_carid']} ") ;
$car_data = $db->get_all("SELECT * from end_vanet_car where car_id = {$data_user[0]['default_carid']} ") ;

json_send(array('portrait'=>$data_user[0]['avatar'],
				'user_grade'=>$socre_data[0]['grade'],
				'vehicle_brand'=>$car_data[0]['brand'],
				'vehicle_model'=>$car_data[0]['model'],
				'vehicle_avatar'=>$car_data[0]['vehicle_avatar'],
				'vehicle_name'=>$car_data[0]['vehicle_name'],
				'friends_count'=>$friends_id,
				'friends'=>$friends_data,
				));