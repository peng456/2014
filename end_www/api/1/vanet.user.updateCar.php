<?php
/**
 * 用户更新车辆信息（含OBD信息）
 *
 * @author liudanking	2013.08.09
 */
 
$data = json_receive();
$item = auth_user($data);

# 检查car id 参数
unset($data['access_token']);
if (!isset($data['car_id']))
	die_json_message('car id is missing', 10202);

# 是否是该用户拥有的车辆
if (!model('vanet_usercar')->get_one(array('user_id'=>$item['owner_id'], 'car_id'=>$data['car_id'])))
	die_json_msg('car id is invalid', 10203);
	
if (isset($data['sn']) && isset($data['pw']))
{
	# 是否是合法的OBD
	$obd = model('vanet_nobd')->get_one(array('sn'=>$data['sn'], 'pw'=>$data['pw']));
	if (!$obd)	die_json_msg('parameter value error: sn pw invalid', 10101);
	# 必须是本车的OBD才让绑定
	if (!($obd['car_id'] == 0 || $obd['car_id'] == $data['car_id']))
		die_json_msg('sn pw already be used', 10201);
	# 更新nobd信息
	$data_obd = array('car_id'=>$data['car_id'], 'sim_no'=>$data['sim_no']);
	if (!model('vanet_nobd')->update($obd['nobd_id'], $data_obd))
		die_json_msg('database error: update nobd fail', 10102);
	# 更新车辆信息
	$car_id = $data['car_id'];
	$keys = array('vin',
				  'license',
				  'init_mile',
				  'current_mile',
				  'engine_size');
	$data_car = array_key_filter($data, $keys);
	#var_dump($data_car);
	if (!model('vanet_car')->update($car_id, $data_car))	
		die_json_msg('database error: add car fail', 10102);
	json_send(array('ok'));
}
else
{
	unset($data['sn']);
	unset($data['pw']);
	$car_id = $data['car_id'];
	unset($data['car_id']);
	if (!model('vanet_usercar')->get_one(array('user_id'=>$item['owner_id'], 'car_id'=>$car_id)))
		die_json_msg('car not found', 10200);
	if (!model('vanet_car')->update($car_id, $data))	
		die_json_msg('database error: add car fail', 10102);
	json_send(array('ok'));
}