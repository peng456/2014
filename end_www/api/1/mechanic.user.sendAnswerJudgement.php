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

if ($data_judge_insert['attitude'] + 
    $data_judge_insert['response_time'] +
    $data_judge_insert['resolution'] >= 12 )
{
    $res = model('mechanic_good')->add(array(
        'driver_user_id'=>$data_judge_insert['driver_user_id'] ,
        'mechanic_user_id'=>$user_id ,
        'is_push'=>0 ,
        'a_id'=>$data_judge_insert['a_id'] ,
        ) ) ;
    if(!$res)
    {
        die_json_msg('good插入失败', 10001);
    }
}

//因为需求改为只选一人，故赏金全给一人

$res1 = model('mechanic_question')->update($q_id,array('is_soluted'=>1)) ;
if(!$res)
{
    die_json_msg('question更新失败', 10001);
}
$q_data = model('mechanic_question')->get_one(array('q_id'=>$q_id)) ;
if(!$res)
{
    die_json_msg('获取question信息失败', 10001);
}
$res2 = model('mechanic_answer')->update($data['a_id'],array('pay_amount'=>$q_data['reward'])) ;
$res3 = model('mechanic_reward')->add(array(
        'driver_user_id'=>$data_judge_insert['driver_user_id'] ,
        'mechanic_user_id'=>$user_id ,
        'is_push'=>0 ,
        'reward'=>$q_data['reward'] ,
        )) ;
if(!$res2 || !$res3)
{
    die_json_msg('更新数据失败', 10001);
}

json_send();























