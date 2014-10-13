<?php
/**
 * set gps, obd base data
 *
 * @author liudanking
 */
 
 $data = json_receive();
 
if (count($data) < 20+2)
	die_json_msg('parameter invalid', 10200);
	
$item = model('vanet_token')->get_one(array('token_type'=>'obd',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid');

unset($data['access_token']);
$gps_data['nobd_id'] = $item['owner_id'];
$gps_data['longtitude']=$data['longtitude'];
$gps_data['latitude']=$data['latitude'];
unset($data['longtitude']);
unset($data['latitude']);

if (!model('vanet_gpsdata')->add($gps_data))
	die_json_msg('db fail');

$data['nobd_id'] = $item['owner_id'];
if (!model('vanet_obds12')->add($data))
	die_json_msg('db fail');
	
json_send();