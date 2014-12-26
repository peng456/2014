<?php
/**
 * 2.2.	提交问题
 * API 2.2
 *
 * @author zhanglipeng  2014/10/19 23:22
 */
//require_once  $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
require_once  $_SERVER['DOCUMENT_ROOT']."/mechanic/vendor/autoload.php";

use JPush\Model as M;
use JPush\JPushClient;
use JPush\JPushLog;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use JPush\Exception\APIConnectionException;
use JPush\Exception\APIRequestException;


$data = $_POST;

if (!isset($data['access_token']) || !isset($data['type'])|| !isset($data['q_type_firstclass'])|| !isset($data['q_type_secondclass']) || !isset($data['brand']) || !isset($data['model']) || !isset($data['series']) || !isset($data['year']) )
{
    die_json_msg('参数错误', 10100);
}

if($data['type'] != 3 ){
    if(!isset($data['msg'])){
        die_json_msg('参数错误', 10100);
    }
}

if($data['type'] == 1){
    if (!isset($data['mechanic_id']) || !is_numeric($data['mechanic_id']) ){
        die_json_msg('参数错误', 10100);
    }
}
if($data['type'] == 2){
    if (!isset($data['mechanic_id']) || !is_numeric($data['mechanic_id'])|| !is_numeric($data['phonenumber']) || !isset($data['phonenumber'])|| !isset($data['period_record_id']) ){
        die_json_msg('参数错误', 10100);
    }
}
if($data['type'] == 3 ){
    if (!is_numeric($data['phonenumber']) || !isset($data['phonenumber'])){
        die_json_msg('参数错误', 10100);
    }
}

//判断accesstoken        是否过期
$token = model('mechanic_token')->get_one(array('token_type'=>'user',
    'status'=>'valid',
    'access_token'=>$data['access_token']));
if (!$token)
{
    die_json_msg('access_token不可用', 10600);
}

$data_receive = json_decode($data['msg'],true);
$data_insert_question = array();
if($data_receive['text'])
{
	$data_insert_question ['text'] = $data_receive['text'];
}

if($data_receive['pic_data'])
{
	$data_insert_question ['picture'] = json_encode($data_receive['pic_data']);
}

$now_time = time();
//关于此问题有关车的类型
$data_insert_question['brand'] = (int)$data['brand'];
$data_insert_question['model'] = (int)$data['model'];
$data_insert_question['series'] = (int)$data['series'];
$data_insert_question['year'] = (int)$data['year'];
$data_insert_question ['type'] = $data['type'];
$data_insert_question ['driver_user_id'] = (int)$token['owner_id'];
$data_insert_question ['reward'] = $data['reward'];
$data_insert_question ['view_count'] = 0;
$data_insert_question ['is_soluted'] = 0;
$data_insert_question ['is_accept'] =  0;
$data_insert_question ['create_time'] = $now_time ;
$data_insert_question ['q_type_firstclass'] =  $data['q_type_firstclass'] ;
$data_insert_question ['q_type_secondclass'] =  $data['q_type_secondclass'] ;



if ($data['type'] == 0)
{

    //   match  with   workbrand  to question's  brand  //and a.status = 'online'        以后处理
    $select_mechanic_items = "select a.avatar, a.user_id ,a.huanxin_id ,b.name ,b.workbrand from end_mechanic_user as a  INNER JOIN end_mechanic_joininfo as b using(joininfo_id) where a.role = 'mechanic'  and b.workbrand = {$data['brand']} ";
    $mechainc_items = model('mechanic_user')->get_list(array('_custom_sql'=>$select_mechanic_items));

    if(!$mechainc_items){
        die_json_msg('无技师上线', 10101);
    }

    $return_count = count($mechainc_items);
   while($mechainc_items)
    {
    //此处添加技师筛选程序
    $seletc_mechanic_id = mt_rand(0,count($mechainc_items)-1);

    //判断技师和车友 是否 存在 未完成免费、付费图文咨询
     $find_pro_question_sql = "select q_id from end_mechanic_question where q_status < 2 and q_id in (select q_id from end_mechanic_driver_mechanic_question where q_type in(0,1,2) and mechanic_id = {$mechainc_items[$seletc_mechanic_id]['user_id']} and  driver_id = {$token['owner_id']})";
     $question_id  = model('mechanic_question')->get_list(array('_custom_sql'=>$find_pro_question_sql));
     if($question_id){
         unset($mechainc_items[$seletc_mechanic_id]);
         sort($mechainc_items);
         continue;
     }
     $now_time_range = $now_time - 60;
     $question_item = model('mechanic_question')->set($data_insert_question,array('driver_user_id'=>$token['owner_id'],'text'=>$data_receive['text'],'where'=>"create_time > $now_time_range"));
     if(!$question_item)
     {
         die_json_msg('question表增加失败', 10101);
     }


  //  $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$mechainc_items[$seletc_mechanic_id]['user_id']})";
    $mechanic_driver_mechanic_question_item = model('mechanic_driver_mechanic_question')->get_one(array('q_id'=>$question_item));
    if($mechanic_driver_mechanic_question_item){
        die_json_msg('您在一分钟内已经提过此问题', 10101);
    }

    $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$mechainc_items[$seletc_mechanic_id]['user_id']})";
    $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
    if($professional_field_items === null){
        die_json_msg('professional_field表查询失败', 10101);
    }
    $professional_field = array();
    foreach ($professional_field_items as $key => $select_mechanic_id)
        {
            $professional_field[] = $select_mechanic_id['field_name'];

        }
     $is_favorite_item = model('mechanic_favorite')->get_one(array('driver_user_id'=>$token['owner_id'],'mechanic_user_id'=>$mechainc_items[$seletc_mechanic_id]['user_id']));
     $is_favorite = 0;
     if($is_favorite_item){
         $is_favorite = 1;
     }
     $send_data =array(
        'mechanic_id'=>(int)$mechainc_items[$seletc_mechanic_id]['user_id'],
        'huanxin_id'=>$mechainc_items[$seletc_mechanic_id]['huanxin_id'],
        'avatar'=>$mechainc_items[$seletc_mechanic_id]['avatar'],
        'name'=>$mechainc_items[$seletc_mechanic_id]['name'],
        'q_id'=>(int)$question_item,
        'is_favourite'=>$is_favorite,
        'professional_field'=>$professional_field
    );

    $data_insert_raletion = array('mechanic_id'=>(int)$mechainc_items[$seletc_mechanic_id]['user_id'],'driver_id'=>$token['owner_id'],'q_id'=>$question_item,'q_type'=>0,'status'=>0,'createtime'=>$now_time);
    $relation =  model('mechanic_driver_mechanic_question')->add($data_insert_raletion);
   if(!$relation){
       die_json_msg('关系表增加失败', 10101);
   }
    json_send($send_data);

  }
    if(count($send_data) == 0){
        json_send("还有答案没有评价",10101);
    }

}

if($data['type'] == 1 ){   //付费图文咨询
    //   match  with   workbrand  to question's  brand  //and a.status = 'online'        以后处理
    $select_mechanic_items = "select a.avatar, a.user_id ,a.huanxin_id ,b.name ,b.workbrand from end_mechanic_user as a  INNER JOIN end_mechanic_joininfo as b using(joininfo_id) where a.user_id = {$data['mechanic_id']} ";
    $mechainc_item = model('mechanic_user')->get_one(array('_custom_sql'=>$select_mechanic_items));

    if(!$mechainc_item){
        die_json_msg('无此技师', 10101);
    }
    //判断技师和车友 是否 存在 未完成免费、付费图文咨询、预约电话咨询
        $find_pro_question_sql = "select q_id from end_mechanic_question where q_status < 2 and q_id in (select q_id from end_mechanic_driver_mechanic_question where q_type in(0,1,2) and mechanic_id = {$data['mechanic_id']} and  driver_id = {$token['owner_id']})";
        $question_id  = model('mechanic_question')->get_list(array('_custom_sql'=>$find_pro_question_sql));
        if($question_id){
            die_json_msg('图文咨询还有未完成', 10101);
        }
      $now_time_range = $now_time - 60;
      $question_item = model('mechanic_question')->set($data_insert_question,array('driver_user_id'=>$token['owner_id'],'text'=>$data_receive['text'],'where'=>"create_time > $now_time_range"));
     if(!$question_item)
      {
        die_json_msg('question表增加失败', 10101);
      }
    $mechanic_driver_mechanic_question_item = model('mechanic_driver_mechanic_question')->get_one(array('q_id'=>$question_item));
    if($mechanic_driver_mechanic_question_item){
        die_json_msg('您在一分钟内已经提过此问题', 10101);
    }

        $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$mechainc_item['user_id']})";
        $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
        if($professional_field_items === null){
            die_json_msg('professional_field表查询失败', 10101);
        }
        $professional_field = array();
        foreach ($professional_field_items as $key => $select_mechanic_id)
        {
            $professional_field[] = $select_mechanic_id['field_name'];

        }
        $is_favorite_item = model('mechanic_favorite')->get_one(array('driver_user_id'=>$token['owner_id'],'mechanic_user_id'=>$mechainc_item['user_id']));
        $is_favorite = 0;
        if($is_favorite_item){
            $is_favorite = 1;
        }
        $send_data =array(
            'mechanic_id'=>(int)$mechainc_item['user_id'],
            'huanxin_id'=>$mechainc_item['huanxin_id'],
            'avatar'=>$mechainc_item['avatar'],
            'name'=>$mechainc_item['name'],
            'q_id'=>(int)$question_item,
            'is_favourite'=>$is_favorite,
            'professional_field'=>$professional_field
        );

        $data_insert_raletion = array('mechanic_id'=>$mechainc_item['user_id'],'driver_id'=>$token['owner_id'],'q_id'=>$question_item,'q_type'=>1,'status'=>0,'createtime'=>$now_time);
        $relation =  model('mechanic_driver_mechanic_question')->add($data_insert_raletion);
       if(!$relation){
            die_json_msg('关系表增加失败', 10101);
        }
        json_send($send_data);
}


if($data['type'] == 2 ){   //预约电话咨询

    $data_insert_question ['phonenumber'] =  $data['phonenumber'] ;
    $data_insert_question ['period_record_id']     =  $data['period_record_id'] ;

    //   match  with   workbrand  to question's  brand  //and a.status = 'online'        以后处理
    $select_mechanic_item = "select a.avatar, a.user_id ,a.huanxin_id ,b.name ,b.workbrand from end_mechanic_user as a  INNER JOIN end_mechanic_joininfo as b using(joininfo_id) where a.user_id = {$data['mechanic_id']} ";
    $mechainc_item = model('mechanic_user')->get_one(array('_custom_sql'=>$select_mechanic_item));

    if(!$mechainc_item){
        die_json_msg('无此技师', 10101);
    }
    //判断技师和车友 是否 存在 未完成免费、付费图文咨询、预约电话咨询
    $find_pro_question_sql = "select q_id from end_mechanic_question where q_status < 2 and q_id in (select q_id from end_mechanic_driver_mechanic_question where q_type in(0,1,2) and mechanic_id = {$data['mechanic_id']} and  driver_id = {$token['owner_id']})";
    $question_id  = model('mechanic_question')->get_list(array('_custom_sql'=>$find_pro_question_sql));
    if($question_id){
        die_json_msg('图文咨询还有未完成', 10101);
    }
    $now_time_range = $now_time - 60;
    $question_item = model('mechanic_question')->set($data_insert_question,array('driver_user_id'=>$token['owner_id'],'text'=>$data_receive['text'],'where'=>"create_time > $now_time_range"));
    if(!$question_item)
    {
        die_json_msg('question表增加失败', 10101);
    }
    $mechanic_driver_mechanic_question_item = model('mechanic_driver_mechanic_question')->get_one(array('q_id'=>$question_item));
    if($mechanic_driver_mechanic_question_item){
        die_json_msg('您在一分钟内已经提过此问题', 10101);
    }

    $data_insert_raletion = array('mechanic_id'=>$mechainc_item['user_id'],'driver_id'=>$token['owner_id'],'q_id'=>$question_item,'q_type'=>2,'status'=>0,'createtime'=>$now_time);
    $relation =  model('mechanic_driver_mechanic_question')->add($data_insert_raletion);
    if(!$relation){
        die_json_msg('关系表增加失败', 10101);
    }

    $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$mechainc_item['user_id']})";
    $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
    if($professional_field_items === null){
        die_json_msg('professional_field表查询失败', 10101);
    }
    $professional_field = array();
    foreach ($professional_field_items as $key => $select_mechanic_id)
    {
        $professional_field[] = $select_mechanic_id['field_name'];

    }
    $is_favorite_item = model('mechanic_favorite')->get_one(array('driver_user_id'=>$token['owner_id'],'mechanic_user_id'=>$mechainc_item['user_id']));
    $is_favorite = 0;
    if($is_favorite_item){
        $is_favorite = 1;
    }
    $send_data =array(
        'mechanic_id'=>(int)$mechainc_item['user_id'],
        'huanxin_id'=>$mechainc_item['huanxin_id'],
        'avatar'=>$mechainc_item['avatar'],
        'name'=>$mechainc_item['name'],
        'q_id'=>(int)$question_item,
        'is_favourite'=>$is_favorite,
        'professional_field'=>$professional_field
    );
    json_send($send_data);
}

if($data['type'] == 3 ){   //快捷电话咨询

    $data_insert_question ['phonenumber'] =  $data['phonenumber'] ;


    $now_time_range = $now_time - 60;
    $question_item = model('mechanic_question')->set($data_insert_question,array('driver_user_id'=>$token['owner_id'],'q_type_firstclass'=>$data['q_type_firstclass'],'q_type_secondclass'=>$data['q_type_secondclass'],'type'=>3,'where'=>"create_time > $now_time_range"));
    if(!$question_item)
    {
        die_json_msg('question表增加失败', 10101);
    }
    $mechanic_driver_mechanic_question_item = model('mechanic_quickphone_request')->get_one(array('q_id'=>$question_item));
    if($mechanic_driver_mechanic_question_item){
        die_json_msg('您在一分钟内已经提过此问题', 10101);
    }
       // 选择合适的技师



    $mechanic_select_sql ="SELECT DISTINCT users.user_id,users.jpush_id from end_mechanic_user as users
                           INNER JOIN (end_mechanic_professional_field as pro_field ,end_mechanic_type_field as type_field )
                           on users.user_id = pro_field.mechanic_id and pro_field.field_id = type_field.field
                           where type_field.question_type = {$data['q_type_firstclass']}";

 //   $select_mechanic = "select user_id,jpush_id from end_mechanic_user where  role = 'mechanic'";
    $mechanic_ids = model('mechanic_user')->get_list(array('_custom_sql'=>$mechanic_select_sql));


// insert  into table end_mechanic_driver_mechanic_question  : record relation  q_id  and   mechanic_id
   $time  = time();
   $insert_relation_sql = "insert into end_mechanic_quickphone_request(mechanic_id,driver_id,q_id,q_type,status,create_time) values";
   foreach($mechanic_ids as $key => $values){
       $relation_values[]="({$values['user_id']},{$token['owner_id']},$question_item,3,0,$time)";
       }
   $sql = $insert_relation_sql.implode(',',$relation_values);
   $insert_relation = $db->query($sql);
   if(!$insert_relation){
    die_json_msg('关系表增加失败', 10101);
       }

//问题 通过  极光推送  到技师端
//    $master_secret = '779e8879efb1a54dc855bd30';
//    $app_key='4a215a78faccfed9e5679441';
    $master_secret = 'e556f96cd4b2bf267f4192ea';
    $app_key='91360bada1db676c043111a0';
    $temp = array();
    foreach($mechanic_ids as $key=>$value){
        if($value['jpush_id'] == null) continue;
        $temp[]=$value['jpush_id'];
    }
    $regis_ids = json_encode(array('registration_id'=>$temp));
    JPushLog::setLogHandlers(array(new StreamHandler($_SERVER['DOCUMENT_ROOT'].'/mechanic/log/jpush.log', Logger::DEBUG)));
    $client = new JPushClient($app_key, $master_secret);

//$temp = $client->report(1260874449);
//var_dump($temp );

//easy push
    try {
        $result = $client->push()
            ->setPlatform(M\all)
            ->setAudience($regis_ids)
            // ->setAudience(M\all)
            ->setNotification(M\notification('快捷电话，外快挣得就是快'))
            ->send();
        $qusetion_msg_id = model('mechanic_question')->update($question_item,array('msg_id'=>$result->msg_id));
        if(!$qusetion_msg_id){
            die_json_msg('question表更新失败', 10101);
        }
        json_send(array('q_id'=>$question_item));
    } catch (APIRequestException $e) {
        die_json_msg('服务器内部错误', 10101);
    } catch (APIConnectionException $e) {
        die_json_msg('服务器比较繁忙，请稍后再试', 10101);
    }
}

json_send("参数错误",10010);

	





























