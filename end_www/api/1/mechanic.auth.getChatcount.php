<?php
/**
 * 返回数据库中的车型信息
 * api 1.7
 *
 * @author duyifan	2014.10.20
 */
 
$data = $_POST;

if (!isset($data['type'])||!isset($data['access_token'])||!isset($data['q_id']))
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


switch ($data['type']) {
	case  0:
        $question_item = model('mechanic_question')->get_one($data['q_id']);
        if(!$question_item){
            die_json_msg('问题不存在', 10900);
        }
        json_send(array('chat_count'=>(int)$question_item['chat_count'])) ;
        break;

	
	case  1:

        $mechanic_item = model('mechanic_user')->get_one($token['owern_id']);
        if($mechanic_item['role'] != 'mechanic'){
            die_json_msg('你没有此权限', 10901);
        }
        $chat_count_update_sql = "update end_mechanic_question set chat_count = chat_count + 1 where q_id = {$data['q_id']}";
        $chat_count_update_item = model('mechanic_question')->get_one(array('_custom_sql'=>$chat_count_update_sql));
        if(!$chat_count_update_item){
            die_json_msg('question表更新失败', 10101);
        }
        $question_item = model('mechanic_question')->get_one($data['q_id']);
        if(!$question_item){
            die_json_msg('问题不存在', 10600);
        }
        json_send(array('chat_count'=>(int)$question_item['chat_count'])) ;
        break;

}
