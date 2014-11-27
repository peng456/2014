<?php
/**
 * 通话中心 登陆
 * 
 *
 * @author 杜一凡 2014.11.25
 */
 
$data = $_POST;

if (!isset($data['phone']) || !isset($data['password']))
{
	die_json_msg('参数错误', 10100);
}


$username = $data['phone'];
$password = $data['password'];
$item = model('mechanic_user')->get_one(array('username'=>$username, 'password'=>$password));
if (!$item)
{
	die_json_msg('用户名或密码错误', 10400);
}

# generate pub_id for obd
$db->query("update end_mechanic_token set status='invalid' where token_type='user' and owner_id=$item[user_id] and status='valid'");
while (1)
{
	$new_token = hash_random($username, 'sha256');
	$token = model('mechanic_token')->get_one(array('token_type'=>'user', 
												 'owner_id'=>$item['user_id'], 
												 'status'=>'valid',
												 'access_token'=>$new_token));
	if (!$token)
	{
		if (!model('mechanic_token')->add(array('access_token'=>$new_token,
											 'token_type'=>'user',
											 'owner_id'=>$item['user_id'],
											 'status'=>'valid')))
		{
			die_json_msg('token表更新失败', 10101);
		}

		$res_data = array('ret'=>0,'access_token'=>$new_token) ;
		$json_data = json_encode($res_data, JSON_PRETTY_PRINT);
		echo $json_data ;
		die() ;
	}
}