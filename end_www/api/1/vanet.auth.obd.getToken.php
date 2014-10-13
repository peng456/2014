<?php
/**
 * authenticate OBD, return access token to OBD
 *
 * @author liudanking	2013.08.09
 */
 
$data = json_receive();

if (!isset($data['sn']) || !isset($data['pw']))
{
	die_json_msg('parameter invalid', 11);
}

$sn = $data['sn'];
$pw = $data['pw'];
$item = model('vanet_nobd')->get_one(array('sn'=>$sn, 'pw'=>$pw));
if (!$item)
{
	// if (!model('vanet_nobd')->add(array('sn'=>$username, 'pw'=>$password)))
		// die_json_msg('db fail');
	// $item = model('vanet_nobd')->get_one(array('sn'=>$username, 'pw'=>$password));
	die_json_msg('parameter value error: sn pw miss match', 12);
}

# generate pub_id for obd
$db->query("update end_vanet_token set status='invalid' where token_type='obd' and owner_id=$item[nobd_id] and status='valid'");
while (1)
{
	$new_token = hash_random($sn, 'sha1');
	$new_token = substr($new_token, 0, 16);
	$token = model('vanet_token')->get_one(array('token_type'=>'obd', 
												 'owner_id'=>$item['nobd_id'], 
												 'status'=>'valid',
												 'access_token'=>$new_token));
	if (!$token)
	{
		if (!model('vanet_token')->add(array('access_token'=>$new_token,
											 'token_type'=>'obd',
											 'owner_id'=>$item['nobd_id'],
											 'status'=>'valid')))
		{
			die_json_msg('database error: add token fail', 13);
		}
		json_send(array('access_token'=>$new_token,
						'expires_in'=>0));		
	}
}