<?php
/**
 * 用户删除车辆信息（含OBD信息）
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST ;
$item = auth_user($data);

# 检查car id 参数
unset($data['access_token']);
if (!isset($data['car_id']))
	die_json_message('car id is missing', 10202);

# 是否是该用户拥有的车辆
if (!($usercar = model('vanet_usercar')->get_one(array('user_id'=>$item['owner_id'], 'car_id'=>$data['car_id']))))
	die_json_message('car id is invalid', 10203);

# 删除车辆信息（这里只删除用户车辆关系）
if (!model('vanet_usercar')->delete($usercar['r_id']))
	die_json_msg('database error: remove car fail', 10102);
// $car = model('vanet_car')->get_one(array('car_id'=>$data['car_id']));
// if (!$car)	die_json_msg('car not found', 10200);	
if ($obd = model('vanet_nobd')->get_one(array('car_id'=>$data['car_id'])))
{
	if (!model('vanet_nobd')->update($obd['nobd_id'], array('car_id'=>0)))
		die_json_msg('database error: remove car fail', 10102);
}

json_send(array('ok'));