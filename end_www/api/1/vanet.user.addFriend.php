<?php

/**
 * API 2.21
 * add friend
 *
 * @author deanmongel 2014.07.09
 */

 $data = $_POST ;

if (!isset($data['access_token']) || !isset($data['phone'] ))
{
	die_json_msg('parameter invalid', 10001);
} 
	
$item = model('vanet_token')->get_one(array('token_type'=>'user',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid',10000);

$user_id = (int)$item['owner_id'];


$friend_data = model('vanet_user')->get_one(array('phone'=>$data['phone'])) ;
if (!$friend_data) 
{
	die_json_msg('not find user to add', 22100) ;
}

if ($user_id > $friend_data['user_id']) 
{
	$friend_state = 1 ;
	$user_id_a = $friend_data['user_id'] ;
	$user_id_b = $user_id ;
}
else
{
	$friend_state = -1 ;
	$user_id_a = $user_id ;
	$user_id_b = $friend_data['user_id'] ;
}

if (model('vanet_user_friends')->exists(array('user_id_a' => $user_id_a, 'user_id_b'=> $user_id_b)))
{
	die_json_msg('you have already add this friend',22101) ;
}

$relation_data = array('user_id_a' => $user_id_a, 
					   'user_id_b'=> $user_id_b,
					   'friend_state'=>$friend_state);

if (!($id = model('vanet_user_friends')->add($relation_data)))	
{
	die_json_msg('database error: add friends fail', 10003);
}

json_send();