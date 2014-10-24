<?php
/**
 * 获取答案信息
 * API 2.7
 *
 * @author liudanking	2013.08.09
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
$data_send['voice_data'] = $voice;

$comment_items = model('mechanic_comment')->get_list(array('a_id'=>$data['a_id']));
$comment_items_count = count($comment_items);
$data_send['comment_count'] = $comment_items_count;

$comments = array();
for($i = 0;$i<$comment_items_count;$i++)
{
    $comments[$i]['id'] = $comment_items[$i]['mechanic_user_id'];
    $user_item = model('mechanic_user')->get_one($comment_items[$i]['mechanic_user_id']);
    $joininfo_item = model('mechanic_joininfo')->get_one($user_item['joininfo_id']);

    $comments[$i]['name']     =  (string)$joininfo_item['name'];
    $comments[$i]['avatar']   =  (string)$user_item['avatar'];
    $comments[$i]['content']  =  (string)$comment_items[$i]['content'];
}

$data_send['comment'] = $comments;

json_send($data_send);
















