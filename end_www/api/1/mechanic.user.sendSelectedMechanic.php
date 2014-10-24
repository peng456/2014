<?php
/**
 * 提交车友选择回答问题的技师
 * API 2.11
 *
 * @author duyifan 2014.10.18
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['count']) || !is_numeric($data['count'])||!isset($data['q_id']) || !is_numeric($data['q_id'])|| !isset($data['selected_mechanic']))
{
	die_json_msg('parameter invalid', 10001);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
$driver_user_id = $item['owner_id'] ;
$selected_mechanic = json_decode($data['selected_mechanic'],true) ;
if(!$selected_mechanic)
	die_json_msg('selected_mechanic format error',100000) ;

foreach ($selected_mechanic['selected_mechanic'] as $key => $value) 
{
	$res = model('mechanic_question_mechanic')->add(array('q_id'=>$data['q_id'],'mechanic_user_id'=>$value,'status'=>0,'create_time'=>time())) ;
	if(!$res)
		die_json_msg('database error',10003) ;
}

$res = model('mechanic_question')->update($data['q_id'],array('is_accept'=>1)) ;
if(!$res)
		die_json_msg('database error',10003) ;

json_send() ;

