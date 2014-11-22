<?php
/**
 * 获取爆料
 * API 2.14
 *
 * @author zhanglipeng 2014.11.04
 *
 */

$data = $_POST;

if (!isset($data['access_token']) || !isset($data['from']) || !is_numeric($data['from']) || !in_array($data['type'],array('hottest','last','car')))
{
    die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
    'access_token'=>$data['access_token'],
    'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);
switch($data['type']){






    case 'hottest':

        $query_sql_hottest = "select news_id ,count(news_id) as num from end_mechanic_newsview group by news_id order by num DESC limit {$data['from']},10";
        $news_view_items = model('mechanic_newsview')->get_list(array('_custom_sql'=>$query_sql_hottest));
        if(!$news_view_items){
            die_json_msg('newsview表查询失败',10101);
        }
        $count = 0 ;
        $news_data_send_items = array() ;
        foreach ($news_view_items as $key => $news_view_item_id)
        {
            $news_item = model('mechanic_mechanic_news')->get_one($news_view_item_id['news_id']);
            if($news_item === null){
                die_json_msg('news表查询失败',10101);
            }
            $count++;
            $news_data_send_items[] = array(
                'id'=>$news_item['id'],
                'status'=>$news_item['status'],
                'avatar'=> $news_item['avatar'],
                'picture'=> $news_item['picture'],
                'content'=> $news_item['content'],
                'address'=> $news_item['address'],
                'praise_count'=> $news_item['praise_count'],
                'comment_count'=> $news_item['comment_count'],
                'createtime'=> $news_item['createtime']
        );
        }
        json_send(array('count'=>$count,'data'=>$knowledge_data_send_items));


    case 'last':
        $query_sql_last = "select * from end_mechanic_new  order by create_time DESC limit {$data['from']},10";
        $new_items = model('mechanic_new')->get_list(array('_custom_sql'=>$query_sql_last));
        if($new_items === null){
            die_json_msg('answerview表查询失败',10101);
        }
        $count = 0 ;
        $new_data_item = array() ;
        foreach ($new_items as $key => $newdata)
        {

            if($newdata['status'] == 1){
                $driver_user = model('mechanic_user')->get_one(array('user_id' => $newdata['driver_user_id']) ) ;

            }

            $query_sql_praise_count_sql = "select count(*) as num from end_mechanic_new_praise where new_id = {$newdata['new_id']} and satus = 1";
            $query_sql_praise_count = model('mechanic_new_comment')->get_list(array('_custom_sql'=>$query_sql_praise_count_sql));
            if($query_sql_praise_count === null){
                die_json_msg('praise表查询失败',10101);
            }

            $new_data_item[] = array(
                    'new_id'=>(int)$newdata['new_id'],
                    'status'=>(int)$newdata['status'],
                    'driver_user_id'=>(int)$driver_user['user_id'] ,
                    'driver_avatar'=>(string)$driver_user['avatar'] ,
                    'content'=>(string)$newdata['q_id'] ,
//                    'q_type_firstclass'=>(string)$q_type_firstclass['content'],
//                    'q_type_secondclass'=>(string)$q_type_secondclass['content'],
                    'time'=>(int)$questiondata['create_time'] ,
                    'address'=>$newdata['address'] ,
                    'praise_count'=>(int)$query_sql_praise_count['num'] ,
                    'comment_count'=>(int)$newdata['comment_count']
            );
            $count++;
        }
        json_send(array('count'=>$count,'data'=>$answer_question_data_item));

    case 'car':
        if(!isset($data['brand']))
        {
            die_json_msg('参数错误', 10100);
        }
        $car_band = model('mechanic_car_brand')->get_one(array('car_brand_id'=>$data['brand']));
        if(!$car_band)
        {
            die_json_msg('car_brand表查询失败', 10101);
        }
        $query_sql_car = "select question.*,answer.a_id,answer.mechanic_user_id ,answer.text as text1,answer.picture as picture1,answer.voice as voice1,answer.create_time as create_time1,answer.pay_amount
        from end_mechanic_question  as question INNER JOIN end_mechanic_answer as answer USING(q_id) where question.brand = {$data['brand']}  and question.q_status = 6  ORDER BY answer.create_time DESC LIMIT {$data['from']},10";

        $question_answer_items = model('mechanic_question')->get_list(array('_custom_sql'=>$query_sql_car));
        if($question_answer_items === null)
        {
            die_json_msg('answer、question表查询失败', 10101);
        }

        $count = 0 ;
        $answer_question_data = array() ;
        foreach ($question_answer_items as $key => $answer_question_data_item)
        {



            $driver_judgescore = model('mechanic_judgescore')->get_one(array('a_id'=>$answer_question_data_item['a_id']));
            $judgescore_avg = ((float)$driver_judgescore['resolution']+(float)$driver_judgescore['response_time']+(float)$driver_judgescore['attitude'])/3;
            if($judgescore_avg < 3) continue;

            $driver_user = model('mechanic_user')->get_one(array('user_id' => $answer_question_data_item['driver_user_id']) ) ;
            $mechanic_user = model('mechanic_user')->get_one(array('user_id' => $answer_question_data_item['mechanic_user_id']) ) ;
            $joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $mechanic_user['joininfo_id'] )) ;

            if (!$mechanic_user || !$joininfo )
                die_json_msg('user表或joininfo表无技师数据',20100);
            $question_pictures = json_decode($answer_question_data_item['picture']);
            $question_voices = json_decode($answer_question_data_item['voice']);
            $answer_pictures = json_decode($answer_question_data_item['picture1']);
            $answer_voices = json_decode($answer_question_data_item['voice1']);


            $q_type_firstclass  = model('mechanic_question_type_first')->get_one($answer_question_data_item['q_type_firstclass']);
            $q_type_secondclass = model('mechanic_question_type')->get_one($answer_question_data_item['q_type_secondclass']);
            $answer_question_data[] = array(
                'question_data'=>array(
                    'driver_user_id'=>(int)$driver_user['user_id'] ,
                    'driver_name'=>(string)$driver_user['nickname'] ,
                    'driver_avatar'=>(string)$driver_user['avatar'] ,
                    'q_id'=>(int)$answer_question_data_item['q_id'] ,
                    'q_type_firstclass'=>(string)$q_type_firstclass['content'],
                    'q_type_secondclass'=>(string)$q_type_secondclass['content'],
                    'time'=>(int)$answer_question_data_item['create_time'] ,
                    'text'=>(string)$answer_question_data_item['text'] ,
                    'pic_count'=>(int)count($question_pictures) ,
                    'pic_data'=>$question_pictures?$question_pictures:"" ,
                    'voice_count'=>(int)count($question_voices) ,
                    'voice_data'=>$question_voices?$question_voices:""
                ),
                'answer_count'=>1,
                'answer_data'=>array(
                    'mechanic_user_id'=>(int)$mechanic_user['user_id'] ,
                    'mechanic_name'=>(string)$joininfo['name'] ,
                    'mechanic_avatar'=>(string)$mechanic_user['avatar'] ,
                    'pay_amount'=>(float)$answer_question_data_item['pay_amount'] ,
                    'driver_judgescore'=>round($judgescore_avg,1),
                    'a_id'=>(int)$answer_question_data_item['a_id'] ,
                    'time'=>(int)$answer_question_data_item['create_time1'] ,
                    'text'=>(string)$answer_question_data_item['text1'] ,
                    'pic_count'=>(int)count($answer_pictures) ,
                    'pic_data'=>$answer_pictures?$answer_pictures:"" ,
                    'voice_count'=>(int)count($answer_voices) ,
                    'voice_data'=>$answer_voices?$answer_voices:""
                )
            );
            $count++;
        }
        json_send(array('count'=>$count,'data'=>$answer_question_data));
}






