<?php

/**
 * set gps, obd base data
 *
 * @author liudanking
 */

 $data = $_GET;
 
if (!isset($data['from']) && !isset($data['count']))
 	die_json_msg('parameter invalid', 10200);
	
$item = model('vanet_token')->get_one(array('token_type'=>'user',
										    'access_token'=>$data['access_token'],
										    'status'=>'valid'));
if (!$item)
	die_json_msg('token invalid');

$nobd_id = (int)$item['owner_id'];
$from = (int)$_GET['from'];
$count = (int)$_GET['count'];

$total_count = get_query_item_count("SELECT count(*) from end_vanet_gpsdata");

$data = $db->get_all("SELECT * from end_vanet_gpsdata order by create_time desc limit $from, $count");

$current_cursor = $from+count($data);

json_send(array('total_count'=>$total_count,
				'current_cursor'=>$current_cursor,
				'data'=>$data));