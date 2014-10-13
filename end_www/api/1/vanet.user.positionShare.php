<?php
/**
 * API 2.23
 * share position info
 * 
 * @author liudanking	2013.08.09
 *			deanmongel	2014.07.10
 */
 
$data = $_POST ;

if (!isset($data['access_token'])  || !isset($data['receiver_id']) || !isset($data['duration']) )
{	
	#var_dump($data);
	die_json_msg('parameter invalid', 10001);
}

if (!isset($data['message'])) {
	$message = "" ;
}

$item = model('vanet_token')->get_one(array('token_type'=>'user', 
										   'access_token'=>$data['access_token'],
										   'status'=>'valid'));
if (!$item)
{
	die_json_msg('parameter value error: access token invalid', 10000);
}
$user_id = (int)$item['owner_id'] ;

$data_user = $db->get_all("SELECT * from end_vanet_user where user_id = $user_id") ;

if($data['duration'] == 0)
{
	$duration = 1 ;
	$share_type = 1 ;
	$share_option = 0 ;
}
else
{
	$duration = time() + $data['duration']*60 ;
	$share_type = 2 ;
	$share_option = $duration ;
}

$share_data = model('vanet_user_share')->get_one(array('shareuser_id'=>$user_id , 'sharecar_id'=>$data_user[0]['default_carid'] , 'touser_id'=>$data['receiver_id'] ) ) ;

$message_id = model('vanet_user_sharemessage')->add(array('sender_userid'=>$user_id , 'receiver_userid'=>$data['receiver_id'] ,'is_read'=>0 , 'content'=>$data['message'] ) ) ;

if (!$message_id)
{
	die_json_msg('database error: add  message fail', 10003) ;
}

if ($share_data)
{
	if($share_data['share_state'] != 0)
	{
		die_json_msg('have already share to this user',22300) ;
	}

	if (model('vanet_user_share')->exists(array('shareuser_id'=>$user_id , 'sharecar_id'=>$data_user[0]['default_carid'] , 'touser_id'=>$data['receiver_id'] ) ) )
	{
		if (!model('vanet_user_share')->set(array('share_state' =>$duration),array('shareuser_id'=>$user_id , 'sharecar_id'=>$data_user[0]['default_carid'] , 'touser_id'=>$data['receiver_id'] )) )
		{
			die_json_msg('database error: set share message fail', 10003) ;
		}
	}
}
else
{
	if (!model('vanet_user_share')->add(array('shareuser_id'=>$user_id , 'sharecar_id'=>$data_user[0]['default_carid'] , 'touser_id'=>$data['receiver_id'] , 'share_state' =>$duration)))
	{
		die_json_msg('database error: add share message fail', 10003) ;
	}
}

if (!model('vanet_user_sharelog')->add(array('sender_userid'=>$user_id , 'sender_carid'=>$data_user[0]['default_carid'] , 'receiver_userid'=>$data['receiver_id'] , 'type' =>$share_type,'type_content'=>$share_option,'message_id'=>$message_id)))
{
	die_json_msg('database error: add sharelog message fail', 10003) ;
}

json_send();
