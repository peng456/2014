<?php

/**
 * API 2.14
 * get unread trip info
 * @author deanmongel 2014.07.09ç
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

if(!$data_user)
{
	die_json_msg('database error: get user info fail', 10003) ;
}

$total_count = get_query_item_count("SELECT count(*) from end_vanet_car_trip where car_id={$data_user[0]['default_carid']} and is_read = 0 order by e_time desc ");

$data = $db->get_all("SELECT * from end_vanet_car_trip where car_id={$data_user[0]['default_carid']} and is_read = 0 order by e_time desc ");

json_send(array('total_count'=>$total_count,
				'data'=>$data));