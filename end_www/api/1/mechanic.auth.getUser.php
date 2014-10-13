<?php
/**
 * 用户注册，返回token
 * API 2.2
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['phone']) || !isset($data['password']) || !isset($data['check_code']))
{
	die_json_msg('parameter invalid', 10001);
}

$username = $data['phone'] ;
$password = $data['password'] ;
$check_code = $data['check_code'] ;

$user_data = model('mechanic_user')->get_one(array('username'=>$username)) ;
if ($user_data)
{
	die_json_msg('phone is used',20200) ;
}

//此处添加验证码验证

$time = time() ;
$checkcode_data = $db->get_all("SELECT * FROM end_mechanic_user_checkcode WHERE phone = $data[phone] and ( status = 'valid' and expires_in > $time ) " ) ;
if (!$checkcode_data)
{
	die_json_msg('checkcode time out', 20202) ;
}
else if (!($checkcode_data[0]['checkcode'] === $data['check_code']))
{
	die_json_msg('checkcode error', 20203) ;
}

if (!model('mechanic_user_checkcode')->update($checkcode_data[0]['checkcode_id'],array('status'=>'invalid')) )
{
	die_json_msg('database error: update checkcode log error',10003) ;
}


$item = model('mechanic_user')->add(array('username'=>$username, 'password'=>$password , 'phone'=>$username,'name'=>$data['name'],'sex'=>$data['sex'],'years'=>$data['years'],'car'=>$data['car'],'role'=>$data['role']));
if (!$item)
{
	die_json_msg('database error: add user error', 10003);
}

# generate pub_id for obd
$db->query("update end_mechanic_token set status='invalid' where token_type='user' and owner_id=$item and status='valid'");
while (1)
{
	$new_token = hash_random($sn, 'sha256');
	$token = model('mechanic_token')->get_one(array('token_type'=>'user', 
												 'owner_id'=>$item, 
												 'status'=>'valid',
												 'access_token'=>$new_token));
	if (!$token)
	{
		if (!model('mechanic_token')->add(array('access_token'=>$new_token,
											 'token_type'=>'user',
											 'owner_id'=>$item,
											 'status'=>'valid')))
		{
			die_json_msg('database error: add token error', 10003);
		}
		json_send(array('access_token'=>$new_token,
						'expires_in'=>0));		
	}
}