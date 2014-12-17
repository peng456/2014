<?php
/**
 * 获取该问题已查看的技师数量
 * API 2.10
 *
 * @author duyifan 2014.10.18
 */
require_once  $_SERVER['DOCUMENT_ROOT']."/mechanic/vendor/autoload.php";
//require_once  $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use JPush\Model as M;
use JPush\JPushClient;
use JPush\JPushLog;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use JPush\Exception\APIConnectionException;
use JPush\Exception\APIRequestException;



$data = $_POST;

if (!isset($data['access_token']) ||!isset($data['q_id']) || !is_numeric($data['q_id']))
{
    die_json_msg('参数错误', 10100);
}

$item = model('mechanic_token')->get_one(array('token_type'=>'user',
    'access_token'=>$data['access_token'],
    'status'=>'valid'));

if (!$item)
    die_json_msg('access_token不可用',10600);

$q_data = model('mechanic_question')->get_one(array('q_id'=>$data['q_id']));
if (!$q_data )
    die_json_msg('问题id无效',20600);
$status = 0;
$accept = model('mechanic_accept')->get_one(array('q_id'=>$data['q_id'])) ;
if($accept && ($q_data['q_satus'] == 0) )
{
    $status = 1;
}
if ($status == 1)
{
    $res = model('mechanic_question')->update($data['q_id'],array('q_status'=>1 )) ;
    if (!$res)
        die_json_msg('question表更新q_status失败',10101);
}

$master_secret = 'e556f96cd4b2bf267f4192ea';
$app_key='91360bada1db676c043111a0';

JPushLog::setLogHandlers(array(new StreamHandler($_SERVER['DOCUMENT_ROOT'].'/mechanic/log/jpush.log', Logger::DEBUG)));
$client = new JPushClient($app_key,$master_secret);
   try{
       $result = $client->report($q_data['msg_id']);
       }catch (APIRequestException $e) {
              die_json_msg('服务器内部错误', 10101);
       } catch (APIConnectionException $e) {
              die_json_msg('服务器比较繁忙，请稍后再试', 10101);
     }

$count = 0;
foreach($result->received_list as  $rece_item) {
    $count =  (int)$rece_item->android_received + (int)$rece_item->ios_apns_sent + (int)$rece_item->wp_mpns_sent;
}

$qusetion_msg_id = model('mechanic_question')->update($data['q_id'],array('view_count'=>$count));
if(!$qusetion_msg_id){
    die_json_msg('question表更新失败', 10101);
}
json_send(array('view_count'=>(int)$count,'status'=>$status) ) ;





//
//$data = $_POST;
//
//if (!isset($data['access_token']) ||!isset($data['q_id']) || !is_numeric($data['q_id']))
//{
//	die_json_msg('参数错误', 10100);
//}
//
//$item = model('mechanic_token')->get_one(array('token_type'=>'user',
//                                            'access_token'=>$data['access_token'],
//                                            'status'=>'valid'));
//
//if (!$item)
//    die_json_msg('access_token不可用',10600);
//
//$q_data = model('mechanic_question')->get_one(array('q_id'=>$data['q_id']) ) ;
//if (!$q_data )
//    die_json_msg('问题id无效',20600);
//$status = 0;
//$accept = model('mechanic_accept')->get_one(array('q_id'=>$data['q_id'],'is_push'=>0) ) ;
//if($accept)
//{
//    $status = 1;
//}
//if ($status == 1 && $data['status'] == 0)
//{
//	$res = model('mechanic_question')->update($data['q_id'],array('q_status'=>1 )) ;
//	if (!$res)
//    	die_json_msg('question表更新q_status失败',10101);
//}
//json_send(array('view_count'=>(int)$q_data['view_count'],'status'=>$status) ) ;