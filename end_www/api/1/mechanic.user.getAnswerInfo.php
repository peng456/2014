<?php
/**
 * 获取答案信息
 * API 2.7
 *
 * @author zhanglipeng	2014.10.23
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['a_id']) || !is_numeric($data['a_id']))
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


$answer_item = model('mechanic_answer')->get_one($data['a_id']);
$user_item = model('mechanic_user')->get_one($answer_item['mechanic_user_id']);
$joininfo_item = model('mechanic_joininfo')->get_one($user_item['joininfo_id']);
$answer_times  = model('mechanic_answer')->get_list(array('mechanic_user_id'=>$answer_item['mechanic_user_id']));
$judgescore_item = model('mechanic_judgescore')->get_one(array('a_id'=>$data['a_id']));
$judgescore_avg = ((float)$judgescore_item['resolution']+(float)$judgescore_item['response_time']+(float)$judgescore_item['attitude'])/3;


$data_send = array();

$data_send['id'] = (int)$user_item['user_id'];
$data_send['name'] = (string)$joininfo_item['name'];
$data_send['avatar'] = (string)$user_item['avatar'];
$data_send['answer_times'] = count($answer_times);
$data_send['stars'] = (int)$joininfo_item['stars'];
$data_send['response_time'] = (int)$joininfo_item['response_time'];
$data_send['reputation'] = (int)$joininfo_item['reputation'];
$data_send['text'] = (string)$answer_item['text'];
$pic = json_decode($answer_item['picture']);
$data_send['pic_count'] =  count($pic);
$data_send['pic_data'] = $pic;
$voice = json_decode($answer_item['voice']);
$data_send['voice_count'] = count($voice);
$data_send['voice_length'] = (int)$answer_item['voice_length'];
$data_send['voice_data'] = $voice;
$data_send['driver_comment'] = (string)$answer_item['driver_comment'];
$data_send['resolution'] = (int)$judgescore_item['resolution'];
$data_send['answer_response_time'] = (int)$judgescore_item['response_time'];
$data_send['attitude'] = (int)$judgescore_item['attitude'];
$data_send['driver_judgescore'] = round($judgescore_avg,1);
$data_send['is_repair'] = (int)$answer_item['is_repair'];
$data_send['pay_amount'] = (int)$answer_item['pay_amount'];



//$comment_items = model('mechanic_comment')->get_list(array('a_id'=>$data['a_id']));
//$comment_items_count = count($comment_items);
//$data_send['comment_count'] = $comment_items_count;
//
//$comments = array();
//for($i = 0;$i<$comment_items_count;$i++)
//{
//    $comments[$i]['id'] = $comment_items[$i]['mechanic_user_id'];
//    $user_item = model('mechanic_user')->get_one($comment_items[$i]['mechanic_user_id']);
//    $joininfo_item = model('mechanic_joininfo')->get_one($user_item['joininfo_id']);
//
//    $comments[$i]['name']     =  (string)$joininfo_item['name'];
//    $comments[$i]['avatar']   =  (string)$user_item['avatar'];
//    $comments[$i]['content']  =  (string)$comment_items[$i]['content'];
//}
//
//$data_send['comment'] = $comments;

$view_answer = model('mechanic_answerview')->add(array('a_id'=>$data['a_id'],'user_id'=>$token['owner_id']));
if(!$view_answer){
    die_json_msg('answerview表增加失败',10101);
}
//更改question状态
$user_role_item = model('mechanic_user')->get_one($token['owner_id']);
if($user_role_item['role'] != "mechanic"){

    $q_data = model('mechanic_question')->get_one(array('q_id'=>$answer_item['q_id'])) ;

    if (!$q_data){
        die_json_msg('question表获取信息失败',10101);
    }
    if ($q_data['q_status'] == 4)
    {
        $res = model('mechanic_question')->update($answer_item['q_id'],array('q_status'=>5 )) ;
        if (!$res)
            die_json_msg('question表更新q_status失败',10101);
    }
}

$question_item = model('mechanic_question')->get_one($answer_item['q_id']);

$data_send['q_status'] = (int)$question_item['q_status'];    //q_status = 5  :车友查看未评论  车友根据此决定是否评论；  q_status = 6 车友已经评论


json_send($data_send);
















