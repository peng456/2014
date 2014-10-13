<?php
/**
 * user get the latest car status
 *
 * @author liudanking
 */

$data = json_receive();

if (isset(isset($data['sid']) && isset($data['access_token']))
{
	$sid = $data['sid'];
	$access_token = $data['access_token'];

	$user = model('user')->get_one(array('sid'=>$sid, 'access_token'=>$access_token));
	if ($user)
	{
		$data['device_id'] = $device['device_id'];
		if (model('carstatus')->add($data))
		{
			json_send(array('data'=>'report successfully'));
		}
		else
		{
			die_json_msg('add report failed');
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