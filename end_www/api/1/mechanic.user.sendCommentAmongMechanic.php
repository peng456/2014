<?php
/**
 * 提交技师间评价
 * API 3.7
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['comment']) || !isset($data['a_id']) || !is_numeric($data['a_id']))
{
	die_json_msg('parameter invalid', 10001);
}

//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user',
    'status'=>'valid',
    'access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('accesstoken  不可用', 10001);
}

$data_comment_insert = array();

$data_comment_insert['a_id'] = (int)$data['a_id'];
$data_comment_insert['mechanic_user_id'] = (int)$token['owner_id'];
$data_comment_insert['content'] = $data['comment'];
$data_comment_insert['create_time'] = time();

$comment_item = model('mechanic_comment')->add($data_comment_insert);


if(!$comment_item)
{
    die_json_msg('评论上传失败', 10001);
}


json_send(
        array()
);

