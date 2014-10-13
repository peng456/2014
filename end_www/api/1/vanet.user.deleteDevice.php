<?php
/**
 * API 2.9
 * delete device
 *
 * @author deanmongel	2014.07.10
 */
 
$data = $_POST ;
if (!isset($data['access_token']) || !isset($data['vehicle_id']) )
{	
	#var_dump($data);
	die_json_msg('parameter invalid', 10001);
}

$item = model('vanet_token')->get_one(array('token_type'=>'user', 
										   'access_token'=>$data['access_token'],
										   'status'=>'valid'));
if (!$item)
{
	die_json_msg('parameter value error: access token invalid', 10000);
}
$user_id = $item['owner_id'] ;

$user_data = model('vanet_user')->get_one(array('user_id'=>$user_id)) ;

if (!$user_data)
{
	die_json_msg('database error: get user data fail',10003) ;
}

if ($user_data['default_carid'] == $data['vehicle_id'] )
{
	die_json_msg('can not delete binded car',20900) ;
}

if (!(model('vanet_usercar')->exists(array('user_id'=>$user_id,'car_id'=>$data['vehicle_id']))))
{
	die_json_msg('this car does not belong to you',20800) ;
}
# 删除车辆信息
unset($data['access_token']);

$usercar_data = $db->get_all("SELECT * from end_vanet_usercar where user_id=$user_id and car_id = {$data['vehicle_id']}");

if (!$usercar_data)
{
	die_json_msg('database error: get usercar error',10003) ;
}

#删除车辆用户关系

if (!model('vanet_usercar')->delete($usercar_data[0]['r_id']))
{
	die_json_msg('database error: delete usercar error',10003) ;
}


#删除obd设备和车辆关系

$obd_data = model('vanet_nobd')->get_one(array('car_id'=>$data['vehicle_id'])) ;

if (!$obd_data)
{
	die_json_msg('database error: get nobd error',10003) ;
}

if (!model('vanet_nobd')->update($obd_data['nobd_id'],array('car_id'=>'0')) )
{
	die_json_msg('database error: delete nobd car error',10003) ;
}


json_send() ;
