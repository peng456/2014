<?php
/**
 * 提交回答评价
 * API 2.8
 *
 * @author zhanglipeng 	2014.11.27  change
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['total_score']) ||!isset($data['resolution']) ||!isset($data['response_time'])||!isset($data['attitude']) || !isset($data['q_id']) || !is_numeric($data['q_id']) )
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

$question_item = model('mechanic_question')->get_one($data['q_id']);
if($question_item['q_status'] == 3){
    die_json_msg('问题已经评价', 20800);
}

$data_judge_insert = array();
$data_judge_insert['q_id'] = (int) $data['q_id'];
$data_judge_insert['driver_user_id'] = (int)$token['owner_id'];
$data_judge_insert['mechanic_id'] = (int)$data['mechanic_id'];
$data_judge_insert['total_score'] = (int) $data['total_score'];

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
    $data_judge_insert['comment'] = $data['comment'];
}

if($question_item['q_status'] < 2){
    $chat_group_update = model('mechanic_chat_group')->set(array('q_end_time'=>$data['q_end_time']),array('q_id'=>$data['q_id']));
    if(!$chat_group_update){
        die_json_msg('chat_group表更新失败', 10101);
    }

    $huanxin_ids = model('mechanic_user')->get_list(array('select'=>'huanxin_id','where'=>"user_id in ({$token['owner_id']},{$data['mechanic_id']})"));
    if(count($huanxin_ids)<2){
        die_json_msg('环信ID缺失', 10101);
    }

    $chat_group_item = model('mechanic_chat_group')->get_one(array('q_id'=>$data['q_id']));
    $array = array('client_id'=>END_HUANXIN_CLIENT_ID,'client_secret'=>END_HUANXIN_CLIENT_SECRET,'org_name'=>END_HUANXIN_ORG_NAME,'app_name'=>END_HUANXIN_APP_NAME);

    $ease = new Easemob($array);

    $ql1 = "select * where from= '{$huanxin_ids[0]['huanxin_id']}' and to='{$huanxin_ids[1]['huanxin_id']}' and timestamp < {$chat_group_item['q_end_time']} and timestamp >= {$chat_group_item['q_start_time']}  order by timestamp desc ";
    $ql2 = "select * where from= '{$huanxin_ids[1]['huanxin_id']}' and to='{$huanxin_ids[0]['huanxin_id']}' and timestamp < {$chat_group_item['q_end_time']} and timestamp >= {$chat_group_item['q_start_time']}  order by timestamp desc ";

    $sleep_count = 0 ;
    $flag = true;
    while($flag){
    $result1 = $ease->chatRecord(urlencode($ql1));
    $result2 = $ease->chatRecord(urlencode($ql2));
    $result = array_merge($result1['entities'],$result2['entities']);
    $rows = ArrayHelper::sortByCol($result, 'timestamp', SORT_DESC);
    if($rows) {
            $messages = json_encode($rows);
            $chat_group_update = model('mechanic_chat_group')->set(array('huanxin_messages'=>$messages),array('q_id'=>$data['q_id']));
            if(!$chat_group_update){
                die_json_msg('chat_group表更新失败', 10101);
            }
        $flag = false;
        }
    elseif($sleep_count > 4){
            die_json_msg('网络环境不佳，稍后再试', 10101);
        }
    else{
            sleep(1);
            $sleep_count++;
        }

    }
}

if(!model('mechanic_judgescore')->add($data_judge_insert))
{
    die_json_msg('judgescore表增加失败', 10101);
}
if ($data_judge_insert['total_score'] >= 4)
{
    $res = model('mechanic_good')->set(array(
            'driver_user_id'=>$data_judge_insert['driver_user_id'] ,
            'mechanic_user_id'=>$data_judge_insert['mechanic_id'] ,
            'is_push'=>0 ,
            'q_id'=>$data_judge_insert['q_id']),
        array( 'driver_user_id'=>$data_judge_insert['driver_user_id'],
            'mechanic_user_id'=>$data_judge_insert['mechanic_id'],'q_id'=>$data_judge_insert['q_id'])
    ) ;
    if(!$res)
    {
        die_json_msg('good表增加失败', 10101);
    }

    $good_count   =  model('mechanic_good')->get_one(array('_custom_sql'=>"select count(*) as good_count from end_mechanic_good where mechanic_user_id =  {$data_judge_insert['mechanic_id']}"));
    $answer_count =  model('mechanic_answer')->get_one(array('_custom_sql'=>"select count(*) as answer_count from end_mechanic_judgescore where mechanic_id = {$data_judge_insert['mechanic_id']}"));
    $a = (float)$good_count['good_count'];
    $b = (float)$answer_count['answer_count'];
    $repution = (round(($a/$b),2))*100;
    $joininfo_sql =  "update end_mechanic_joininfo set  reputation =  {$repution} where joininfo_id = (select joininfo_id from end_mechanic_user where user_id = {$data_judge_insert['mechanic_id']}) ";
    $repution_set = $db->query($joininfo_sql);
    if(!$repution_set)
    {
        die_json_msg('joininfo表更新失败', 10101);
    }
}

$question_update = model('mechanic_question')->set(array('q_status'=>3),$data['q_id']);
if(!$question_update){
        die_json_msg('question表更新失败', 10101);
    }

  json_send();
