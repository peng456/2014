<?php
/**
 * API 2.3
 * 设置修改用户资料
 *
 * @author deanmongel	2014.07.10
 */
 
$data = $_POST ;

if (!isset($data['access_token']) )
{	
	die_json_msg('parameter invalid', 10001);
}

$item = model('vanet_token')->get_one(array('token_type'=>'user', 
										   'access_token'=>$data['access_token'],
										   'status'=>'valid'));
if (!$item)
{
	die_json_msg('parameter value error: access token invalid', 10000);
}

unset($data['access_token']) ;

$user_id = $item['owner_id'] ;

if(!model('vanet_user')->update($user_id,$data))
{
	die_json_msg('database error: update user info error', 10003);
}

json_send() ;