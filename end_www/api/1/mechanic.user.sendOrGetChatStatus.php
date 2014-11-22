<?php
/**
 *
 * api
 *
 * @author zhanglipeng 2014.11.14
 */
 
$data = $_POST;

if (!isset($data['access_token'])||!isset($data['q_id']) ||!isset($data['type']))
{
	die_json_msg('参数错误', 10100);
}

if(!in_array($data['type'],array(0,1))){
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

if($data['type'] == 0){
    $question_status = model('mechanic_question')->get_one(array('select'=>'q_status','q_id'=>$data['q_id']));
    json_send(array('question_status'=>(int)$question_status['q_status']));
}else{

//    switch($data['q_type']){
//        case 0:            //免费图文咨询
//
//            break;
//        case 1:            //付费图文咨询
//
//            break;
//        case 2:            //付费预约电话咨询
//
//            break;
//        case 3:            //快捷电话咨询
//
//            break;
//    }


    if(!isset($data['q_end_time'])){
        die_json_msg('参数错误', 10100);
    }
    $mechanic_item = model('mechanic_user')->get_one($token['owner_id']);
    if($mechanic_item['role'] != 'mechanic'){
        die_json_msg('你没有此权限', 31900);
    }
    $find_question_id = "select q_id from end_mechanic_question where status = 0 and q_id in (select q_id from end_mechanic_driver_mechanic_question where q_type = 0 and mechanic_id = {$$token['owner_id']})";

    $question_id  = model('mechanic_question')->get_one(array('_custom_sql'=>$find_question_id));

    $question_update = model('mechanic_question')->set(array('q_status'=>2),$question_id['q_id']);
    if(!$question_update){
        die_json_msg('question表更新失败', 10101);
    }

    $chat_group_update = model('mechanic_chat_group')->set(array('q_end_time'=>$data['q_end_time']),$question_id['q_id']);
    if(!$chat_group_update){
        die_json_msg('chat_group表更新失败', 10101);
    }

    $question_item = model('mechanic_question')->get_one($question_id['q_id']);
    $huanxin_ids = model('mechanic_user')->get_list(array('select'=>'huanxin_id','where'=>"user_id in ({$token['owner_id']},{$question_item['driver_user_id']})"));
    if(count($huanxin_ids)<2){
        die_json_msg('环信ID缺失', 10101);
    }

    $chat_group_item = model('mechanic_chat_group')->get_one($data['q_id']);
    $array = array('client_id'=>END_HUANXIN_CLIENT_ID,'client_secret'=>END_HUANXIN_CLIENT_SECRET,'org_name'=>END_HUANXIN_ORG_NAME,'app_name'=>END_HUANXIN_APP_NAME);

    $ease = new Easemob($array);

    $ql = "select msg_id where (from= '{$huanxin_ids[0]['huanxin_id']}' and to='{$huanxin_ids[1]['huanxin_id']}') or (from= '{$huanxin_ids[1]['huanxin_id']}' and to='{$huanxin_ids[0]['huanxin_id']}') and timestamp > {$chat_group_item['q_start_time']} and timestamp < {$chat_group_item['q_end_time']} order by timestamp desc ";

    $result = $ease->chatRecord(urlencode($ql));
    $msr_ids =array();
    foreach($result['list'] as $key=>$value){
        array_push($msr_ids,$value[0]);
    }
    $huanxin_ids = implode(",",$msr_ids);
    $chat_group_update = model('mechanic_chat_group')->set(array('huanxin_ids'=>$huanxin_ids),$data['q_id']);
    if(!$chat_group_update){
        die_json_msg('chat_group表更新失败', 10101);
    }
    json_send() ;
}