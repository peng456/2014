<?php
/**
 * 添加行程信息
 * API 3.6  
 * @author deanmongel	2014.07.18
 */
 
$data = json_receive() ;

if (!isset($data['access_token']) || !isset($data['miles']) )
{	
	#var_dump($data);
	die_json_msg('parameter invalid', 10001);
}

$item = model('vanet_token')->get_one(array('token_type'=>'obd', 
										   'access_token'=>$data['access_token'],
										   'status'=>'valid'));
if (!$item)
{
	die_json_msg('parameter value error: access token invalid', 10000);
}
$car_id = model('vanet_nobd')->get_one(array('nobd_id'=>$item['owner_id'])) ;

$usercar_data = model('vanet_usercar')->get_one(array('car_id'=>$car_id['car_id'])) ;
if (!$usercar_data)
{
	die_json_msg('database error: get user data fail',10003) ;
}
$data['user_id'] = $usercar_data['user_id'] ;

unset($data['access_token']);

$data['car_id'] = $car_id['car_id'] ;
if ($car_id || $data['e_time'] <= 1400000000 || $data['f_time'] >= $data['e_time'] )
{

	if (!($trip_id = model('vanet_car_trip')->add($data)))
	{
		die_json_msg('database error: add car trip fail', 10003);
	}

	$share_data = $db->get_all("SELECT * from end_vanet_user_share where sharecar_id = $car_id[car_id] and share_state = 1") ;
	if ($share_data)
	{
		foreach ($share_data as $key => $value) 
		{
			if (!model('vanet_user_share')->update($value['share_id'],array('share_state' =>0)) )
			{
				die_json_msg('database error: update share fail', 10003) ;
			}
		}
	}

	$sharelog_data = $db->get_all("SELECT * from end_vanet_user_sharelog where sender_carid = $car_id[car_id] and (type = 1 and type_content = 0)") ;
	if ($sharelog_data)
	{
		foreach ($sharelog_data as $key => $value) 
		{
			if (!model('vanet_user_sharelog')->update($value['sharelog_id'],array('type_content' =>$trip_id)) )
			{
				die_json_msg('database error: update sharelog fail', 10003) ;
			}
		}
	}

	$w_day=date("w");
	if($w_day=='1')
	{
		$cflag = '+0';
	}
	else
	{
		$cflag = '-1';
	}
	$time = time() ;
	$from_time = strtotime(date('Y-m-d',strtotime("$cflag week Monday", $time)));
	$end_time = time() ;

	$week_trip = $db->get_all("SELECT * FROM end_vanet_car_trip where (car_id = $car_id[car_id] and user_id = $usercar_data[user_id] ) and (e_time < $end_time and e_time > $from_time ) order by car_trip_id desc") ;
	if(!$week_trip)
	{
		die_json_msg('database error: get week trip fail',10003) ;
	}

	$miles = 0 ;
	$fuel = 0 ;
	$run_time = 0 ;
	$speed = 0 ;
	$grade = 0 ;
	$count = 0 ;

	foreach ($week_trip as $key => $value) 
	{
		$miles    += $value['miles'] ;
		$fuel     += $value['average_fuel'] ;
		$run_time += ($value['e_time'] - $value['f_time']) ;
		$speed    += $value['speed'] ;
		$grade    += $value['grade'] ;
		$count++ ;
	}
	if (!model('vanet_car_score')->set(array('average_fuel'=>$fuel/$count,'current_mile'=>$miles,'speed'=>$speed/$count,'grade'=>$grade/$count,'run_time'=>$run_time,'car_id'=>$car_id['car_id']),array('car_id'=>$car_id['car_id'])))
	{
		die_json_msg('database error: set car score fail',10003) ;
	}

	json_send();
}
else
{
	die_json_msg('trip_data invalid', 10003) ;
}
