<?php
/**
 * authenticate OBD, return access token to OBD
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['phone']) || !isset($data['password']))
{
	die_json_msg('parameter invalid', 10001);
}

$username = $data['phone'];
$password = $data['password'];
$item = model('vanet_user')->get_one(array('username'=>$username, 'password'=>$password));
if (!$item)
{
	die_json_msg('parameter value error: username password miss match', 10002);
}

# generate pub_id for obd
$db->query("update end_vanet_token set status='invalid' where token_type='user' and owner_id=$item[user_id] and status='valid'");
while (1)
{
	$new_token = hash_random($sn, 'sha256');
	$token = model('vanet_token')->get_one(array('token_type'=>'user', 
												 'owner_id'=>$item['user_id'], 
												 'status'=>'valid',
												 'access_token'=>$new_token));
	if (!$token)
	{
		if (!model('vanet_token')->add(array('access_token'=>$new_token,
											 'token_type'=>'user',
											 'owner_id'=>$item['user_id'],
											 'status'=>'valid')))
		{
			die_json_msg('database error:add token error', 10003);
		}

		$user_id = (int)$item['user_id'];
		$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $user_id") ;

		if (!$data_user) 
		{
			die_json_msg('database error: get user error', 10003) ;
		}

		$socre_data = $db->get_all("SELECT * from end_vanet_car_score where car_id = {$data_user[0]['default_carid']} ") ;
		$mile_data = $db->get_all("SELECT * from end_vanet_car where car_id = {$data_user[0]['default_carid']} ") ;

		$data = $db->get_all("SELECT * from end_vanet_usercar where user_id=$user_id");

		$device_id = 0 ;

		foreach ($data as $key => $value) 
		{
			$obd_data = $db->get_all("SELECT * from end_vanet_nobd where car_id = $value[car_id]") ;
			$device_data[$device_id]['obd_imei'] = $obd_data[0]['sn'] ;
			//$device_data[$device_id]['obd_pw'] = $obd_data[0]['pw'] ;
			$device_data[$device_id]['vehicle_id'] = $obd_data[0]['car_id'] ;

			$car_data = $db->get_all("SELECT * from end_vanet_car where car_id = $value[car_id] ") ;
			$device_data[$device_id]['vehicle_name'] = $car_data[0]['vehicle_name'] ;
			$device_data[$device_id]['vehicle_avatar'] = $car_data[0]['vehicle_avatar'] ;
			$device_data[$device_id]['vehicle_brand'] = $car_data[0]['brand'] ;
			$device_data[$device_id]['vehicle_type'] = $car_data[0]['model'] ;
			$device_data[$device_id]['init_mile'] = $car_data[0]['init_mile'] ;
			$device_data[$device_id]['current_mile'] = $car_data[0]['current_mile'] ;
			$device_data[$device_id]['engine_size'] = $car_data[0]['engine_size'] ;

			if (!$obd_data || !$car_data) 
			{
				die_json_msg('database error:get car info error', 10003) ;
			}
			
			$device_id ++ ;
		}




		json_send(array('access_token'=>$new_token,
						'expires_in'=>0,
						'averageFuel'=>$socre_data[0]['average_fuel'],
						'current_mile'=>$mile_data[0]['current_mile'],
						'averageFuelBill'=>$socre_data[0]['average_fuel_bill'],
						'speed'=>$socre_data[0]['speed'],
						'grade'=>$socre_data[0]['grade'],
						'run_time'=>$socre_data[0]['run_time'],
						'bind_id'=>$data_user[0]['default_carid'],
						'count'=>$device_id,
						'device_data'=>$device_data,
						));		
	}
}