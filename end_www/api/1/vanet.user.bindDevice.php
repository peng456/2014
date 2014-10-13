<?php

/**
 * API 2.8
 * bind a car to user
 * @author deanmongel 2014.07.09
 */

 $data = $_POST ;

if (!isset($data['access_token']) || !isset($data['vehicle_id']) )
{
	die_json_msg('parameter invalid', 10001);
} 
	
$item = model('vanet_token')->get_one(array('token_type'=>'user',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid',10000);

$user_id = (int)$item['owner_id'];

if (!(model('vanet_usercar')->exists(array('user_id'=>$user_id,'car_id'=>$data['vehicle_id']))))
{
	die_json_msg('this car does not belong to you',20800) ;
}

if (!($result = model('vanet_user')->update($user_id,array('default_carid'=>$data['vehicle_id']))))
{
	die_json_msg('database error: update default_carid error', 10003) ;
}

json_send($result);