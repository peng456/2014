<?php
/**
 * API 2.24
 * upload gps info of user
 *
 * @author deanmongel	2014.07.10
 */
 
$data = $_POST ;

if (!isset($data['access_token']) || !isset($data['longitude'])|| !isset($data['latitude']) )
{	
	#var_dump($data);
	die_json_msg('parameter invalid', 10001);
}

$item = model('vanet_token')->get_one(array('token_type'=>'user', 
										   'access_token'=>$data['access_token'],
										   'status'=>'valid'));
if (!$item)
{
	die_json_msg('parameter value error: access token invalid', 10000);
}

if(!model('vanet_user')->update($item['owner_id'],array('longitude'=>$data['longitude'],'latitude'=>$data['latitude'])))
{
	die_json_msg('database error: update user position fail', 10003);
}


json_send() ;