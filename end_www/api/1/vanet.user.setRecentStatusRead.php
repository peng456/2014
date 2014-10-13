<?php

/**
 * API 2.15
 * set a trip to read
 * @author deanmongel 2014.07.09
 */

 $data = $_POST ;

if (!isset($data['access_token']) || !isset($data['trip_id']))
{
	die_json_msg('parameter invalid', 10001);
} 
	
$item = model('vanet_token')->get_one(array('token_type'=>'user',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid',10000);

$trip_id = $data['trip_id'] ;

if (!($result = model('vanet_car_trip')->update($trip_id,array('is_read'=>1))))
{
	die_json_msg('database error: update trip info fail', 10003) ;
}

json_send($result);