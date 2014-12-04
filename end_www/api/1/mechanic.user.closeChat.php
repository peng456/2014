<?php
/**
 *
 * api
 *
 * @author zhanglipeng 2014.11.14
 */
error_reporting(0);
$data = $_POST;

if (!isset($data['access_token'])||!isset($data['q_id'])||!isset($data['q_end_time']))
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
    $mechanic_item = model('mechanic_user')->get_one($token['owner_id']);
    if($mechanic_item['role'] != 'mechanic'){
        die_json_msg('你没有此权限', 31900);
    }

     $question_item  = model('mechanic_question')->get_one($data['q_id']);

    if(($question_item['q_status'] == 3) || ($question_item['q_status'] == 2)){
         json_send();
    }

   $update_chat_group_sql = "update end_mechanic_chat_group set q_end_time = {$data['q_end_time']} where q_id = {$data['q_id']}";
   $chat_group_update = $db->query($update_chat_group_sql);
    if(!$chat_group_update){
        die_json_msg('chat_group表更新失败', 10101);
    }
    $huanxin_ids = model('mechanic_user')->get_list(array('select'=>'huanxin_id','where'=>"user_id in ({$token['owner_id']},{$question_item['driver_user_id']})"));
    if(count($huanxin_ids)<2){
        die_json_msg('环信ID缺失', 10101);
    }

    $chat_group_item = model('mechanic_chat_group')->get_one(array('q_id'=>$data['q_id']));
    $array = array('client_id'=>END_HUANXIN_CLIENT_ID,'client_secret'=>END_HUANXIN_CLIENT_SECRET,'org_name'=>END_HUANXIN_ORG_NAME,'app_name'=>END_HUANXIN_APP_NAME);

    $ease = new Easemob($array);

    $ql1 = "select * where from= '{$huanxin_ids[0]['huanxin_id']}' and to='{$huanxin_ids[1]['huanxin_id']}' and timestamp < {$chat_group_item['q_end_time']} and timestamp >= {$chat_group_item['q_start_time']}  order by timestamp desc ";
    $ql2 = "select * where from= '{$huanxin_ids[1]['huanxin_id']}' and to='{$huanxin_ids[0]['huanxin_id']}' and timestamp < {$chat_group_item['q_end_time']} and timestamp >= {$chat_group_item['q_start_time']}  order by timestamp desc ";

$sleep_count = 0 ;
while(1){

    $result1 = $ease->chatRecord(urlencode($ql1));
    $result2 = $ease->chatRecord(urlencode($ql2));
    $result = array_merge($result1['entities'],$result2['entities']);
    $rows = ArrayHelper::sortByCol($result, 'timestamp',SORT_DESC);
    if($rows) {
    $messages = json_encode($rows);
    $chat_group_update = model('mechanic_chat_group')->set(array('huanxin_messages'=>$messages),array('q_id'=>$data['q_id']));
    if(!$chat_group_update){
        die_json_msg('chat_group表更新失败', 10101);
    }
    //更改question   的 q_status
    $update_sql = "update end_mechanic_question set q_status = 2 where q_id = {$data['q_id']}";
    $question_update = model('mechanic_question')->update($data['q_id'],array('q_status'=>2));
    if(!$question_update){
         die_json_msg('question表更新失败', 10101);
        }

    json_send();
    }
    elseif($sleep_count > 4){
        die_json_msg('网络环境不佳，稍后再试', 10101);
    }else{
        sleep(1);
        $sleep_count++;
    }
}