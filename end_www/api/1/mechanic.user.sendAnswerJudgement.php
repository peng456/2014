<?php
/**
 * 提交回答评价
 * API 2.8
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['a_id']) || !is_numeric($data['a_id']))
{
	die_json_msg('parameter invalid', 10001);
}

//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user',
    'status'=>'valid',
    'access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('accesstoken  不可用', 10001);
}

$data_judge_insert = array();
$data_judge_insert['a_id'] = (int) $data['a_id'];
$data_judge_insert['driver_user_id'] = (int)$token['owner_id'];

if(isset($data['resolution']))
{
    $data_judge_insert['resolution'] = (int)$data['resolution'];

}

if(isset($data['response_time']))
{
    $data_judge_insert['response_time'] = (int)$data['response_time'];
}

if(isset($data['attitude']))
{
    $data_judge_insert['attitude'] = (int)$data['attitude'];
}

if(isset($data['comment']))
{
    $data_comment_insert['driver_comment'] = $data['comment'];
    if(!model('mechanic_answer')->update($data['a_id'],$data_comment_insert))
    {
        die_json_msg('数据更新失败', 10001);
    }

}

if(!model('mechanic_judgescore')->add($data_judge_insert))
{
    die_json_msg('数据更新失败', 10001);
}



$answer_item = model('mechanic_answer')->get_one($data['a_id']);
$q_id = $answer_item['q_id'];
$user_id = $answer_item['mechanic_user_id'];
$question_mechanic_sql =  "update end_mechanic_question_mechanic set  status =  2 where q_id = $q_id and  mechanic_user_id = $user_id";

$questin_mechanic_item = $db->query($question_mechanic_sql);

if(!$questin_mechanic_item)
{
    die_json_msg('状态更新失败', 10001);
}

json_send();























