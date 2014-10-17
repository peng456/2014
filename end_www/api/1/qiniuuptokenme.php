<?php
set_time_limit(0);

//include_once($_SERVER['DOCUMENT_ROOT']."/mechanicvpstest/qiniu/rs.php");

$bucket = 'machinist';
$accessKey = 'st_XjWAVENJCjDDWOYfMpxB3YtOo4Dt4g4kmyxhQ';
$secretKey = '7TgfT33PFOoxKgQ7nlNY8ovFoHcek3pjMfjBMgqA';




Qiniu_SetKeys($accessKey, $secretKey);
$putPolicy = new Qiniu_RS_PutPolicy($bucket);

//$putPolicy->CallbackUrl = 'http://104.200.25.32/mechanicvpstest/api.php?p=qiniucallback';

//$putPolicy->CallbackBody = 'key=$(key)&fname=$(fname)&fsize=$(fsize)&mimeType=$(mimeType)&persistentId=$(persistentId)&bucket=$(bucket)';




$upToken = $putPolicy->Token(null);
$putExtra = new Qiniu_PutExtra();
$putExtra->Crc32 = 1;



echo  $upToken;
die();




$key1 = "zhuosi2014".rand(0,1000);
$file = "D:\asd.mp3";
list($ret, $err) = Qiniu_PutFile($upToken, $key1, $file, $putExtra);
echo "====> Qiniu_PutFile result: \n";
if ($err !== null) {
    var_dump($err);
} else {
    var_dump($ret);
}

//echo $upToken;

die();
?>