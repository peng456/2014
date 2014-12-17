<?php

// 接收提交到服务器端的json数据 
function json_receive()
{
	$raw_data = file_get_contents("php://input");
	$data = json_decode($raw_data, true);
	if ($data)
	{
		return $data;
	}
	else
	{
		die_json_msg("post json data error", 10000);
	}
}

// 服务器发送json数据给客户端
function json_send($data=array())
{
	$data = array("ret"=>0, // 0代表成功，其他数字代表失败
		  		  "msg"=>$data);
	$php_ver = (int)substr(PHP_VERSION, 2,1);
	if ($php_ver >= 4)
		$json_data = json_encode($data, JSON_PRETTY_PRINT);
	else
		$json_data = json_encode($data);
	if ($json_data)
	{
		echo $json_data;
	}
	else
	{
		echo json_encode(array("ret"=>10000,
						  	   "msg"=>"json encode error"));
	}
	die();
}

// 服务器发送json数据给客户端
function die_json_msg($message, $error_code=10000)
{
	$json_data =  json_encode(array("ret"=>$error_code,
									"msg"=>$message));
	if ($json_data)
	{
		echo $json_data;
	}
	else
	{
		echo json_encode(array("ret"=>10000,
							   "msg"=>"json encode error"));
	}
	die();


}

// 常规加盐哈希函数
function hash_normal($factor)
{
	$salt = 'fenhe@dreamgram1.0';
	$raw_str = $factor.$salt;
	return sha1(sha1($raw_str));
}

// 随机哈希函数
function hash_random($factor, $hashfunc='sha256')
{
	$salt = '+_)(*&^%$#@!~';
	$raw_str = $factor.time().$salt.rand(2013,65535);
	return hash($hashfunc,$raw_str);
}

// php post 提交数据，返回结果
function do_post_request($url, $data, $method, $optional_headers = null)
{
	$params = array('http' => array(
	             'method' => $method,//'POST',
	          	 'content' => $data
	       ));
	if ($optional_headers !== null) {
	$params['http']['header'] = $optional_headers;
	}
	$ctx = stream_context_create($params);
	$fp = @fopen($url, 'rb', false, $ctx);
	if (!$fp) {
	throw new Exception("Problem with $url, $php_errormsg");
	}
	$response = @stream_get_contents($fp);
	if ($response === false) {
	throw new Exception("Problem reading data from $url, $php_errormsg");
	}
	return $response;
}

// 用户认证函数
function auth_user($data)
{
	if (!isset($data['access_token']))
	{
		die_json_msg('parameter invalid', 10100);
	}

	$item = model('vanet_token')->get_one(array('token_type'=>'user', 
											   'access_token'=>$data['access_token'],
											   'status'=>'valid'));
	if (!$item)
	{
		die_json_msg('parameter value error: access token invalid', 10101);
	}
	return $item;
}

// array数据键筛选
function array_key_filter($data, $keys)
{
	$ret_data = array();
	foreach ($keys as $key)
	{
		if (isset($data[$key]))
			$ret_data[$key] = $data[$key];
	}
	return $ret_data;
}


// 获取查询条目总数
function get_query_item_count($query)
{
	global $db;
	#var_dump($query);
	$query = $db->query($query);
	$count = $db->fetch_array($query);
	#var_dump($count);
	if ($count === false)
		return 0;
	else
		return current($count);
}


/**
 * 环信-服务器端REST API
 * @author    limx <limx@xiaoneimimi.com>
 */
class Easemob {
    private $client_id;
    private $client_secret;
    private $org_name;
    private $app_name;
    private $url;

    /**
     * 初始化参数
     *
     * @param array $options
     * @param $options['client_id']
     * @param $options['client_secret']
     * @param $options['org_name']
     * @param $options['app_name']
     */
    public function __construct($options) {
        $this->client_id = isset ( $options ['client_id'] ) ? $options ['client_id'] : '';
        $this->client_secret = isset ( $options ['client_secret'] ) ? $options ['client_secret'] : '';
        $this->org_name = isset ( $options ['org_name'] ) ? $options ['org_name'] : '';
        $this->app_name = isset ( $options ['app_name'] ) ? $options ['app_name'] : '';
        if (! empty ( $this->org_name ) && ! empty ( $this->app_name )) {
            $this->url = 'https://a1.easemob.com/' . $this->org_name . '/' . $this->app_name . '/';
        }
    }
    /**
     * 开放注册模式
     *
     * @param $options['username'] 用户名
     * @param $options['password'] 密码
     */
    public function openRegister($options) {
        $url = $this->url . "users";
        $result = $this->postCurl ( $url, $options, $head = 0 );
        return $result;
    }

    /**
     * 授权注册模式 || 批量注册
     *
     * @param $options['username'] 用户名
     * @param $options['password'] 密码
     *        	批量注册传二维数组
     */
    public function accreditRegister($options) {
        $url = $this->url . "users";
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, $options, $header );
        return $result;
    }

    /**
     * 获取指定用户详情
     *
     * @param $username 用户名
     */
    public function userDetails($username) {
        $url = $this->url . "users/" . $username;
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = 'GET' );
        return $result;
    }

    /**
     * 重置用户密码
     *
     * @param $options['username'] 用户名
     * @param $options['password'] 密码
     * @param $options['newpassword'] 新密码
     */
    public function editPassword($options) {
        $url = $this->url . "users/" . $options ['username'] . "/password";
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, $options, $header, $type = 'PUT');
        return $result;
    }
    /**
     * 删除用户
     *
     * @param $username 用户名
     */
    public function deleteUser($username) {
        $url = $this->url . "users/" . $username;
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = 'DELETE' );
    }

    /**
     * 批量删除用户
     * 描述：删除某个app下指定数量的环信账号。上述url可一次删除300个用户,数值可以修改 建议这个数值在100-500之间，不要过大
     *
     * @param $limit="300" 默认为300条
     * @param $ql 删除条件
     *        	如ql=order+by+created+desc 按照创建时间来排序(降序)
     */
    public function batchDeleteUser($limit = "300", $ql = '') {
        $url = $this->url . "users?limit=" . $limit;
        if (! empty ( $ql )) {
            $url = $this->url . "users?ql=" . $ql . "&limit=" . $limit;
        }
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = 'DELETE' );
    }

    /**
     * 给一个用户添加一个好友
     *
     * @param
     *        	$owner_username
     * @param
     *        	$friend_username
     */
    public function addFriend($owner_username, $friend_username) {
        $url = $this->url . "users/" . $owner_username . "/contacts/users/" . $friend_username;
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header );
    }
    /**
     * 删除好友
     *
     * @param
     *        	$owner_username
     * @param
     *        	$friend_username
     */
    public function deleteFriend($owner_username, $friend_username) {
        $url = $this->url . "users/" . $owner_username . "/contacts/users/" . $friend_username;
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "DELETE" );
    }
    /**
     * 查看用户的好友
     *
     * @param
     *        	$owner_username
     */
    public function showFriend($owner_username) {
        $url = $this->url . "users/" . $owner_username . "/contacts/users/";
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "GET" );
    }
    // +----------------------------------------------------------------------
    // | 聊天相关的方法
    // +----------------------------------------------------------------------
    /**
     * 查看用户是否在线
     *
     * @param
     *        	$username
     */
    public function isOnline($username) {
        $url = $this->url . "users/" . $username . "/status";
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "GET" );
        return $result;
    }
    public function  getUserOnline( $status) {

        // $ql = "select * where activated=  $status ";
        $ql = "select * where username=  kele ";
        $url = $this->url . "users?ql=" .urlencode($ql);
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "GET" );
        return $result;
    }

    /**
     * 发送消息
     *
     * @param string $from_user
     *        	发送方用户名
     * @param array $username
     *        	array('1','2')
     * @param string $target_type
     *        	默认为：users 描述：给一个或者多个用户(users)或者群组发送消息(chatgroups)
     * @param string $content
     * @param array $ext
     *        	自定义参数
     */
    function yy_hxSend($from_user = "admin", $username, $content, $target_type = "users", $ext) {
        $option ['target_type'] = $target_type;
        $option ['target'] = $username;
        $params ['type'] = "txt";
        $params ['msg'] = $content;
        $option ['msg'] = $params;
        $option ['from'] = $from_user;
        $option ['ext'] = $ext;
        $url = $this->url . "messages";
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, $option, $header );
        return $result;
    }
    /**
     * 获取app中所有的群组
     */
    public function chatGroups() {
        $url = $this->url . "chatgroups";
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "GET" );
        return $result;
    }
    /**
     * 创建群组
     *
     * @param $option['groupname'] //群组名称,
     *        	此属性为必须的
     * @param $option['desc'] //群组描述,
     *        	此属性为必须的
     * @param $option['public'] //是否是公开群,
     *        	此属性为必须的 true or false
     * @param $option['approval'] //加入公开群是否需要批准,
     *        	没有这个属性的话默认是true, 此属性为可选的
     * @param $option['owner'] //群组的管理员,
     *        	此属性为必须的
     * @param $option['members'] //群组成员,此属性为可选的
     */
    public function createGroups($option) {
        $url = $this->url . "chatgroups";
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, $option, $header );
        return $result;
    }
    /**
     * 获取群组详情
     *
     * @param
     *        	$group_id
     */
    public function chatGroupsDetails($group_id) {
        $url = $this->url . "chatgroups/" . $group_id;
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "GET" );
        return $result;
    }
    /**
     * 删除群组
     *
     * @param
     *        	$group_id
     */
    public function deleteGroups($group_id) {
        $url = $this->url . "chatgroups/" . $group_id;
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "DELETE" );
        return $result;
    }
    /**
     * 获取群组成员
     *
     * @param
     *        	$group_id
     */
    public function groupsUser($group_id) {
        $url = $this->url . "chatgroups/" . $group_id . "/users";
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "GET" );
        return $result;
    }
    /**
     * 群组添加成员
     *
     * @param
     *        	$group_id
     * @param
     *        	$username
     */
    public function addGroupsUser($group_id, $username) {
        $url = $this->url . "chatgroups/" . $group_id . "/users/" . $username;
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "POST" );
        return $result;
    }
    /**
     * 群组删除成员
     *
     * @param
     *        	$group_id
     * @param
     *        	$username
     */

    public function delGroupsUser($group_id, $username) {
        $url = $this->url . "chatgroups/" . $group_id . "/users";
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "DELETE" );
        return $result;
    }
    /**
     * 聊天消息记录
     *
     * @param $ql 查询条件如：$ql
     *        	= "select+*+where+from='" . $uid . "'+or+to='". $uid ."'+order+by+timestamp+desc&limit=" . $limit . $cursor;
     *        	默认为order by timestamp desc
     * @param $cursor 分页参数
     *        	默认为空
     * @param $limit 条数
     *        	默认20
     */
    public function chatRecord($ql = '', $cursor = '', $limit = 500) {
        $ql = ! empty ( $ql ) ? "ql=" . $ql : "order+by+timestamp+desc";
        $cursor = ! empty ( $cursor ) ? "&cursor=" . $cursor : '';
        $url = $this->url . "chatmessages?" . $ql . "&limit=" . $limit . $cursor;
        $access_token = $this->getToken ();
        $header [] = 'Authorization: Bearer ' . $access_token;
        $result = $this->postCurl ( $url, '', $header, $type = "GET " );
        return $result;
    }
    /**
     * 获取Token
     */
    public function getToken() {
        $option ['grant_type'] = "client_credentials";
        $option ['client_id'] = $this->client_id;
        $option ['client_secret'] = $this->client_secret;
        $url = $this->url . "token";
        $fp = @fopen ( "easemob.txt", 'r' );
        if ($fp) {
            $arr = unserialize ( fgets ( $fp ) );
            if ($arr ['expires_in'] < time ()) {
                $result = $this->postCurl ( $url, $option, $head = 0 );
                $result ['expires_in'] = $result ['expires_in'] + time ();
                @fwrite ( $fp, serialize ( $result ) );
                return $result ['access_token'];
                fclose ( $fp );
                exit ();
            }
            return $arr ['access_token'];
            fclose ( $fp );
            exit ();
        }
        $result = $this->postCurl ( $url, $option, $head = 0 );
        $result ['expires_in'] = $result ['expires_in'] + time ();
        $fp = @fopen ( "easemob.txt", 'w' );
        @fwrite ( $fp, serialize ( $result ) );
        return $result ['access_token'];
        fclose ( $fp );
    }

    /**
     * CURL Post
     */
    private function postCurl($url, $option, $header = 0, $type = 'POST') {
        $curl = curl_init (); // 启动一个CURL会话
        curl_setopt ( $curl, CURLOPT_URL, $url ); // 要访问的地址
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE ); // 对认证证书来源的检查
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, FALSE ); // 从证书中检查SSL加密算法是否存在
        curl_setopt ( $curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)' ); // 模拟用户使用的浏览器
        if (! empty ( $option )) {
            $options = json_encode ( $option );
            curl_setopt ( $curl, CURLOPT_POSTFIELDS, $options ); // Post提交的数据包
        }
        curl_setopt ( $curl, CURLOPT_TIMEOUT, 30 ); // 设置超时限制防止死循环
        curl_setopt ( $curl, CURLOPT_HTTPHEADER, $header ); // 设置HTTP头
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 ); // 获取的信息以文件流的形式返回
        curl_setopt ( $curl, CURLOPT_CUSTOMREQUEST, $type );
        $result = curl_exec ( $curl ); // 执行操作
        $res = object_array ( json_decode ( $result ) );
        $res ['status'] = curl_getinfo ( $curl, CURLINFO_HTTP_CODE );
        //   pre ( $res );
        return $res;
        curl_close ( $curl ); // 关闭CURL会话
    }
}


//PHP stdClass Object转array
function object_array($array) {
    if(is_object($array)) {
        $array = (array)$array;
    } if(is_array($array)) {
        foreach($array as $key=>$value) {
            $array[$key] = object_array($value);
        }
    }
    return $array;
}

/**
 * 定义 Helper_Array 类
 *
 * @link http://qeephp.com/
 * @copyright Copyright (c) 2006-2009 Qeeyuan Inc. {@link http://www.qeeyuan.com}
 * @license New BSD License {@link http://qeephp.com/license/}
 * @version $Id: array.php 1937 2009-01-05 19:09:40Z dualface $
 * @package helper
 */

/**
 * Helper_Array 类提供了一组简化数组操作的方法
 *
 * @author YuLei Liao <liaoyulei@qeeyuan.com>
 * @version $Id: array.php 1937 2009-01-05 19:09:40Z dualface $
 * @package helper
 */
abstract class ArrayHelper
{
    /**
     * 从数组中删除空白的元素（包括只有空白字符的元素）
     *
     * 用法：
     * @code php
     * $arr = array('', 'test', '   ');
     * Helper_Array::removeEmpty($arr);
     *
     * dump($arr);
     *   // 输出结果中将只有 'test'
     * @endcode
     *
     * @param array $arr 要处理的数组
     * @param boolean $trim 是否对数组元素调用 trim 函数
     */
    static function removeEmpty(& $arr, $trim = true)
    {
        foreach ($arr as $key => $value)
        {
            if (is_array($value))
            {
                self::removeEmpty($arr[$key]);
            }
            else
            {
                $value = trim($value);
                if ($value == '')
                {
                    unset($arr[$key]);
                }
                elseif ($trim)
                {
                    $arr[$key] = $value;
                }
            }
        }
    }

    /**
     * 从一个二维数组中返回指定键的所有值
     *
     * 用法：
     * @code php
     * $rows = array(
     *     array('id' => 1, 'value' => '1-1'),
     *     array('id' => 2, 'value' => '2-1'),
     * );
     * $values = Helper_Array::cols($rows, 'value');
     *
     * dump($values);
     *   // 输出结果为
     *   // array(
     *   //   '1-1',
     *   //   '2-1',
     *   // )
     * @endcode
     *
     * @param array $arr 数据源
     * @param string $col 要查询的键
     *
     * @return array 包含指定键所有值的数组
     */
    static function getCols($arr, $col)
    {
        $ret = array();
        foreach ($arr as $row)
        {
            if (isset($row[$col])) { $ret[] = $row[$col]; }
        }
        return $ret;
    }

    /**
     * 将一个二维数组转换为 HashMap，并返回结果
     *
     * 用法1：
     * @code php
     * $rows = array(
     *     array('id' => 1, 'value' => '1-1'),
     *     array('id' => 2, 'value' => '2-1'),
     * );
     * $hashmap = Helper_Array::hashMap($rows, 'id', 'value');
     *
     * dump($hashmap);
     *   // 输出结果为
     *   // array(
     *   //   1 => '1-1',
     *   //   2 => '2-1',
     *   // )
     * @endcode
     *
     * 如果省略 $value_field 参数，则转换结果每一项为包含该项所有数据的数组。
     *
     * 用法2：
     * @code php
     * $rows = array(
     *     array('id' => 1, 'value' => '1-1'),
     *     array('id' => 2, 'value' => '2-1'),
     * );
     * $hashmap = Helper_Array::hashMap($rows, 'id');
     *
     * dump($hashmap);
     *   // 输出结果为
     *   // array(
     *   //   1 => array('id' => 1, 'value' => '1-1'),
     *   //   2 => array('id' => 2, 'value' => '2-1'),
     *   // )
     * @endcode
     *
     * @param array $arr 数据源
     * @param string $key_field 按照什么键的值进行转换
     * @param string $value_field 对应的键值
     *
     * @return array 转换后的 HashMap 样式数组
     */
    static function toHashmap($arr, $key_field, $value_field = null)
    {
        $ret = array();
        if ($value_field)
        {
            foreach ($arr as $row)
            {
                $ret[$row[$key_field]] = $row[$value_field];
            }
        }
        else
        {
            foreach ($arr as $row)
            {
                $ret[$row[$key_field]] = $row;
            }
        }
        return $ret;
    }

    /**
     * 将一个二维数组按照指定字段的值分组
     *
     * 用法：
     * @code php
     * $rows = array(
     *     array('id' => 1, 'value' => '1-1', 'parent' => 1),
     *     array('id' => 2, 'value' => '2-1', 'parent' => 1),
     *     array('id' => 3, 'value' => '3-1', 'parent' => 1),
     *     array('id' => 4, 'value' => '4-1', 'parent' => 2),
     *     array('id' => 5, 'value' => '5-1', 'parent' => 2),
     *     array('id' => 6, 'value' => '6-1', 'parent' => 3),
     * );
     * $values = Helper_Array::groupBy($rows, 'parent');
     *
     * dump($values);
     *   // 按照 parent 分组的输出结果为
     *   // array(
     *   //   1 => array(
     *   //        array('id' => 1, 'value' => '1-1', 'parent' => 1),
     *   //        array('id' => 2, 'value' => '2-1', 'parent' => 1),
     *   //        array('id' => 3, 'value' => '3-1', 'parent' => 1),
     *   //   ),
     *   //   2 => array(
     *   //        array('id' => 4, 'value' => '4-1', 'parent' => 2),
     *   //        array('id' => 5, 'value' => '5-1', 'parent' => 2),
     *   //   ),
     *   //   3 => array(
     *   //        array('id' => 6, 'value' => '6-1', 'parent' => 3),
     *   //   ),
     *   // )
     * @endcode
     *
     * @param array $arr 数据源
     * @param string $key_field 作为分组依据的键名
     *
     * @return array 分组后的结果
     */
    static function groupBy($arr, $key_field)
    {
        $ret = array();
        foreach ($arr as $row)
        {
            $key = $row[$key_field];
            $ret[$key][] = $row;
        }
        return $ret;
    }

    /**
     * 将一个平面的二维数组按照指定的字段转换为树状结构
     *
     * 用法：
     * @code php
     * $rows = array(
     *     array('id' => 1, 'value' => '1-1', 'parent' => 0),
     *     array('id' => 2, 'value' => '2-1', 'parent' => 0),
     *     array('id' => 3, 'value' => '3-1', 'parent' => 0),
     *
     *     array('id' => 7, 'value' => '2-1-1', 'parent' => 2),
     *     array('id' => 8, 'value' => '2-1-2', 'parent' => 2),
     *     array('id' => 9, 'value' => '3-1-1', 'parent' => 3),
     *     array('id' => 10, 'value' => '3-1-1-1', 'parent' => 9),
     * );
     *
     * $tree = Helper_Array::tree($rows, 'id', 'parent', 'nodes');
     *
     * dump($tree);
     *   // 输出结果为：
     *   // array(
     *   //   array('id' => 1, ..., 'nodes' => array()),
     *   //   array('id' => 2, ..., 'nodes' => array(
     *   //        array(..., 'parent' => 2, 'nodes' => array()),
     *   //        array(..., 'parent' => 2, 'nodes' => array()),
     *   //   ),
     *   //   array('id' => 3, ..., 'nodes' => array(
     *   //        array('id' => 9, ..., 'parent' => 3, 'nodes' => array(
     *   //             array(..., , 'parent' => 9, 'nodes' => array(),
     *   //        ),
     *   //   ),
     *   // )
     * @endcode
     *
     * 如果要获得任意节点为根的子树，可以使用 $refs 参数：
     * @code php
     * $refs = null;
     * $tree = Helper_Array::tree($rows, 'id', 'parent', 'nodes', $refs);
     *
     * // 输出 id 为 3 的节点及其所有子节点
     * $id = 3;
     * dump($refs[$id]);
     * @endcode
     *
     * @param array $arr 数据源
     * @param string $key_node_id 节点ID字段名
     * @param string $key_parent_id 节点父ID字段名
     * @param string $key_childrens 保存子节点的字段名
     * @param boolean $refs 是否在返回结果中包含节点引用
     *
     * return array 树形结构的数组
     */
    static function toTree($arr, $key_node_id, $key_parent_id = 'parent_id',
                           $key_childrens = 'childrens', & $refs = null)
    {
        $refs = array();
        foreach ($arr as $offset => $row)
        {
            $arr[$offset][$key_childrens] = array();
            $refs[$row[$key_node_id]] =& $arr[$offset];
        }

        $tree = array();
        foreach ($arr as $offset => $row)
        {
            $parent_id = $row[$key_parent_id];
            if ($parent_id)
            {
                if (!isset($refs[$parent_id]))
                {
                    $tree[] =& $arr[$offset];
                    continue;
                }
                $parent =& $refs[$parent_id];
                $parent[$key_childrens][] =& $arr[$offset];
            }
            else
            {
                $tree[] =& $arr[$offset];
            }
        }

        return $tree;
    }

    /**
     * 将树形数组展开为平面的数组
     *
     * 这个方法是 tree() 方法的逆向操作。
     *
     * @param array $tree 树形数组
     * @param string $key_childrens 包含子节点的键名
     *
     * @return array 展开后的数组
     */
    static function treeToArray($tree, $key_childrens = 'childrens')
    {
        $ret = array();
        if (isset($tree[$key_childrens]) && is_array($tree[$key_childrens]))
        {
            foreach ($tree[$key_childrens] as $child)
            {
                $ret = array_merge($ret, self::treeToArray($child, $key_childrens));
            }
            unset($tree[$key_childrens]);
            $ret[] = $tree;
        }
        else
        {
            $ret[] = $tree;
        }
        return $ret;
    }

    /**
     * 根据指定的键对数组排序
     *
     * 用法：
     * @code php
     * $rows = array(
     *     array('id' => 1, 'value' => '1-1', 'parent' => 1),
     *     array('id' => 2, 'value' => '2-1', 'parent' => 1),
     *     array('id' => 3, 'value' => '3-1', 'parent' => 1),
     *     array('id' => 4, 'value' => '4-1', 'parent' => 2),
     *     array('id' => 5, 'value' => '5-1', 'parent' => 2),
     *     array('id' => 6, 'value' => '6-1', 'parent' => 3),
     * );
     *
     * $rows = Helper_Array::sortByCol($rows, 'id', SORT_DESC);
     * dump($rows);
     * // 输出结果为：
     * // array(
     * //   array('id' => 6, 'value' => '6-1', 'parent' => 3),
     * //   array('id' => 5, 'value' => '5-1', 'parent' => 2),
     * //   array('id' => 4, 'value' => '4-1', 'parent' => 2),
     * //   array('id' => 3, 'value' => '3-1', 'parent' => 1),
     * //   array('id' => 2, 'value' => '2-1', 'parent' => 1),
     * //   array('id' => 1, 'value' => '1-1', 'parent' => 1),
     * // )
     * @endcode
     *
     * @param array $array 要排序的数组
     * @param string $keyname 排序的键
     * @param int $dir 排序方向
     *
     * @return array 排序后的数组
     */
    static function sortByCol($array, $keyname, $dir = SORT_ASC)
    {
        return self::sortByMultiCols($array, array($keyname => $dir));
    }

    /**
     * 将一个二维数组按照多个列进行排序，类似 SQL 语句中的 ORDER BY
     *
     * 用法：
     * @code php
     * $rows = Helper_Array::sortByMultiCols($rows, array(
     *     'parent' => SORT_ASC,
     *     'name' => SORT_DESC,
     * ));
     * @endcode
     *
     * @param array $rowset 要排序的数组
     * @param array $args 排序的键
     *
     * @return array 排序后的数组
     */
    static function sortByMultiCols($rowset, $args)
    {
        $sortArray = array();
        $sortRule = '';
        foreach ($args as $sortField => $sortDir)
        {
            foreach ($rowset as $offset => $row)
            {
                $sortArray[$sortField][$offset] = $row[$sortField];
            }
            $sortRule .= '$sortArray[\'' . $sortField . '\'], ' . $sortDir . ', ';
        }
        if (empty($sortArray) || empty($sortRule)) { return $rowset; }
        eval('array_multisort(' . $sortRule . '$rowset);');
        return $rowset;
    }
}


//require_once $_SERVER['DOCUMENT_ROOT']."/mechanictest/vendor/autoload.php";
//
//use JPush\Model as M;
//use JPush\JPushClient;
//use JPush\JPushLog;
//use Monolog\Logger;
//use Monolog\Handler\StreamHandler;
//
//use JPush\Exception\APIConnectionException;
//use JPush\Exception\APIRequestException;
//
//class Jpushdemo {
//    private  $master_secret;
//    private  $app_key;
//    public  $client;
//
//    public function __construct($app_key,$master_secret) {
//         JPushLog::setLogHandlers(array(new StreamHandler('jpush.log', Logger::DEBUG)));
//         $this->app_key = $app_key;
//         $this->master_secret = $master_secret;
//         $this->client = new JPushClient($app_key,$master_secret);;
//
//     }
//
//      /**
//       * 发送到指定jpusd_ids 指定 相关问题信息
//       *
//       * @param $jpusd_ids 用户极光ID
//       * @param $username 用户名
//       * @param $username 用户名
//       */
// //   public function sendMessageById($jpusd_ids,$notification,$msg_content) {
//    public function sendMessageById($regis_ids,$notification,$msg_content) {
//        try {
//        $result = $this->client->push()
//                   ->setPlatform(M\all)
//                   ->setAudience($regis_ids)
//             //      ->setMessage($regis_ids)
//                   ->setNotification(M\notification($notification))
//             //      ->setOptions($msg_content)
//                   ->send();
//
//        return $result;
//
//        } catch (APIRequestException $e) {
//            echo 'Push Fail.';
//            echo 'Http Code : ' . $e->httpCode ."  ";
//            echo 'code : ' . $e->code ."  ";
//            echo 'Error Message : ' . $e->message . "  ";
//            echo 'Response JSON : ' . $e->json . "  ";
//            echo 'rateLimitLimit : ' . $e->rateLimitLimit . "  ";
//            echo 'rateLimitRemaining : ' . $e->rateLimitRemaining . "  ";
//            echo 'rateLimitReset : ' . $e->rateLimitReset . "  ";
//        } catch (APIConnectionException $e) {
//            echo 'Push Fail: ' . "  ";
//            echo 'Error Message: ' . $e->getMessage() .  "  ";
//            //response timeout means your request has probably be received by JPUsh Server,please check that whether need to be pushed again.
//            echo 'IsResponseTimeout: ' . $e->isResponseTimeout .  "  ";
//        }
//
//    }
//
//}


