<?php

/**
 * API 2.22
 * agree friend apply
 * @author deanmongel 2014.07.09
 */

 $data = $_POST ;

if (!isset($data['access_token']) || !isset($data['friendid']) )
{
	die_json_msg('parameter invalid', 10001);
} 
	
$item = model('vanet_token')->get_one(array('token_type'=>'user',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid',10000);

$friend_id = $data['friendid'] ;
$user_id = $item['owner_id'] ;

if ($user_id > $friend_id) 
{
	$user_id_a = $friend_id ;
	$user_id_b = $user_id ;
}
else
{
	$user_id_a = $user_id ;
	$user_id_b = $friend_id ;
}

$relation_data = model('vanet_user_friends')->get_one(array('user_id_a' => $user_id_a, 'user_id_b'=>$user_id_b) );

if (!$relation_data)
{
	die_json_msg('friend who you agree does not invite you',22200) ;
}

if (!($result = model('vanet_user_friends')->update($relation_data['id'],array('friend_state'=>0))))
{
	die_json_msg('database error: update friends info fail', 10003) ;
}

json_send($result);