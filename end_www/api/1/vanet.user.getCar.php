<?php
/**
 * 获取用户的车辆信息（含OBD信息）
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_GET;

if (!isset($data['access_token']))
{
	die_json_msg('parameter invalid', 10100);
}

$item = model('vanet_token')->get_one(array('token_type'=>'user', 
										   'access_token'=>$data['access_token'],
										   'status'=>'valid'));
if (!$item)
{
	die_json_msg('parameter value error: access token invalid', 10101);
}

$ret_data = array();
if (isset($data['car_id']))
{
	$ids = explode(',',$data['car_id']);
	foreach ($ids as $id)
	{
		if (strlen($id) == 0) continue;
		$query = $db->query("select c.car_id, c.vin, c.license, c.init_mile, c.current_mile, c.engine_size, n.sn, n.pw, n.sim_no 
								from end_vanet_car c
								left join end_vanet_usercar uc on c.car_id=uc.car_id
								left join end_vanet_nobd n on c.car_id=n.car_id
								where c.car_id=$id and user_id=$item[owner_id]");
		$ret = $db->fetch_array($query);
		if ($ret)
			$ret_data[] = $ret;
	}
}
else
{
	$query = $db->query("select c.car_id, c.vin, c.license, c.init_mile, c.current_mile, c.engine_size, n.sn, n.pw, n.sim_no 
							from end_vanet_car c
							left join end_vanet_usercar uc on c.car_id=uc.car_id
							left join end_vanet_nobd n on c.car_id=n.car_id
							where user_id=$item[owner_id]");
	
	while($ret = $db->fetch_array($query))
	{
		$ret_data[] = $ret;
	}
}
json_send($ret_data);