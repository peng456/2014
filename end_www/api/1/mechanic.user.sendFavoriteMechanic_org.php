<?php
/**
 * 提交车友收藏技师
 * API 2.5
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['mechanic_id'])|| !preg_match('/^\d+$/i', $data['mechanic_id']) || !isset($data['type']))
{
	die_json_msg('parameter invalid', 10001);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
$driver_user_id = $item['owner_id'] ;

$res = model('mechanic_favorite')->add(array('driver_user_id'=>$driver_user_id,'mechanic_user_id'=>$data['mechanic_id'],'is_push'=>0,'create_time'=>time())) ;
if(!$res)
	die_json_msg('database error',10003) ;

json_send() ;

