<?php
/**
 * 获取技师详细信息
 * API 2.4
 *
 * @author   zhanglipeng  2014.11.20
 */
 
$data = $_POST;

if (!isset($data['access_token']) ||(!isset($data['mechanic_id'])&&!isset($data['huanxin_id'])) )
{
	die_json_msg('参数错误', 10100);
}


$item = model('mechanic_token')->get_one(array('token_type'=>'user',
                                            'access_token'=>$data['access_token'],
                                            'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

if(isset($data['mechanic_id'])){
$month_ago_time = time() - 30*24*3600 ;

$userdata = model('mechanic_user')->get_one(array('user_id' => $data['mechanic_id']) ) ;
$joininfo = model('mechanic_joininfo')->get_one(array('joininfo_id' => $userdata['joininfo_id'] )) ;
$answer_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_driver_mechanic_question as d_m_q inner join end_mechanic_question as question using(q_id) WHERE question.q_status > 1 and d_m_q.mechanic_id = {$data['mechanic_id']} AND question.create_time > $month_ago_time ") ;

if (!$joininfo || !$userdata)
    die_json_msg('user表或joininfo表无技师数据',20100);

$workbrand = model('mechanic_car_brand')->get_one(array('car_brand_id'=>$joininfo['workbrand'])) ;
$favorite_times = get_query_item_count("SELECT COUNT(*) FROM end_mechanic_favorite WHERE mechanic_user_id = {$userdata['user_id']} and status = 1") ;

$workcity = model('mechanic_city')->get_one(array('city_id'=>$joininfo['workcity'])) ;
$workcityname = $workcity['city_name'] ;

while($workcity['pid'] != 0)
{
	$workcity = model('mechanic_city')->get_one(array('city_id'=>$workcity['pid'])) ;
	$workcityname = $workcity['city_name'].$workcityname ;
}


if (!$workcity || !$workbrand ){
    die_json_msg('city表、brand表信息获取失败',20400);
}

 $is_favorite = model('mechanic_favorite')->get_one(array('driver_user_id'=>$item['owner_id'],'mechanic_user_id'=>$data['mechanic_id'],'status'=>1));

    //获取 技师 擅长领域
    $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$data['mechanic_id']})";
    $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
    if($professional_field_items === null){
        die_json_msg('professional_field表查询失败', 10101);
    }
    $professional_field = array();
    foreach ($professional_field_items as $key_field => $value_field)
    {
        $professional_field[$key_field] = $value_field['field_name'];

    }

    //获取 技师 专注车型
    $professional_brand_sql = "select brand_name from end_mechanic_car_brand where car_brand_id in(select brand_id from end_mechanic_professional_brand where mechanic_id = {$data['mechanic_id']})";
    $professional_brand_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_brand_sql));
    if($professional_brand_items === null){
        die_json_msg('professional_brand表查询失败', 10101);
    }
    $professional_brand = array();
    foreach ($professional_brand_items as $key_brand => $value_brand)
    {
        $professional_brand[$key_brand] = $value_brand['brand_name'];
    }

 $select_server_sql = "select * from end_mechanic_server where id in(select server_id from end_mechanic_server_mechanic where mechanic_id = {$data['mechanic_id']} and status = 1);";
 $server_items  =  model('mechanic_server')->get_list(array('_custom_sql'=>$select_server_sql));
 $server = array();
 foreach ($server_items as $key_server => $server_item)
    {
        $server[$key_server]['server_id'] = (int)$server_item['id'];
        $server[$key_server]['server_name'] = (string)$server_item['name'];
        $server[$key_server]['details'] = (string)$server_item['details'];
        $server[$key_server]['price'] = (int)$server_item['price'];
        $server[$key_server]['buy_times'] = 15;
        $server[$key_server]['driver_judgescore'] = 4.5;
    }
 $select_comment_sql = "select * from end_mechanic_judgescore where mechanic_id = {$data['mechanic_id']} order by create_time desc ";
 $comment_item = model('mechanic_judgescore')->get_one(array('_custom_sql'=>$select_comment_sql));
 if($comment_item){
       $driver_item  = model('mechanic_user')->get_one(array('user_id' => $comment_item['driver_user_id']));
       $question_item  = model('mechanic_question')->get_one(array('q_id' => $comment_item['q_id']));

       $comment = array(
            'driver_id'=>(int)$driver_item['user_id'],
            'nickname'=>(string)$driver_item['nickname'],
            'total_score'=>(int)$comment_item['total_score'],
            'driver_comment'=>(string)$comment_item['comment'],
            'question_text'=>(string)$question_item['text']
            );
     }

    $data = array(
		'mechanic_id'=>(int)$userdata['user_id'],
		'name'=>(string)$joininfo['name'],
		'avatar'=>(string)$userdata['avatar'],
		'answer_times'=>(int)$answer_times,
		'stars'=>(int)$joininfo['stars'] ,
		'response_time'=>(int)$joininfo['response_time'] ,
		'reputation'=>(int)$joininfo['reputation'] ,
		'work_year'=>round((time()-$joininfo['work_year'])/31536000,1) ,
		'workbrand'=>(string)$workbrand['brand_name'] ,
		'professional_brand'=>$professional_brand ,
		'professional_field'=>$professional_field ,
		'workcity'=>(string)$workcityname ,
		'workplace'=>(string)$joininfo['workplace'] ,
		'technical_title'=>(string)$joininfo['technical_title'] ,
		'birth_year'=>(int)$joininfo['birth_year'] ,
		'education'=>(string)$joininfo['education'] ,
		'award'=>(string)$joininfo['award'] ,
		'resume'=>(string)$joininfo['resume'] ,
		'favorite_times'=>(int)$favorite_times ,
		'is_favorite'=>$is_favorite?1:0,
		'server'=>$server,
		'comment'=>$comment
		) ;

$res = model('mechanic_view')->add(array(
	'driver_user_id'=>$item['owner_id'] ,
	'mechanic_user_id'=>$userdata['user_id'] ,
	'is_push'=>0,
	'create_time'=>time() ,
	)) ;
if (!$res)
    die_json_msg('view表更新失败',1000);

json_send($data) ;
}
elseif(isset($data['huanxin_id'])){
    //and a.status = 'online'        以后处理
    $select_mechanic_item = "select a.avatar, a.user_id ,a.huanxin_id ,b.name ,b.workbrand from end_mechanic_user as a  INNER JOIN end_mechanic_joininfo as b using(joininfo_id) where a.role = 'mechanic'  and a.huanxin_id = '{$data['huanxin_id']}' ";

    $mechanic_item = model('mechanic_user')->get_one(array('_custom_sql'=>$select_mechanic_item));
    if(!$mechanic_item){
        die_json_msg('不存在此环信号', 10100);
    }
    $professional_field_sql = "select field_name from end_mechanic_field where id in(select field_id from end_mechanic_professional_field where mechanic_id = {$mechanic_item['user_id']})";
    $professional_field_items = model('mechanic_professional_field')->get_list(array('_custom_sql'=>$professional_field_sql));
    if($professional_field_items === null){
        die_json_msg('professional_field表查询失败', 10101);
    }
    $professional_field = array();
    foreach ($professional_field_items as $key => $select_mechanic_id)
    {
        $professional_field[] = $select_mechanic_id['field_name'];

    }
    $is_favorite_item = model('mechanic_favorite')->get_one(array('driver_user_id'=>$item['owner_id'],'mechanic_user_id'=>$mechanic_item['user_id']));
    $is_favorite = 0;
    if($is_favorite_item){
        $is_favorite = 1;
    }
    $send_data =array(
        'mechanic_id'=>(int)$mechanic_item['user_id'],
        'huanxin_id'=>$mechanic_item['huanxin_id'],
        'avatar'=>$mechanic_item['avatar'],
        'name'=>$mechanic_item['name'],
        'is_favourite'=>$is_favorite,
        'professional_field'=>$professional_field
    );
    json_send($send_data);
}