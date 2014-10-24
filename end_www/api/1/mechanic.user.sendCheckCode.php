<?php
/**
 * 发送验证码
 * api 1.1 
 * @author zhanglipeng 2014.10.17
 */
//header("Content-type: text/html; charset=utf-8");
//读取数据
$data = $_POST;
if (!isset($data['phone']) )
 	die_json_msg('参数错误', 10100);
 if(!preg_match("/1[34578]{1}\d{9}$/",$data['phone']))
{
	die_json_msg('参数错误', 10100);
}
//srand((double)microtime()*1000000);//create a random number feed.
//$ychar="0,1,2,3,4,5,6,7,8,9";
//$list=explode(",",$ychar);
//for($i=0;$i<6;$i++){
//    $randnum=rand(0,9); //;
//    $authnum.=$list[$randnum];
//}


function Post($curlPost,$url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    $return_str = curl_exec($curl);
    curl_close($curl);
    return $return_str;
}
function xml_to_array($xml){
    $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
    if(preg_match_all($reg, $xml, $matches)){
        $count = count($matches[0]);
        for($i = 0; $i < $count; $i++){
            $subxml= $matches[2][$i];
            $key = $matches[1][$i];
            if(preg_match( $reg, $subxml )){
                $arr[$key] = xml_to_array( $subxml );
            }else{
                $arr[$key] = $subxml;
            }
        }
    }
    return $arr;
}
function random($length = 6 , $numeric = 0) {
    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
    if($numeric) {
        $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
    } else {
        $hash = '';
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
    }
    return $hash;
}
$target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";

$mobile = $data['phone'];
$mobile_code = random(6,1);

$account = "cf_machinist";
$password = md5("zhuosi2014");


$post_data = "account=$account&password=$password&mobile=".$mobile."&content=".rawurlencode("动态验证码：".$mobile_code."，请完成验证。请不要把验证码泄露给其它人。如非本人操作，请忽略本短信。");
$time_checkcode = time();
$data_checkcode= array('phone'=>$data['phone'],
    'checkcode'=>$mobile_code,
    'createtime'=>$time_checkcode,
    'expires_in'=>$time_checkcode + 600,
    'status'=> 'valid');

//密码可以使用明文密码或使用32位MD5加密
$gets =  xml_to_array(Post($post_data, $target));

if($gets['SubmitResult']['code'] == 2 ){
    $_SESSION['mobile'] = $mobile;
    $_SESSION['mobile_code'] = $mobile_code;
    //echo $gets['SubmitResult']['msg'];

    $sql_str = "update  end_mechanic_user_checkcode set status = 'invalid' where phone = $mobile ";

    $return  = $db->query($sql_str);
    if(! $return) {
        die_json_msg('user_checkcode表更新失败',10101);
    }

    if(!($id=model('mechanic_user_checkcode')->add($data_checkcode))) {
        die_json_msg('user_checkcode表增加失败',10101);
    }
    json_send();

} else {
    die_json_msg($gets['SubmitResult']['msg'], 10102);
}


