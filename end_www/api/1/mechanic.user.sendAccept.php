<?php
/**
 * 提交技师回答意向
 * API 3.8
 *
 * @author liudanking	2013.08.09
 */
 
$data = $_POST;

if (!isset($data['access_token']) || !isset($data['q_id']) || !is_numeric($data['q_id']))
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
$now_time = time();
$accept_item  = model('mechanic_accept')->set(array('q_id'=>(int)$data['q_id'],'mechanic_user_id'=>(int)$token['owner_id'],'create_time'=>$now_time,'is_push'=>0),array('q_id'=>(int)$data['q_id'],'mechanic_user_id'=>(int)$token['owner_id']));

if (!$accept_item)
{
    die_json_msg('accept表增加失败', 10100);
}


////快速提问用 未测试
//$select_qdata = model('mechanic_question')->get_one(array('q_id'=>$data['q_id'])) ;
//if (!$select_qdata){
//    die_json_msg('question表获取信息失败',10101);
//}
//
//$accept_count = model('mechanic_accept')->get_list(array('q_id'=>$data['q_id'],'is_push'=>0));
//if ($select_qdata['type'] == 0 && count($accept_count) == 9)
//{
//    //此处修改选择代码
//    $mechanic_data = $db->get_list("SELECT * FROM end_mechanic_accept WHERE q_id = $select_qdata[q_id] ORDER BY create_time LIMIT 0,1 ") ;
//    $res = model('mechanic_question')->update($select_qdata['q_id'],array('is_accept'=>1)) ;
//    if (!$mechanic_data || !$res)
//        die_json_msg('accept表查询或question更新失败',10101);
//
//    foreach ($mechanic_data as $key => $value)
//    {
//        $question_mechanic_item = model('mechanic_question_mechanic')->set(array('q_id'=>$value['q_id'],'mechanic_user_id'=>$value['mechanic_user_id'],'status'=>0),array('q_id'=>$value['q_id'],'mechanic_user_id'=>$value['mechanic_user_id'])) ;
//        if (!$question_mechanic_item)
//            die_json_msg('question_mechanic表增加失败',10003);
//    }
//}
//
//if ($select_qdata['q_status'] == 1)
//{
//	$question_update = model('mechanic_question')->update((int)$data['q_id'],array('q_status'=>2 )) ;
//	if (!$question_update){
//        die_json_msg('question表更新q_status失败',10101);
//    }
//}
//
//
//
////update joininfo table  accept_count、response_time
//
//$user = model('mechanic_user')->get_one((int)$token['owner_id']);
//$question_time = model('mechanic_question')->get_one($data['q_id']);
//$now_response = (int)$now_time - (int)$question_time['create_time'];
//
//$custom_sql = "update  end_mechanic_joininfo as tab2 inner join(select joininfo_id,accept_count,response_time from end_mechanic_joininfo WHERE joininfo_id = 3 ) as tab1 using(joininfo_id) set tab2.accept_count = (tab1.accept_count+1),
//                tab2.response_time = (tab1.accept_count*tab1.response_time+ $now_response)/(tab1.accept_count +1) ;";
//$joininfo_update = model('mechanic_joininfo')->get_one(array('_custom_sql'=>$custom_sql));
//
//if(!$joininfo_update){
//    die_json_msg('joininfo表更新失败',10101);
//}

json_send(array());

