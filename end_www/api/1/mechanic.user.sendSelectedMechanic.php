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
	die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
if (!$item)
    die_json_msg('access_token不可用',10600);

$driver_user_id = $item['owner_id'] ;
$selected_mechanic = json_decode($data['selected_mechanic'],true) ;
if(!$selected_mechanic)
	die_json_msg('json 格式错误',21100) ;

foreach ($selected_mechanic['selected_mechanic'] as $key => $value) 
{
	$res = model('mechanic_question_mechanic')->add(array('q_id'=>$data['q_id'],'mechanic_user_id'=>$value,'status'=>0,'create_time'=>time())) ;
	if(!$res)
		die_json_msg('question_mechanic表更新失败',10101) ;
}

$res = model('mechanic_question')->update($data['q_id'],array('is_accept'=>1)) ;
if(!$res)
		die_json_msg('question表更新失败',10101) ;

json_send() ;

