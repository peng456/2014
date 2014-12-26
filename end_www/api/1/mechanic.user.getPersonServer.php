<?php
/**
 * 技师获取系统支持的服务
 * API 3.16
 *
 * @author zhanglipeng	2014.12.18
 */
 
$data = $_POST;

if (!isset($data['access_token']))
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

$mechanic_item = model('mechanic_user')->get_one(array('user_id'=>$token['owner_id'],'role'=>'mechanic')) ;
if (!$mechanic_item)
{
	die_json_msg('您没有此权限',10010) ;
}

$select_server_sql = "select s_m.id,s.id as s_id,s_m.price,s.details,s.name from end_mechanic_server as s inner join end_mechanic_server_mechanic as s_m  on s.id = s_m.server_id where s_m.mechanic_id = {$token['owner_id']}  ";
$server_items  =  model('mechanic_server')->get_list(array('_custom_sql'=>$select_server_sql));

$server = array();
foreach ($server_items as $key_server => $server_item)
{
    $type = (int)$server_item['s_id'];
    $count_server_sql = "SELECT AVG(judgescore.total_score) as score_avg FROM end_mechanic_judgescore as judgescore INNER JOIN end_mechanic_question as question using(q_id) WHERE judgescore.mechanic_id = {$token['owner_id']} and question.type = {$type} ";
    $judgescore = model('mechanic_judgescore')->get_one(array('_custom_sql'=>$count_server_sql));

    $buy_server_sql = "select count(d_m_q.id) as buy_count from end_mechanic_driver_mechanic_question as d_m_q INNER JOIN end_mechanic_question as question using(q_id) where d_m_q.mechanic_id = {$token['owner_id']} and question.type = {$type}";
    $buy = model('mechanic_driver_mechanic_question')->get_one(array('_custom_sql'=>$buy_server_sql));
    $server[$key_server]['server_id'] = (int)$server_item['id'];
    $server[$key_server]['server_type'] = (int)$server_item['s_id'];
    $server[$key_server]['server_name'] = (string)$server_item['name'];
    $server[$key_server]['details'] = (string)$server_item['details'];
    $server[$key_server]['price'] = (int)$server_item['price'];
    $server[$key_server]['buy_times'] = (int)$buy['buy_count'];
    $server[$key_server]['driver_judgescore'] = round($judgescore['score_avg'],1);
}
json_send(array('server'=>$server));

