<?php
/**
 * 提交回答评价
 * API 2.8
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['a_id']) || !is_numeric($data['a_id']) || !is_numeric($data['satisfied'] || !isset($data['flag'] )))
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
    $res = model('mechanic_good')->set(array(
        'driver_user_id'=>$data_judge_insert['driver_user_id'] ,
        'mechanic_user_id'=>$user_id ,
        'is_push'=>0 ,
        'a_id'=>$data_judge_insert['a_id']),
        array( 'driver_user_id'=>$data_judge_insert['driver_user_id'] ,
        'mechanic_user_id'=>$user_id,'a_id'=>$data_judge_insert['a_id'])
    ) ;
    if(!$res)
    {
        die_json_msg('good表增加失败', 10101);
    }

   $good_count   = model('mechanic_good')->get_list("select count(*) as good_count from end_mechanic_good where mechanic_user_id =  $user_id");
   $answer_count = model('mechanic_answer')->get_list("select count(*) as answer_count from end_mechanic_answer where mechanic_user_id =  $user_id");

    $repution = (round(($good_count['good_count']/$answer_count['answer_count']),2))*100;

    $joininfo_sql =  "update end_mechanic_joininfo set  repution =  $repution where joininfo_id = (select joininfo_id from end_mechanic_user when user_id = $user_id) ";

    $repution_set = model('mechanic_joininfo')->get_one(array('_custom_sql'=>$joininfo_sql));

    if(!$repution_set)
    {
        die_json_msg('joininfo表更新失败', 10101);
    }
}

//record without money ,satifatify

$res_question = model('mechanic_question')->update($q_id,array('is_soluted'=>1)) ;
if(!$res_question)
{
    die_json_msg('question表更新失败', 10101);
}
$q_data = model('mechanic_question')->get_one(array('q_id'=>$q_id)) ;
if(!$q_data)
{
    die_json_msg('获取question信息失败', 20800);
}


if($data['flag'] == 0)  //无悬赏
{
    $good_item = model('good_without_money')->add(array(  'driver_user_id'=>$data_judge_insert['driver_user_id'] ,'a_id'=>$data['a_id'],'q_id'=>$q_id,'satisfaction'=>(int)$data['satisfied'],'create_time'=>time()));

    $answer_update_item = model('mechanic_answer')->update($data['a_id'],array('pay_amount'=>0)) ;

    if(!$answer_update_item || !$good_item)
    {
        die_json_msg('answer表或good_without_money表更新失败', 10101);
    }
}elseif($data['flag'] == 1){   //有悬赏


    $res2 = model('mechanic_answer')->update($data['a_id'],array('pay_amount'=>(int)$data['reward'])) ;
    $res3 = model('mechanic_reward')->set(array(
            'driver_user_id'=>$data_judge_insert['driver_user_id'] ,
            'mechanic_user_id'=>$user_id ,
            'a_id'=>$data['a_id'],
            'is_push'=>0 ,
            'reward'=>(int)$data['reward']),
        array( 'driver_user_id'=>$data_judge_insert['driver_user_id'] ,
            'mechanic_user_id'=>$user_id ,
            'a_id'=>$data['a_id'])
    );
    if(!$res2 || !$res3)
    {
        die_json_msg('answer表或reward表更新失败', 20801);
    }

}

//question的q_status 更改
$qq_data = model('mechanic_question')->get_one(array('q_id'=>$answer_item['q_id'])) ;
if (!$qq_data)
        die_json_msg('question表获取信息失败',10101);
if ($qq_data['q_status'] == 5)
{
    $res = model('mechanic_question')->update($answer_item['q_id'],array('q_status'=>6 )) ;
    if (!$res)
        die_json_msg('question表更新q_status失败',10101);
}


json_send();























