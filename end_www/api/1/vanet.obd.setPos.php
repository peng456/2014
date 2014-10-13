<?php
/**
 * OBD upload gps data (position) 
 *
 * @author liudanking
 */

$data = json_receive();
#echo 'in';
/*if (isset($data['pid']))
{
	# use pid to get device_id
	unset($data['pid']);
	if (!model('vanet_gpsdata')->add($data))
	{
		die_json_msg('db process error', 20002);
	}
	else
	{
		json_send();
	}
}
else
{
	die_json_msg('parameters invalid', 20001);
}*/
 $data = json_receive();
 
if (count($data) < 6)
	die_json_msg('parameter invalid', 10200);
	
$item = model('vanet_token')->get_one(array('token_type'=>'obd',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid');

unset($data['access_token']);
$data['nobd_id'] = $item['owner_id'];
if (!model('vanet_gpsdata')->add($data))
	die_json_msg('db fail');
	
json_send();