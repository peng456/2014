<?php

/**
 * API 3.7
 * 获取处理行程obd数据
 *
 * @author deanmongel 2014.07.17
 */

 $data = json_receive() ;
 
if (!isset($data['access_token']))
{
	die_json_msg('parameter invalid', 10100);
} 
	
$item = model('vanet_token')->get_one(array('token_type'=>'obd',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid');

$nobd_id = (int)$item['owner_id'];
$car_data = model('vanet_nobd')->get_one(array('nobd_id'=>$nobd_id) ) ;


$trip_data = $db->get_all("SELECT * from end_vanet_car_trip where car_id=$car_data[car_id] order by car_trip_id desc limit 0,1 ") ;
if(!$trip_data)
{
	$trip_data[0]['e_time'] = 0 ;
}
$end_time = time() ;

$data = $db->get_all("SELECT * from end_vanet_obds12 where nobd_id=$nobd_id and(create_time < $end_time and create_time > {$trip_data[0]['e_time']} ) order by obds12_id desc") ;

json_send($data) ; 