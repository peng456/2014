<?php
/**
 *
 * api
 *
 * @author zhanglipeng 2014.11.27
 */
$data = $_POST;

if (!isset($data['access_token'])||!isset($data['mechanic_id'])||!isset($data['time']))
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
//判断技师 是否  节假日服务
$week = "week".getweek($data['time']);
$availble_time_week = model('mechanic_period')->get_one(array('select'=>$week.",is_readholiday",'mechanic_id'=>(int)$data['mechanic_id']));
if($period['is_readholiday'] == 0)     //不提供
{
    if(isholiday($data['time'])){
        json_send(array("0","0","0","0","0","0","0","0",
                         "0","0","0","0","0","0","0","0",
                         "0","0","0","0","0","0","0","0",
                         "0","0","0","0","0","0","0","0",
                         "0","0","0","0","0","0","0","0",
                         "0","0","0","0","0","0","0","0"));
    }
}

//不可用时间
$date =  (int) ($data['time']/86400);
$time = time();
$inavailble_time    = model('mechanic_period_record')->get_list(array('select'=>'time_period','mechanic_id'=>$data['mechanic_id'],'date'=>$date,'where'=>"status = 1 or  deadline > $time"));

//可用时间   $availble_time  =  $availble_time_week -$inavailble_time
$temp = json_decode($availble_time_week["$week"]);
foreach($inavailble_time as $key=>$value){
    $temp[$value['time_period']] = "0";
}

json_send($temp);


function getWeek($unixTime='')
{

    $unixTime=is_numeric($unixTime)?$unixTime:time();

    $weekarray=array('7','1','2','3','4','5','6');

    return $weekarray[date('w',$unixTime)];

}

function  isholiday($unixTime)
{
    $date = (int)($unixTime/86400);
    $isholiday = model('mechanic_holiday')->get_one(array('date'=>$date));

    if($isholiday){
        return true;
    }else{
        return  false;
    }


}