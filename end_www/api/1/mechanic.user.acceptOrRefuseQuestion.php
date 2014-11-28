<?php
/**
 * 提交技师回答意向
 * API 3.8
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['q_id']) || !is_numeric($data['q_id']) || !isset($data['type']) || !in_array($data['type'],array(0,1)))
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

if($data['type'] == 0 ){         //接受  车友提问
    $question_update = model('mechanic_question')->set($data['q_id'],array('q_status'=>1));
    if(!$question_update){
        die_json_msg('question更新失败', 10101);
    }
    json_send();

}else{     //拒绝  车友提问
    $question_update = model('mechanic_question')->set($data['q_id'],array('q_status'=>4));
    if(!$question_update){
        die_json_msg('question更新失败', 10101);
    }
    json_send();
}
