<?php
/**
 * 用户注册
 * api 1.4
 *
 * @author zhanglipeng 2014.10.17
 */
 
$data = $_POST;

if (!isset($data['phone']) || !isset($data['password']))
{
	die_json_msg('参数错误', 10100);
}

if(!preg_match("/1[34578]{1}\d{9}$/",$data['phone']))
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

		json_send(array('access_token'=>$new_token,
                        'app_key'=>END_HUANXIN_APPKEY,
                        'huanxin_id'=>$item['huanxin_id'],
                        'huanxin_password'=>$item['huanxin_password'],
						'expires_in'=>0
						));		
	}
}