<?php
/**
 * 获取精华问答列表
 * API 2.12
 *
 * @author zhanglipeng 2014.10.28
 *
 * change the contion of question ;add contion such as  q_status = 6 ,and $judgescore_avg >= 4
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

            if($questiondata['q_status'] != 6) continue;
            $judgescore_item = model('mechanic_judgescore')->get_one(array('a_id'=>$answerdata['a_id']));
            $judgescore_avg = ((float)$judgescore_item['resolution']+(float)$judgescore_item['response_time']+(float)$judgescore_item['attitude'])/3;
            if($judgescore_avg < 4) continue;
            $driver_user = model('mechanic_user')->get_one(array('user_id' => $questiondata['driver_user_id']) ) ;
            $mechanic_user = model('mechanic_user')->get_one(array('user_id' => $answerdata['mechanic_user_id']) ) ;
            $joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $mechanic_user['joininfo_id'] )) ;

            if (!$mechanic_user || !$joininfo )
                die_json_msg('user表或joininfo表无技师数据',20100);
            $question_pictures = json_decode($questiondata['picture']);
            $question_voices = json_decode($questiondata['voice']);
            $answer_pictures = json_decode($answerdata['picture']);
            $answer_voices = json_decode($answerdata['voice']);

            $q_type_firstclass  = model('mechanic_question_type_first')->get_one($questiondata['q_type_firstclass']);
            $q_type_secondclass = model('mechanic_question_type')->get_one($questiondata['q_type_secondclass']);
           $answer_question_data_item[] = array(
               'question_data'=>array(
                'driver_user_id'=>(int)$driver_user['user_id'] ,
                'driver_name'=>(string)$driver_user['nickname'] ,
                'driver_avatar'=>(string)$driver_user['avatar'] ,
                'q_id'=>(int)$questiondata['q_id'] ,
                'q_type_firstclass'=>(string)$q_type_firstclass['content'],
                'q_type_secondclass'=>(string)$q_type_secondclass['content'],
                'time'=>(int)$questiondata['create_time'] ,
                'text'=>(string)$questiondata['text'] ,
                'pic_count'=>(int)count($question_pictures) ,
                'pic_data'=>$question_pictures?$question_pictures:"" ,
                'voice_count'=>(int)count($question_voices),
                'voice_length'=>(int)$questiondata['voice_length'],
                'voice_data'=>$question_voices?$question_voices:"",
                'q_status'=>(int)$questiondata['q_status']
               ),
               'answer_count'=>1,
               'answer_data'=>array(
               'mechanic_user_id'=>(int)$mechanic_user['user_id'] ,
               'mechanic_name'=>(string)$joininfo['name'] ,
               'mechanic_avatar'=>(string)$mechanic_user['avatar'] ,
               'pay_amount'=>(float)$answerdata['pay_amount'] ,
               'driver_judgescore'=>round($judgescore_avg,1),
               'a_id'=>(int)$answerdata['a_id'] ,
               'time'=>(int)$answerdata['create_time'] ,
               'text'=>(string)$answerdata['text'] ,
               'pic_count'=>(int)count($answer_pictures) ,
               'pic_data'=>$answer_pictures?$answer_pictures:"",
               'voice_count'=>(int)count($answer_voices),
               'voice_length'=>(int)$answerdata['voice_length'],
               'voice_data'=>$answer_voices?$answer_voices:""
               )
            );
        }
       json_send(array('count'=>$count,'data'=>$answer_question_data_item));

    case 'last':
        $query_sql_last = "select * from end_mechanic_answer  order by create_time DESC limit {$data['from']},10";
        $answer_items = model('mechanic_answer')->get_list(array('_custom_sql'=>$query_sql_last));
        if($answer_items === null){
            die_json_msg('answerview表查询失败',10101);
        }
        $count = 0 ;
        $answer_question_data_item = array() ;
        foreach ($answer_items as $key => $answerdata)
        {

            $questiondata = model('mechanic_question')->get_one(array('q_id' => $answerdata['q_id']) ) ;
            if($questiondata['status'] != 6) continue;
            $judgescore_item = model('mechanic_judgescore')->get_one(array('a_id'=>$answerdata['a_id']));
            $judgescore_avg = ((float)$judgescore_item['resolution']+(float)$judgescore_item['response_time']+(float)$judgescore_item['attitude'])/3;
            if($judgescore_avg < 4) continue;


            $driver_user = model('mechanic_user')->get_one(array('user_id' => $questiondata['driver_user_id']) ) ;
            $mechanic_user = model('mechanic_user')->get_one(array('user_id' => $answerdata['mechanic_user_id']) ) ;
            $joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $mechanic_user['joininfo_id'] )) ;

            if (!$mechanic_user || !$joininfo )
                die_json_msg('user表或joininfo表无技师数据',20100);
            $question_pictures = json_decode($questiondata['picture']);
            $question_voices = json_decode($questiondata['voice']);
            $answer_pictures = json_decode($answerdata['picture']);
            $answer_voices = json_decode($answerdata['voice']);
            $q_type_firstclass  = model('mechanic_question_type_first')->get_one($questiondata['q_type_firstclass']);
            $q_type_secondclass = model('mechanic_question_type')->get_one($questiondata['q_type_secondclass']);
            $answer_question_data_item[] = array(
                'question_data'=>array(
                    'driver_user_id'=>(int)$driver_user['user_id'] ,
                    'driver_name'=>(string)$driver_user['nickname'] ,
                    'driver_avatar'=>(string)$driver_user['avatar'] ,
                    'q_id'=>(int)$questiondata['q_id'] ,
                    'q_type_firstclass'=>(string)$q_type_firstclass['content'],
                    'q_type_secondclass'=>(string)$q_type_secondclass['content'],
                    'time'=>(int)$questiondata['create_time'] ,
                    'text'=>(string)$questiondata['text'] ,
                    'pic_count'=>(int)count($question_pictures) ,
                    'pic_data'=>$question_pictures?$question_pictures:"" ,
                    'voice_count'=>(int)count($question_voices) ,
                    'voice_length'=>(int)$questiondata['voice_length'],
                    'voice_data'=>$question_voices?$question_voices:""
                ),
                'answer_count'=>1,
                'answer_data'=>array(
                    'mechanic_user_id'=>(int)$mechanic_user['user_id'] ,
                    'mechanic_name'=>(string)$joininfo['name'] ,
                    'mechanic_avatar'=>(string)$mechanic_user['avatar'] ,
                    'pay_amount'=>(float)$answerdata['pay_amount'] ,
                    'driver_judgescore'=>round($judgescore_avg,1),
                    'a_id'=>(int)$answerdata['a_id'] ,
                    'time'=>(int)$answerdata['create_time'] ,
                    'text'=>(string)$answerdata['text'] ,
                    'pic_count'=>(int)count($answer_pictures) ,
                    'pic_data'=>$answer_pictures?$answer_pictures:"" ,
                    'voice_count'=>(int)count($answer_voices) ,
                    'voice_length'=>(int)$answerdata['voice_length'],
                    'voice_data'=>$answer_voices?$answer_voices:""
                )
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
        $query_sql_car = "select question.*,answer.a_id,answer.mechanic_user_id ,answer.text as text1,answer.picture as picture1,answer.voice_length as voice_length1,answer.voice as voice1,answer.create_time as create_time1,answer.pay_amount
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
            if($judgescore_avg < 4) continue;

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
                    'voice_length'=>(int)$answer_question_data_item['voice_length'],
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
                    'voice_length'=>(int)$answer_question_data_item['voice_length1'],
                    'voice_data'=>$answer_voices?$answer_voices:""
                )
            );
            $count++;
        }
        json_send(array('count'=>$count,'data'=>$answer_question_data));
}






