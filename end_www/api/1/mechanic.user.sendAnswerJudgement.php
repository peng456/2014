<?php
/**
 * 提交回答评价
 * API 2.8
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['a_id']) || !is_numeric($data['a_id']) || !is_numeric($data['reward']))
{
	die_json_msg('参数错误', 10100);
}

//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user',
    'status'=>'valid',
    'access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('access_token不可用', 10600);
}

$data_judge_insert = array();
$data_judge_insert['a_id'] = (int) $data['a_id'];
$data_judge_insert['driver_user_id'] = (int)$token['owner_id'];

if(isset($data['resolution']))
{
    if(!is_numeric($data['resolution'])){
        die_json_msg('参数错误', 10100);
    }
    $data_judge_insert['resolution'] = (int)$data['resolution'];
}

if(isset($data['response_time']))
{
      if(!is_numeric($data['response_time'])){
          die_json_msg('参数错误', 10100);
      }
          $data_judge_insert['response_time'] = (int)$data['response_time'];
}

if(isset($data['attitude']))
{
    if(!is_numeric($data['attitude'])){
        die_json_msg('参数错误', 10100);
    }
    $data_judge_insert['attitude'] = (int)$data['attitude'];
}

if(isset($data['comment']))
{
    $data_comment_insert['driver_comment'] = $data['comment'];
    if(!model('mechanic_answer')->update($data['a_id'],$data_comment_insert))
    {
        die_json_msg('answer表更新失败', 10101);
    }

}

if(!model('mechanic_judgescore')->add($data_judge_insert))
{
    die_json_msg('judgescore表增加失败', 10101);
}

$answer_item = model('mechanic_answer')->get_one($data['a_id']);
$q_id = $answer_item['q_id'];
$user_id = $answer_item['mechanic_user_id'];
$question_mechanic_sql =  "update end_mechanic_question_mechanic set  status =  2 where q_id = $q_id and  mechanic_user_id = $user_id";

$questin_mechanic_item = $db->query($question_mechanic_sql);

if(!$questin_mechanic_item)
{
    die_json_msg('question_mechanic表更新失败', 10101);
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
        die_json_msg('good表增加失败', 10101);
    }
}

//因为需求改为只选一人，故赏金全给一人

$res1 = model('mechanic_question')->update($q_id,array('is_soluted'=>1)) ;
if(!$res)
{
    die_json_msg('question表更新失败', 10101);
}
$q_data = model('mechanic_question')->get_one(array('q_id'=>$q_id)) ;
if(!$res)
{
    die_json_msg('获取question信息失败', 20800);
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
    die_json_msg('answer表或reward表更新失败', 20801);
}

json_send();























