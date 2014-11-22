<?php
/**
 * Created by JetBrains PhpStorm.
 * User: peng
 * Date: 14-11-4
 * Time: 下午2:41
 * To change this template use File | Settings | File Templates.
 */

//$uri = "https://a1.easemob.com/mechanic/mechanic/token";
//$data = array(
//    'grant_type'=>"client_credentials",
//    'client_id' => 'YXA6_9J0QGPPEeSQf-lSIoaBcA',
//    'client_secret' => 'YXA6PG8db8yZbE7W4kPoX1naEnauiEs',
//);
//$t = json_encode($data);
//
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $uri);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_HEADER,0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	// https请求 不验证证书和hosts
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$t);
//$output = curl_exec($ch);
//$output_array = json_decode($output,true);
//
//var_dump($output_array);

//注册单个用户




//
//
//
//$uri = "https://a1.easemob.com/mechanic/mechanic/users";
//
//
//
//
//$headr = array();
//$headr[] = "Authorization: Bearer  YWMtBOUfPGQCEeSH_LkTk-y8xQAAAUqvDMDXm0QJi4tp97PC2vDISRqjeYGLEyE";
//
//
//
//
//
//
//
//
//
//$data = array(
//    'username'=>"testzhao11",
//    'password' => 'zhao',
//);
//$t = json_encode($data);
//
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $uri);
//curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_HEADER,0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	// https请求 不验证证书和hosts
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$t);
//$output = curl_exec($ch);
//$output_array = json_decode($output,true);
//
//var_dump($output_array);
//
//urlencode($data);
//
////返回     appkey + username +   password
//
////appkey :   mechanic#mechanic
//




//
//$sql = "select * where username= 'testzhao11'";
//
//
//
//$uri = "https://a1.easemob.com/mechanic/mechanic/users?ql=".urlencode($sql);
//
//
//echo  $uri;
//
//$headr = array();
//$headr[] = "Authorization: Bearer  YWMtBOUfPGQCEeSH_LkTk-y8xQAAAUqvDMDXm0QJi4tp97PC2vDISRqjeYGLEyE";
//
//
//
//
//
//
//
//
//
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $uri);
//curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_GET, 1);
//curl_setopt($ch, CURLOPT_HEADER,0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	// https请求 不验证证书和hosts
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
////curl_setopt($ch, CURLOPT_POSTFIELDS,$t);
//$output = curl_exec($ch);
//$output_array = json_decode($output,true);
//
//var_dump($output_array);


//返回     appkey + username +   password

//appkey :   mechanic#mechanic



$sql = "select * where username= 'testzhao'";



$uri = "https://a1.easemob.com/mechanic/mechanic/users?ql=".urlencode($sql);


echo  $uri;

$headr = array();
$headr[] = "Authorization: Bearer  YWMtBOUfPGQCEeSH_LkTk-y8xQAAAUqvDMDXm0QJi4tp97PC2vDISRqjeYGLEyE";

$dir = END_LANGUAGE_DIR;


$ch = curl_init($uri) ;

curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	// https请求 不验证证书和hosts
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
$output = curl_exec($ch) ;
var_dump(json_decode($output));
/* 写入文件 */
//$fh = fopen("out.html", 'w') ;
//fwrite($fh, $output) ;
//fclose($fh) ;



$qq = _curl_request();

?>