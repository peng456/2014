<?php

$data = $_POST;

if (!isset($data['access_token']) || !isset($data['platform']) || !isset($data['current_version']))
{
	die_json_msg('parameters error', 10001);
}

//判断accesstoken
$item = model('mechanic_token')->get_one(array('token_type'=>'user',
    'access_token'=>$data['access_token'],
    'status'=>'valid'));

if (!$item){
    die_json_msg('access_token不可用',10600);
}


$data['platform'] = strtolower($data['platform']); #转为小写字母
$appversion = model("mechanic_appversion")->get_one(array('platform'=>$data['platform'], 'version'=>$data['current_version']));
if (!$appversion)
{
	die_json_msg('parameters error: version or platform not exist', 22500);
}

if ((int)$appversion['status'] == 1) #已经是最新版本
{
	json_send(array('update'=>0));
}
else
{
	$new_version = model("mechanic_appversion")->get_one(array('platform'=>$data['platform'], 'status'=>1));
	if (!$new_version)
	{
		die_json_msg('update database error: new version not published',22501);
	}

	json_send(array('update'=>1, 
					  'new_version'=>array('platform'=>$new_version['platform'],
					  					   'version'=>$new_version['version'],
					  					   'update_level'=>$new_version['update_level'],
					  					   'url'=>abs_url($new_version['url']))));
}

function abs_url($url)
{
	if (!$url)	return $url;
	if (strlen($url) == 0)	return $url;
	
	if (strpos($url, 'http://') === 0)
		return $url;
	else
	{
		if (strpos($url, '/') === 0)
			return 'http://'.$_SERVER['SERVER_NAME'].$url;
		else
			return 'http://'.$_SERVER['SERVER_NAME'].'/'.$url;
	}
}
