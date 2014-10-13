<?php
/**
 * 用户添加车辆信息（含OBD信息）
 * API 2.7
 * @author liudanking	2013.08.09
 *			deanmongel	2014.07.10
 */
 
$data = $_POST ;

if (!isset($data['access_token']) || !isset($data['obd_imei']) || !isset($data['obd_pw']) || !isset($data['vehicle_name']) || !isset($data['vehicle_brand']) || !isset($data['vehicle_type']) || !isset($data['init_mile']) || !isset($data['vin']))
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

# 添加车辆信息
unset($data['access_token']);
if (isset($data['obd_imei']) && isset($data['obd_pw']))
{
	# 是否是合法的OBD
	$obd = model('vanet_nobd')->get_one(array('sn'=>$data['obd_imei'], 'pw'=>$data['obd_pw']));
	if (!$obd)	die_json_msg('parameter value error: sn pw invalid', 20700);
	# 是否已经被绑定过了
	if ($obd['car_id'] > 0)
		die_json_msg('sn pw already be used', 20701);
	# 添加车辆信息
	$data_car = array('vin'=>$data['vin'],
					  'vehicle_name'=>$data['vehicle_name'],
					  'vehicle_avatar'=>$data['vehicle_avatar'],
					  'brand'=>$data['vehicle_brand'],
					  'model'=>$data['vehicle_type'],
					  'init_mile'=>$data['init_mile']);	
	$vin_data = model('vanet_car')->get_one(array('vin' => $data['vin']) );
	if ($vin_data) 
	{
		$car_id = $vin_data['car_id'] ;
		if (!(model('vanet_car')->update($vin_data['car_id'],$data_car)))	die_json_msg('database error:update car info error1', 10003);
	}
	else
	{
		if (!($car_id = model('vanet_car')->add($data_car)))	die_json_msg('database error:update car info error2', 10003);
	}
	if(!model('vanet_user')->update($item['owner_id'],array('default_carid'=>$car_id)))  die_json_msg('database error:update default_carid error', 10003);

	if (!model('vanet_usercar')->add(array('user_id'=>$item['owner_id'], 'car_id'=>$car_id)))
		die_json_msg('database error:update usercar error', 10003);
	# 更新nobd信息
	$data_obd = array('car_id'=>$car_id);
	if (!model('vanet_nobd')->update($obd['nobd_id'], $data_obd))
		die_json_msg('database error: update nobd fail', 10003);
	json_send();
}
else
{
	die_json_msg('parameter invalid', 10001) ;
}
