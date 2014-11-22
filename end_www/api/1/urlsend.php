<?php
/**
 * Created by JetBrains PhpStorm.
 * User: peng
 * Date: 14-11-3
 * Time: 下午3:19
 * To change this template use File | Settings | File Templates.
 */

//$time = microtime(true);
//echo $time;echo "  ";
//echo $time*1000;
//die();
$array = array('client_id'=>END_HUANXIN_CLIENT_ID,'client_secret'=>END_HUANXIN_CLIENT_SECRET,'org_name'=>END_HUANXIN_ORG_NAME,'app_name'=>END_HUANXIN_APP_NAME);

$ease = new Easemob($array);

$ql = "select * where (from= '182' and to='zhao') or (from= 'zhao' and to='182') and timestamp > 1315877059 and timestamp < 1415877059000 order by timestamp desc ";

$result = $ease->chatRecord(urlencode($ql));

var_dump($result);
die();

//$msr_ids =array();
//foreach($result['list'] as $key=>$value){
//     array_push($msr_ids,$value[0]);
//}
//var_dump(implode(",",$msr_ids));



//$res = json_decode($result);
//var_dump($res['list']);
die();