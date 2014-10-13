<?php
/**
 * user unbind device
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
		if ($device && $device['maker_id'] == $maker['maker_id'] && $device['user_id'] == $user['user_id'])
		{
			if ($db->query("update end_cardevice set user_id=NULL where device_id=$device[device_id]")) ## 解除绑定
			{
				json_send(array('data'=>'unbind device successfully'));
			}
			else
			{
				die_json_msg('unbind car device failed', 10300);
			}
		}
		else ## 就不存在这个设备，取消绑定失败
		{
			die_json_msg('unbind car device failed', 10301);
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