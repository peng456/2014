<?php

/**
 * API 2.17
 * get drivesense list
 *
 * @author deanmongel 2014.07.09
 */

 $data = $_POST ;
 
if (!isset($data['from']) && !isset($data['end']))
 	die_json_msg('parameter invalid', 10001);
	
$item = model('vanet_token')->get_one(array('token_type'=>'user',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid',10000);

$user_id = (int)$item['owner_id'];
$from = (int)$data['from'];
$end = (int)$data['end'];

$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $user_id") ;
if (!$data_user) 
{
	die_json_msg('database error: get user info fail', 10003) ;
}

$total_count = get_query_item_count("SELECT count(*) from end_vanet_car_trip where car_id={$data_user[0]['default_carid']} and ( (f_time > $from and f_time < $end) or (e_time > $from and e_time < $end) )");

$data = $db->get_all("SELECT * from end_vanet_car_trip where car_id={$data_user[0]['default_carid']} and ( (f_time > $from and f_time < $end) or (e_time > $from and e_time < $end) ) order by f_time ");

json_send(array('total_count'=>$total_count,
				'data'=>$data));