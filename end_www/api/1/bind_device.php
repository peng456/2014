<?php
/**
 * user bind device
 *
 * @author liudanking
 */

$data = json_receive();

if (isset($data['sid']) && isset($data['access_token']) && isset($data['mid']) && isset($data['did']) && isset($data['token']))
{
	$sid = $data['sid'];
	$access_token = $data['access_token'];
	$mid = $data['mid'];
	$did = $data['did'];
	$token = $data['token'];
	$user = model('user')->get_one(array('sid'=>$sid, 'access_token'=>$access_token));
	if ($user)
	{
		$_data = array('mid'=>$mid);
		$maker = model('maker')->get_one($_data);
		if (!$maker)	die_json_msg('invalid maker', 10204); ## 查看是否是有效的maker

		$_data = array('did'=>$did, 'token'=>$token);
		$device = model('cardevice')->get_one($_data);
		if ($device && $device['user_id'] != NULL)
		{
			if ($device['user_id'] != $user['user_id']) ## 如果设备被其他账号绑定过，则必须解除绑定才可以，一个设备只能绑定到一个user上
			{
				die_json_msg('the device is binded to another user, please unbind the device', 10201);
			}
			else
			{
				die_json_msg('already binded, do not need multi time binding', 10202);
			}
		}
		else ## 可以成功绑定
		{
			$_data = array('did'=>$did,
						   'token'=>$token,
						   'user_id'=>$user['user_id'],
						   'maker_id'=>$maker['maker_id']);
			if (!$device && model('cardevice')->add($_data) || $device && model('cardevice')->update($device['device_id'], $_data))
			{
				json_send(array('data'=>'bind device successfully'));
			}
			else
			{
				die_json_msg('bind car device failed', 10203);
			}
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