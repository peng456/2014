<?php
/**
 * authenticate OBD, return access token to OBD
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['phone']) || !isset($data['password']))
{
	die_json_msg('parameter invalid', 10001);
}

$username = $data['phone'];
$password = $data['password'];
$item = model('mechanic_user')->get_one(array('username'=>$username, 'password'=>$password));
if (!$item)
{
	die_json_msg('parameter value error: username password miss match', 10002);
}

# generate pub_id for obd
$db->query("update end_mechanic_token set status='invalid' where token_type='user' and owner_id=$item[user_id] and status='valid'");
while (1)
{
	$new_token = hash_random($sn, 'sha256');
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
			die_json_msg('database error:add token error', 10003);
		}

		json_send(array('access_token'=>$new_token,
						'expires_in'=>0
						));		
	}
}