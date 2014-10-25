<?php
/**
 * 获取最近提问列表
 * API 3.5
 *
 * @author duyifan 2014.10.18
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

    case  'hottest':
        $query_sql_hottest = "select a_id  ,count(a_id) as num from end_mechanic_answerview group by a_id order by num DESC limit {$data['from']},10";
        $answer_view_items = model('mechanic_answerview')->get_list(array('_custom_sql'=>$query_sql_hottest));
        if(!$answer_view_items){
            die_json_msg('answerview表查询失败',10101);
        }
        $count = 0 ;
        $answer_question_data_item = array() ;
        foreach ($answer_view_items as $key => $value)
        {
            $count++;
            $answerdata = model('mechanic_answer')->get_one(array('a_id' => $value['a_id']) ) ;
            $questiondata = model('mechanic_question')->get_one(array('q_id' => $answerdata['q_id']) ) ;
            $driver_user = model('mechanic_user')->get_one(array('user_id' => $questiondata['driver_user_id']) ) ;
            $mechanic_user = model('mechanic_user')->get_one(array('user_id' => $answerdata['mechanic_user_id']) ) ;
            $joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $mechanic_user['joininfo_id'] )) ;

            if (!$mechanic_user || !$joininfo )
                die_json_msg('user表或joininfo表无技师数据',20100);
            $question_pictures = json_decode($questiondata['picture']);
            $question_voices = json_decode($questiondata['voice']);
            $answer_pictures = json_decode($answerdata['picture']);
            $answer_voices = json_decode($answerdata['voice']);

            $driver_judgescore = model('mechanic_judgescore')->get_one(array('a_id'=>$value['a_id']));
            if($driver_judgescore === null){
                die_json_msg('judgescore表查询失败',10101);
            }
            $judgescore_avg = ((float)$driver_judgescore['resolution']+(float)$driver_judgescore['response_time']+(float)$driver_judgescore['attitude'])/3;

           $answer_question_data_item[] = array(
               'question_data'=>array(
                'driver_user_id'=>(int)$driver_user['user_id'] ,
                'driver_name'=>(string)$driver_user['nickname'] ,
                'driver_avatar'=>(string)$driver_user['avatar'] ,
                'q_id'=>(int)$questiondata['q_id'] ,
                'q_type'=>(string)$questiondata['q_type'] ,
                'time'=>(int)$questiondata['create_time'] ,
                'text'=>(string)$questiondata['text'] ,
                'pic_count'=>(int)count($question_pictures) ,
                'pic_data'=>$question_pictures ,
                'voice_count'=>(int)count($question_voices) ,
                'voice_data'=>$question_voices
               ),
               'answer_count'=>1,
               'answer_data'=>array(
               'mechanic_user_id'=>(int)$mechanic_user['user_id'] ,
               'mechanic_name'=>(string)$joininfo['name'] ,
               'mechanic_avatar'=>(string)$mechanic_user['avatar'] ,
               'pay_amount'=>(float)$answerdata['pay_amount'] ,
               'driver_judgescore'=>$judgescore_avg,
               'a_id'=>(int)$answerdata['a_id'] ,
               'time'=>(int)$answerdata['create_time'] ,
               'text'=>(string)$answerdata['text'] ,
               'pic_count'=>(int)count($answer_pictures) ,
               'pic_data'=>$answer_pictures ,
               'voice_count'=>(int)count($answer_voices) ,
               'voice_data'=>$answer_voices
               )
            );
        }
       json_send(array('count'=>$count,'data'=>$answer_question_data_item));

    case  'last':
        $query_sql_last = "select * from end_mechanic_answer  order by create_time DESC limit {$data['from']},10";
        $answer_items = model('mechanic_answer')->get_list(array('_custom_sql'=>$query_sql_last));
        if($answer_items === null){
            die_json_msg('answerview表查询失败',10101);
        }
        $count = 0 ;
        $answer_question_data_item = array() ;
        foreach ($answer_items as $key => $answerdata)
        {
            $count++;
            $questiondata = model('mechanic_question')->get_one(array('q_id' => $answerdata['q_id']) ) ;
            $driver_user = model('mechanic_user')->get_one(array('user_id' => $questiondata['driver_user_id']) ) ;
            $mechanic_user = model('mechanic_user')->get_one(array('user_id' => $answerdata['mechanic_user_id']) ) ;
            $joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $mechanic_user['joininfo_id'] )) ;

            if (!$mechanic_user || !$joininfo )
                die_json_msg('user表或joininfo表无技师数据',20100);
            $question_pictures = json_decode($questiondata['picture']);
            $question_voices = json_decode($questiondata['voice']);
            $answer_pictures = json_decode($answerdata['picture']);
            $answer_voices = json_decode($answerdata['voice']);

            $driver_judgescore = model('mechanic_judgescore')->get_one(array('a_id'=>$answerdata['a_id']));
            if($driver_judgescore === null){
                die_json_msg('judgescore表查询失败',10101);
            }
            $judgescore_avg = ((float)$driver_judgescore['resolution']+(float)$driver_judgescore['response_time']+(float)$driver_judgescore['attitude'])/3;

            $answer_question_data_item[] = array(
                'question_data'=>array(
                    'driver_user_id'=>(int)$driver_user['user_id'] ,
                    'driver_name'=>(string)$driver_user['nickname'] ,
                    'driver_avatar'=>(string)$driver_user['avatar'] ,
                    'q_id'=>(int)$questiondata['q_id'] ,
                    'q_type'=>(string)$questiondata['q_type'] ,
                    'time'=>(int)$questiondata['create_time'] ,
                    'text'=>(string)$questiondata['text'] ,
                    'pic_count'=>(int)count($question_pictures) ,
                    'pic_data'=>$question_pictures ,
                    'voice_count'=>(int)count($question_voices) ,
                    'voice_data'=>$question_voices
                ),
                'answer_count'=>1,
                'answer_data'=>array(
                    'mechanic_user_id'=>(int)$mechanic_user['user_id'] ,
                    'mechanic_name'=>(string)$joininfo['name'] ,
                    'mechanic_avatar'=>(string)$mechanic_user['avatar'] ,
                    'pay_amount'=>(float)$answerdata['pay_amount'] ,
                    'driver_judgescore'=>$judgescore_avg,
                    'a_id'=>(int)$answerdata['a_id'] ,
                    'time'=>(int)$answerdata['create_time'] ,
                    'text'=>(string)$answerdata['text'] ,
                    'pic_count'=>(int)count($answer_pictures) ,
                    'pic_data'=>$answer_pictures ,
                    'voice_count'=>(int)count($answer_voices) ,
                    'voice_data'=>$answer_voices
                )
            );
        }
        json_send(array('count'=>$count,'data'=>$answer_question_data_item));

    case  'car':
        if(!isset($data['car']))
        {
            die_json_msg('参数错误', 10100);
        }
        $car_band = model('mechanic_car_band')->get_one(array('car_brand_id'=>$data['car']));
        if(!$car_band)
        {
            die_json_msg('没有此车品牌', 21200);
        }

        $query_sql_car = "select question.*,answer.* from end_mechanic_question  as question INNER JOIN end_mechanic_answer as answer USING(q_id) where question.q_type = {$data['car']}  ORDER BY answer.create_time DESC LIMIT {$data['from']},10";
        $question_answer_items = model('mechanic_question')->get_list(array('_custom_sql'=>$query_sql_hottest));
        if($question_answer_items === null)
        {
            die_json_msg('answer、question表查询失败', 10101);
        }

        $count = 0 ;
        $answer_question_data_item = array() ;
        foreach ($question_answer_items as $key => $answer_question_data_item)
        {
            $count++;

            $driver_user = model('mechanic_user')->get_one(array('user_id' => $answer_question_data_item['driver_user_id']) ) ;
            $mechanic_user = model('mechanic_user')->get_one(array('user_id' => $answer_question_data_item['mechanic_user_id']) ) ;
            $joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $mechanic_user['joininfo_id'] )) ;

            if (!$mechanic_user || !$joininfo )
                die_json_msg('user表或joininfo表无技师数据',20100);
            $question_pictures = json_decode($answer_question_data_item['picture']);
            $question_voices = json_decode($answer_question_data_item['voice']);
            $answer_pictures = json_decode($answer_question_data_item['picture1']);
            $answer_voices = json_decode($answer_question_data_item['voice1']);

            $driver_judgescore = model('mechanic_judgescore')->get_one(array('a_id'=>$answer_question_data_item['a_id']));
            if($driver_judgescore === null){
                die_json_msg('judgescore表查询失败',10101);
            }
            $judgescore_avg = ((float)$driver_judgescore['resolution']+(float)$driver_judgescore['response_time']+(float)$driver_judgescore['attitude'])/3;

            $answer_question_data[] = array(
                'question_data'=>array(
                    'driver_user_id'=>(int)$driver_user['user_id'] ,
                    'driver_name'=>(string)$driver_user['nickname'] ,
                    'driver_avatar'=>(string)$driver_user['avatar'] ,
                    'q_id'=>(int)$answer_question_data_item['q_id'] ,
                    'q_type'=>(string)$answer_question_data_item['q_type'] ,
                    'time'=>(int)$answer_question_data_item['create_time'] ,
                    'text'=>(string)$answer_question_data_item['text'] ,
                    'pic_count'=>(int)count($question_pictures) ,
                    'pic_data'=>$question_pictures ,
                    'voice_count'=>(int)count($question_voices) ,
                    'voice_data'=>$question_voices
                ),
                'answer_count'=>1,
                'answer_data'=>array(
                    'mechanic_user_id'=>(int)$mechanic_user['user_id'] ,
                    'mechanic_name'=>(string)$joininfo['name'] ,
                    'mechanic_avatar'=>(string)$mechanic_user['avatar'] ,
                    'pay_amount'=>(float)$answer_question_data_item['pay_amount'] ,
                    'driver_judgescore'=>$judgescore_avg,
                    'a_id'=>(int)$answer_question_data_item['a_id'] ,
                    'time'=>(int)$answer_question_data_item['create_time1'] ,
                    'text'=>(string)$answer_question_data_item['text1'] ,
                    'pic_count'=>(int)count($answer_pictures) ,
                    'pic_data'=>$answer_pictures ,
                    'voice_count'=>(int)count($answer_voices) ,
                    'voice_data'=>$answer_voices
                )
            );
        }
        json_send(array('count'=>$count,'data'=>$answer_question_data));
}






