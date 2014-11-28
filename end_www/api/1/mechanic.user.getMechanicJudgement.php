<?php
/**
 * 获取技师详细信息
 * API 2.4
 *
 * @author   zhanglipeng  2014.11.20
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['mechanic_id'])|| !isset($data['from'])|| !isset($data['type']) || !in_array((int)$data['type'],array(0,1,2)))
{
	die_json_msg('参数错误', 10100);
}
$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));
if (!$item)
    die_json_msg('access_token不可用',10600);

switch($data['type']){


    case 0 :
        $select_comments_sql = "select * from end_mechanic_judgescore where mechanic_id = {$data['mechanic_id']} order by create_time desc limit {$data['from']},10";
       $comment_items = model('mechanic_judgescore')->get_list(array('_custom_sql'=>$select_comments_sql));
       $comments = array();
       $count = 0;
       foreach($comment_items as $key =>$comment_item){
               $driver_item  = model('mechanic_user')->get_one(array('user_id' => $comment_item['driver_user_id']));
               $question_item  = model('mechanic_question')->get_one(array('q_id' => $comment_item['q_id']));
               if(!$driver_item || !$question_item) continue;
               $comments[] = array(
                   'driver_id'=>(int)$driver_item['user_id'],
                   'nickname'=>(string)$driver_item['nickname'],
                   'total_score'=>(int)$comment_item['total_score'],
                   'driver_comment'=>(string)$comment_item['comment'],
                   'question_text'=>(string)$question_item['text'],
                   'q_id'=>(int)$question_item['q_id'],
                   'type'=>(int)$question_item['type']
                    );
               $count++;
             }
          json_send(array('count'=>$count,'comments'=>$comments));
    case 1 :
        $select_comments_sql = "select judgescore.* from end_mechanic_judgescore as judgescore  inner join end_mechanic_question as question using(q_id) where question.type in(0,1) and mechanic_id = {$data['mechanic_id']} order by create_time desc limit {$data['from']},10";
        $comment_items = model('mechanic_judgescore')->get_list(array('_custom_sql'=>$select_comments_sql));
        $comments = array();
        $count = 0;
        foreach($comment_items as $key =>$comment_item){
            $driver_item  = model('mechanic_user')->get_one(array('user_id' => $comment_item['driver_user_id']));
            $question_item  = model('mechanic_question')->get_one(array('q_id' => $comment_item['q_id']));
            if(!$driver_item || !$question_item) continue;
            $comments[] = array(
                'driver_id'=>(int)$driver_item['user_id'],
                'nickname'=>(string)$driver_item['nickname'],
                'total_score'=>(int)$comment_item['total_score'],
                'driver_comment'=>(string)$comment_item['comment'],
                'q_id'=>(int)$question_item['q_id'],
                'question_text'=>(string)$question_item['text'],
                'type'=>(int)$question_item['type']
            );
            $count++;
        }
        json_send(array('count'=>$count,'comments'=>$comments));


    case 2 :
        $select_comments_sql = "select judgescore.* from end_mechanic_judgescore as judgescore  inner join end_mechanic_question as question using(q_id) where question.type in(2,3) and mechanic_id = {$data['mechanic_id']} order by create_time desc limit {$data['from']},10";
        $comment_items = model('mechanic_judgescore')->get_list(array('_custom_sql'=>$select_comments_sql));
        $comments = array();
        $count = 0;
        foreach($comment_items as $key =>$comment_item){
            $driver_item  = model('mechanic_user')->get_one(array('user_id' => $comment_item['driver_user_id']));
            $question_item  = model('mechanic_question')->get_one(array('q_id' => $comment_item['q_id']));
            if(!$driver_item || !$question_item) continue;
            $comments[] = array(
                'driver_id'=>(int)$driver_item['user_id'],
                'nickname'=>(string)$driver_item['nickname'],
                'total_score'=>(int)$comment_item['total_score'],
                'driver_comment'=>(string)$comment_item['comment'],
                'q_id'=>(int)$question_item['q_id'],
                'question_text'=>(string)$question_item['text'],
                'type'=>(int)$question_item['type']
            );
            $count++;
        }
        json_send(array('count'=>$count,'comments'=>$comments));
}