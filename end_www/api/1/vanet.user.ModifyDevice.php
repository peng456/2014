<?php
/**
 * API 2.10
 * modify car info
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

unset($data['access_token']) ;
$car_id = $data['vehicle_id'] ;
$user_id = $item['owner_id'] ;
unset($data['vehicle_id']) ;

$car_data = model('vanet_usercar')->get_one(array('user_id' => $item['owner_id'],'car_id'=>$car_id) ) ;

if (!$car_data) {
	die_json_msg('you do not own this car', 21000);
}

foreach ($data as $key => $value) {
	if ($key == 'vehicle_name') 
	{
		if(!model('vanet_car')->update($car_id,array('vehicle_name'=>$value)))
		{
			die_json_msg('database error: update car name fail', 10003);
		}
	}
	if ($key == 'vehicle_brand') 
	{
		if(!model('vanet_car')->update($car_id,array('brand'=>$value)))
		{
			die_json_msg('database error: update car brand fail', 10003);
		}
	}
	if ($key == 'vehicle_type') 
	{
		if(!model('vanet_car')->update($car_id,array('model'=>$value)))
		{
			die_json_msg('database error: update car model fail', 10003);
		}
	}
	if ($key == 'init_mile') 
	{
		if(!model('vanet_car')->update($car_id,array('init_mile'=>$value)))
		{
			die_json_msg('database error: update car init_mile fail', 10003);
		}
	}
	if ($key == 'vin') 
	{
		if(!model('vanet_car')->update($car_id,array('vin'=>$value)))
		{
			die_json_msg('database error: update car vin fail', 10003);
		}
	}
}
json_send() ;