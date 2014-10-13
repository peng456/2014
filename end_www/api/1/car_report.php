<?php
/**
 * car report its status information
 *
 * @author liudanking
 */

$data = json_receive();

if (isset($data['mid']) && isset($data['sid']) && isset($data['access_token']))
{
	$mid = $data['mid'];
	$sid = $data['sid'];
	$access_token = $data['access_token'];

	$device = model('cardevice')->get_one(array('sid'=>$sid, 'access_token'=>$access_token)); // mid 暂时不强制要求
	if ($device)
	{
		unset($data['mid']);
		unset($data['sid']);
		unset($data['access_token']);
		$data['device_id'] = $device['device_id'];
		if (model('carstatus')->add($data))
		{
			json_send(array('data'=>'report successfully'));
		}
		else
		{
			die_json_msg('db process fail');
		}
	}
	else
	{
		die_json_msg('sid, access token invalid', 10103);
	}
}
else
{
	die_json_msg('parameter invalid', 10200);
}