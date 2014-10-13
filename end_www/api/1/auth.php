<?php
/**
 * authenticate user, maker, device
 *
 * @author liudanking
 */
 
$data = json_receive();

if(!isset($data['type']))
{
	die_json_msg('authe type error', 10100);
}
else
{
	$auth_type = $data['type'];
}

if ($auth_type === 'user') // 一般用户认证
{
	$username = $data['username'];
	$password = end_encode($data['password']);
	$user = model('user')->get_one(array('username'=>$username,'password'=>$password));
	if ($user)
	{
		$sid = hash_normal($user['user_id'].$user['username']);
		$access_token = hash_random($user['username'].$user['password']);
		$data = array('sid'=>$sid,
					  'access_token'=>$access_token);
		if (model('user')->update($user['user_id'],$data))
		{
			$access_data = array('access_time'=>time(),
								 'user_type'=>'user',
								 'user_id'=>$user['user_id'],
								 'sid'=>$sid,
								 'access_token'=>$access_token,
								 'ip_address'=>ip());
			model('accesslog')->add($access_data);
			json_send($data);
		}
		else
		{
			die_json_msg("sid, access_token update error", 10102);
		}
	}
	else
	{
		die_json_msg('username or password error', 10101);
	}
}
elseif($auth_type === 'maker') // 车载设备认证
{
	$username = $data['username'];
	$password = end_encode($data['password']);
	$maker = model('maker')->get_one(array('username'=>$username,'password'=>$password));
	if ($maker)
	{
		$sid = hash_normal($maker['maker_id'].$maker['username']);
		$access_token = hash_random($maker['username'].$maker['password']);
		$data = array('sid'=>$sid,
					  'access_token'=>$access_token);
		if (model('maker')->update($maker['maker_id'],$data))
		{
			$access_data = array('access_time'=>time(),
								 'user_type'=>'maker',
								 'user_id'=>$maker['maker_id'],
								 'sid'=>$sid,
								 'access_token'=>$access_token,
								 'ip_address'=>ip());
			model('accesslog')->add($access_data);
			json_send($data);
		}
		else
		{
			die_json_msg("sid, access_token update error", 10102);
		}
	}
	else
	{
		die_json_msg('username or password error', 10101);
	}
}
elseif($auth_type === 'device') // 制造商认证
{
	if (!(isset($data['mid']) && isset($data['did']) && isset($data['token'])))
	{
		die_json_msg('parameters invalid');
	}

	$mid = addslashes($data['mid']);
	$did = addslashes($data['did']);
	$token = addslashes($data['token']);
	$device = $db->get_one("select d.* from end_cardevice d inner join end_maker m on d.maker_id=m.maker_id 
							where d.did='$did' and d.token='$token' and m.mid='$mid' 
							limit 1");
	if ($device)
	{
		$sid = hash_normal($mid.$did.$token);
		$access_token = hash_random($device['username'].$device['password']);
		$data = array('sid'=>$sid,
					  'access_token'=>$access_token);
		if (model('cardevice')->update($device['device_id'],$data))
		{
			$access_data = array('access_time'=>time(),
								 'user_type'=>'device',
								 'user_id'=>$device['maker_id'],
								 'sid'=>$sid,
								 'access_token'=>$access_token,
								 'ip_address'=>ip());
			model('accesslog')->add($access_data);
			json_send($data);
		}
		else
		{
			die_json_msg("sid, access_token update error", 10102);
		}
	}
	else
	{
		die_json_msg('did or token error', 10101);
	}
}	
else
{
	die_json_msg('authe type error', 10100);
}