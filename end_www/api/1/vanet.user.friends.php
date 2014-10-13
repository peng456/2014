<?php

/**
 * API 2.16
 * get friends info
 *
 * @author deanmongel  2014.07.09
 */

 $data = $_POST ;
 
if (!isset($data['access_token']))
{
	die_json_msg('parameter invalid', 10001);
} 
	
$item = model('vanet_token')->get_one(array('token_type'=>'user',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid',10000);

$user_id = (int)$item['owner_id'];

//$friends_count = get_query_item_count("SELECT count(*) from end_vanet_user_friends where user_id_a=$user_id or user_id_b=$user_id");

$data = $db->get_all("SELECT * from end_vanet_user_friends where user_id_a=$user_id order by id desc ");

$friends_count = 0 ;

foreach ($data as $key => $value) 
{
	$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $value[user_id_b]") ;
	if (!$data_user) 
	{
		die_json_msg('database error: get friends info fail 1', 10003) ;
	}

	$friends_data[$friends_count]['user_id'] = $data_user[0]['user_id'] ;
	$friends_data[$friends_count]['portrait'] = $data_user[0]['avatar'] ;
	$friends_data[$friends_count]['user_friendstate'] = $value['friend_state'] ;

	$socre_data = $db->get_all("SELECT * from end_vanet_car_score where car_id = {$data_user[0]['default_carid']} ") ;
	$friends_data[$friends_count]['user_grade'] = $socre_data[0]['grade'] ; 

	$share_data = $db->get_all("SELECT * from end_vanet_user_share where (shareuser_id = $value[user_id_b] and touser_id = $user_id) and share_state <> 0") ;
	
	if ($share_data['share_state'] >1 && $share_state < time())
	{
		if (!model('end_vanet_user_share')->update($share_data['share_id'],array('share_state'=>0))) die_json_msg('database error: update share state fail 1', 10003) ;
		$share_data = NULL ;
	}

	if ($share_data)
	{
		$friends_data[$friends_count]['user_longitude'] = $data_user[0]['longitude'] ;
		$friends_data[$friends_count]['user_latitude'] = $data_user[0]['latitude'] ;
		$vehicle_count = 0 ; 
		foreach ($share_data as $key => $value) 
		{
			$car_data = $db->get_all("SELECT * from end_vanet_car where car_id = $value[sharecar_id] ") ;
			$vehicle_data[$vehicle_count]['vehicle_brand'] = $car_data[0]['brand'] ;
			$vehicle_data[$vehicle_count]['vehicle_model'] = $car_data[0]['model'] ;
			$vehicle_data[$vehicle_count]['vehicle_avatar'] = $car_data[0]['vehicle_avatar'] ;
			$vehicle_data[$vehicle_count]['vehicle_name'] = $car_data[0]['vehicle_name'] ;

			$nobd_id =  $db->get_all("SELECT * from end_vanet_nobd where car_id = $value[sharecar_id] ") ;
			$gps_data =  $db->get_all("SELECT * from end_vanet_gpsdata where nobd_id = {$nobd_id[0]['nobd_id']} order by create_time desc limit 0,1") ;
			$vehicle_data[$vehicle_count]['vehicle_longitude'] = $gps_data[0]['longtitude'] ;
			$vehicle_data[$vehicle_count]['vehicle_latitude'] = $gps_data[0]['latitude'] ;
			$vehicle_count ++ ;
		}
		$friends_data[$friends_count]['vehicle_count'] = $vehicle_count ;
		$friends_data[$friends_count]['vehicle_data'] = $vehicle_data ;
	}
	$friends_count ++ ;
}

$data = $db->get_all("SELECT * from end_vanet_user_friends where user_id_b=$user_id order by id desc ");
foreach ($data as $key => $value) 
{
	$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $value[user_id_a]") ;
	if (!$data_user) 
	{
		die_json_msg('database error: get friends info fail 2', 10003) ;
	}

	$friends_data[$friends_count]['user_id'] = $data_user[0]['user_id'] ;
	$friends_data[$friends_count]['portrait'] = $data_user[0]['avatar'] ;
	$friends_data[$friends_count]['user_friendstate'] = $value['friend_state'] ;

	$socre_data = $db->get_all("SELECT * from end_vanet_car_score where car_id = {$data_user[0]['default_carid']} ") ;
	$friends_data[$friends_count]['user_grade'] = $socre_data[0]['grade'] ; 

	$share_data = $db->get_all("SELECT * from end_vanet_user_share where (shareuser_id = $value[user_id_a] and touser_id = $user_id) and share_state <> 0") ;
	
	if ($share_data['share_state'] >1 && $share_state < time())
	{
		if (!model('end_vanet_user_share')->update($share_data['share_id'],array('share_state'=>0))) die_json_msg('database error: update share state fail 2', 10003) ;
		$share_data = NULL ;
	}

	if ($share_data)
	{
		$friends_data[$friends_count]['user_longitude'] = $data_user[0]['longitude'] ;
		$friends_data[$friends_count]['user_latitude'] = $data_user[0]['latitude'] ;
		$vehicle_count = 0 ; 
		foreach ($share_data as $key => $value) 
		{
			$car_data = $db->get_all("SELECT * from end_vanet_car where car_id = $value[sharecar_id] ") ;
			$vehicle_data[$vehicle_count]['vehicle_brand'] = $car_data[0]['brand'] ;
			$vehicle_data[$vehicle_count]['vehicle_model'] = $car_data[0]['model'] ;
			$vehicle_data[$vehicle_count]['vehicle_avatar'] = $car_data[0]['vehicle_avatar'] ;
			$vehicle_data[$vehicle_count]['vehicle_name'] = $car_data[0]['vehicle_name'] ;

			$nobd_id =  $db->get_all("SELECT * from end_vanet_nobd where car_id = $value[sharecar_id] ") ;
			$gps_data =  $db->get_all("SELECT * from end_vanet_gpsdata where nobd_id = {$nobd_id[0]['nobd_id']} order by create_time desc limit 0,1") ;
			$vehicle_data[$vehicle_count]['vehicle_longitude'] = $gps_data[0]['longtitude'] ;
			$vehicle_data[$vehicle_count]['vehicle_latitude'] = $gps_data[0]['latitude'] ;
			$vehicle_count ++ ;
		}
		$friends_data[$friends_count]['vehicle_count'] = $vehicle_count ;
		$friends_data[$friends_count]['vehicle_data'] = $vehicle_data ;
	}
	$friends_count ++ ;
}

$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $user_id") ;
if (!$data_user) 
{
	die_json_msg('database error: get user info fail', 10003) ;
}

$nobd_id =  $db->get_all("SELECT * from end_vanet_nobd where car_id = {$data_user[0]['default_carid']} ") ;
$gps_data =  $db->get_all("SELECT * from end_vanet_gpsdata where nobd_id = {$nobd_id[0]['nobd_id']} order by create_time desc limit 0,1") ;
$obd_data = $db->get_all("SELECT * from end_vanet_obds12 where nobd_id = {$nobd_id[0]['nobd_id']} order by create_time desc limit 0,1") ;

json_send(array('user_longitude'=>$data_user[0]['longitude'],
				'user_latitude'=>$data_user[0]['latitude'],
				'portrait'=>$data_user[0]['avatar'],
				'vehicle_longitude'=>$gps_data[0]['longtitude'],
				'vehicle_latitude'=>$gps_data[0]['latitude'],
				'vehicle_faultcount'=>$obd_data[0]['DTC_CNT'],
				'vehicle_voltage'=>$obd_data[0]['VPWR'],
				'friends_count'=>$friends_count,
				'friends'=>$friends_data,
				));