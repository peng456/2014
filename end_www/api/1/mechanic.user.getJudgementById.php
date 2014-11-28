<?php
/**
 * 获取技师详细信息
 * API 2.4
 *
 * @author   zhanglipeng  2014.11.20
 */
 
$data = $_POST;

if (!isset($data['access_token'])|| !isset($data['q_id']))
{
	die_json_msg('参数错误', 10100);
}
$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
if (!$item){
    die_json_msg('access_token不可用',10600);
}
    $question_item = model('mechanic_question')->get_one($data['q_id']);
    if($question_item['q_status'] == 3){
        $select_comment_sql = "select * from end_mechanic_judgescore  where q_id = {$data['q_id']}";
        $comment_item = model('mechanic_judgescore')->get_one(array('_custom_sql'=>$select_comment_sql));
        $comment = array(
                'judgescore_id'=>(int)$comment_item['judgescore_id'],
                'driver_user_id'=>(int)$comment_item['driver_user_id'],
                'total_score'=>(int)$comment_item['total_score'],
                'resolution'=>(int)$comment_item['resolution'],
                'attitude'=>(int)$comment_item['attitude'],
                'response_time'=>(int)$comment_item['response_time'],
                'q_id'=>(int)$comment_item['q_id'],
                'comment'=>(string)$comment_item['comment'],
                'create_time'=>(int)$comment_item['create_time']
            );
        json_send($comment);
    }else{
        die_json_msg('还未评价', 10100);
    }