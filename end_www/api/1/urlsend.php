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

// $Id: array.php 1937 2009-01-05 19:09:40Z dualface $

///**
// * 定义 Helper_Array 类
// *
// * @link http://qeephp.com/
// * @copyright Copyright (c) 2006-2009 Qeeyuan Inc. {@link http://www.qeeyuan.com}
// * @license New BSD License {@link http://qeephp.com/license/}
// * @version $Id: array.php 1937 2009-01-05 19:09:40Z dualface $
// * @package helper
// */
//
///**
// * Helper_Array 类提供了一组简化数组操作的方法
// *
// * @author YuLei Liao <liaoyulei@qeeyuan.com>
// * @version $Id: array.php 1937 2009-01-05 19:09:40Z dualface $
// * @package helper
// */
//abstract class ArrayHelper
//{
//    /**
//     * 从数组中删除空白的元素（包括只有空白字符的元素）
//     *
//     * 用法：
//     * @code php
//     * $arr = array('', 'test', '   ');
//     * Helper_Array::removeEmpty($arr);
//     *
//     * dump($arr);
//     *   // 输出结果中将只有 'test'
//     * @endcode
//     *
//     * @param array $arr 要处理的数组
//     * @param boolean $trim 是否对数组元素调用 trim 函数
//     */
//    static function removeEmpty(& $arr, $trim = true)
//    {
//        foreach ($arr as $key => $value)
//        {
//            if (is_array($value))
//            {
//                self::removeEmpty($arr[$key]);
//            }
//            else
//            {
//                $value = trim($value);
//                if ($value == '')
//                {
//                    unset($arr[$key]);
//                }
//                elseif ($trim)
//                {
//                    $arr[$key] = $value;
//                }
//            }
//        }
//    }
//
//    /**
//     * 从一个二维数组中返回指定键的所有值
//     *
//     * 用法：
//     * @code php
//     * $rows = array(
//     *     array('id' => 1, 'value' => '1-1'),
//     *     array('id' => 2, 'value' => '2-1'),
//     * );
//     * $values = Helper_Array::cols($rows, 'value');
//     *
//     * dump($values);
//     *   // 输出结果为
//     *   // array(
//     *   //   '1-1',
//     *   //   '2-1',
//     *   // )
//     * @endcode
//     *
//     * @param array $arr 数据源
//     * @param string $col 要查询的键
//     *
//     * @return array 包含指定键所有值的数组
//     */
//    static function getCols($arr, $col)
//    {
//        $ret = array();
//        foreach ($arr as $row)
//        {
//            if (isset($row[$col])) { $ret[] = $row[$col]; }
//        }
//        return $ret;
//    }
//
//    /**
//     * 将一个二维数组转换为 HashMap，并返回结果
//     *
//     * 用法1：
//     * @code php
//     * $rows = array(
//     *     array('id' => 1, 'value' => '1-1'),
//     *     array('id' => 2, 'value' => '2-1'),
//     * );
//     * $hashmap = Helper_Array::hashMap($rows, 'id', 'value');
//     *
//     * dump($hashmap);
//     *   // 输出结果为
//     *   // array(
//     *   //   1 => '1-1',
//     *   //   2 => '2-1',
//     *   // )
//     * @endcode
//     *
//     * 如果省略 $value_field 参数，则转换结果每一项为包含该项所有数据的数组。
//     *
//     * 用法2：
//     * @code php
//     * $rows = array(
//     *     array('id' => 1, 'value' => '1-1'),
//     *     array('id' => 2, 'value' => '2-1'),
//     * );
//     * $hashmap = Helper_Array::hashMap($rows, 'id');
//     *
//     * dump($hashmap);
//     *   // 输出结果为
//     *   // array(
//     *   //   1 => array('id' => 1, 'value' => '1-1'),
//     *   //   2 => array('id' => 2, 'value' => '2-1'),
//     *   // )
//     * @endcode
//     *
//     * @param array $arr 数据源
//     * @param string $key_field 按照什么键的值进行转换
//     * @param string $value_field 对应的键值
//     *
//     * @return array 转换后的 HashMap 样式数组
//     */
//    static function toHashmap($arr, $key_field, $value_field = null)
//    {
//        $ret = array();
//        if ($value_field)
//        {
//            foreach ($arr as $row)
//            {
//                $ret[$row[$key_field]] = $row[$value_field];
//            }
//        }
//        else
//        {
//            foreach ($arr as $row)
//            {
//                $ret[$row[$key_field]] = $row;
//            }
//        }
//        return $ret;
//    }
//
//    /**
//     * 将一个二维数组按照指定字段的值分组
//     *
//     * 用法：
//     * @code php
//     * $rows = array(
//     *     array('id' => 1, 'value' => '1-1', 'parent' => 1),
//     *     array('id' => 2, 'value' => '2-1', 'parent' => 1),
//     *     array('id' => 3, 'value' => '3-1', 'parent' => 1),
//     *     array('id' => 4, 'value' => '4-1', 'parent' => 2),
//     *     array('id' => 5, 'value' => '5-1', 'parent' => 2),
//     *     array('id' => 6, 'value' => '6-1', 'parent' => 3),
//     * );
//     * $values = Helper_Array::groupBy($rows, 'parent');
//     *
//     * dump($values);
//     *   // 按照 parent 分组的输出结果为
//     *   // array(
//     *   //   1 => array(
//     *   //        array('id' => 1, 'value' => '1-1', 'parent' => 1),
//     *   //        array('id' => 2, 'value' => '2-1', 'parent' => 1),
//     *   //        array('id' => 3, 'value' => '3-1', 'parent' => 1),
//     *   //   ),
//     *   //   2 => array(
//     *   //        array('id' => 4, 'value' => '4-1', 'parent' => 2),
//     *   //        array('id' => 5, 'value' => '5-1', 'parent' => 2),
//     *   //   ),
//     *   //   3 => array(
//     *   //        array('id' => 6, 'value' => '6-1', 'parent' => 3),
//     *   //   ),
//     *   // )
//     * @endcode
//     *
//     * @param array $arr 数据源
//     * @param string $key_field 作为分组依据的键名
//     *
//     * @return array 分组后的结果
//     */
//    static function groupBy($arr, $key_field)
//    {
//        $ret = array();
//        foreach ($arr as $row)
//        {
//            $key = $row[$key_field];
//            $ret[$key][] = $row;
//        }
//        return $ret;
//    }
//
//    /**
//     * 将一个平面的二维数组按照指定的字段转换为树状结构
//     *
//     * 用法：
//     * @code php
//     * $rows = array(
//     *     array('id' => 1, 'value' => '1-1', 'parent' => 0),
//     *     array('id' => 2, 'value' => '2-1', 'parent' => 0),
//     *     array('id' => 3, 'value' => '3-1', 'parent' => 0),
//     *
//     *     array('id' => 7, 'value' => '2-1-1', 'parent' => 2),
//     *     array('id' => 8, 'value' => '2-1-2', 'parent' => 2),
//     *     array('id' => 9, 'value' => '3-1-1', 'parent' => 3),
//     *     array('id' => 10, 'value' => '3-1-1-1', 'parent' => 9),
//     * );
//     *
//     * $tree = Helper_Array::tree($rows, 'id', 'parent', 'nodes');
//     *
//     * dump($tree);
//     *   // 输出结果为：
//     *   // array(
//     *   //   array('id' => 1, ..., 'nodes' => array()),
//     *   //   array('id' => 2, ..., 'nodes' => array(
//     *   //        array(..., 'parent' => 2, 'nodes' => array()),
//     *   //        array(..., 'parent' => 2, 'nodes' => array()),
//     *   //   ),
//     *   //   array('id' => 3, ..., 'nodes' => array(
//     *   //        array('id' => 9, ..., 'parent' => 3, 'nodes' => array(
//     *   //             array(..., , 'parent' => 9, 'nodes' => array(),
//     *   //        ),
//     *   //   ),
//     *   // )
//     * @endcode
//     *
//     * 如果要获得任意节点为根的子树，可以使用 $refs 参数：
//     * @code php
//     * $refs = null;
//     * $tree = Helper_Array::tree($rows, 'id', 'parent', 'nodes', $refs);
//     *
//     * // 输出 id 为 3 的节点及其所有子节点
//     * $id = 3;
//     * dump($refs[$id]);
//     * @endcode
//     *
//     * @param array $arr 数据源
//     * @param string $key_node_id 节点ID字段名
//     * @param string $key_parent_id 节点父ID字段名
//     * @param string $key_childrens 保存子节点的字段名
//     * @param boolean $refs 是否在返回结果中包含节点引用
//     *
//     * return array 树形结构的数组
//     */
//    static function toTree($arr, $key_node_id, $key_parent_id = 'parent_id',
//                           $key_childrens = 'childrens', & $refs = null)
//    {
//        $refs = array();
//        foreach ($arr as $offset => $row)
//        {
//            $arr[$offset][$key_childrens] = array();
//            $refs[$row[$key_node_id]] =& $arr[$offset];
//        }
//
//        $tree = array();
//        foreach ($arr as $offset => $row)
//        {
//            $parent_id = $row[$key_parent_id];
//            if ($parent_id)
//            {
//                if (!isset($refs[$parent_id]))
//                {
//                    $tree[] =& $arr[$offset];
//                    continue;
//                }
//                $parent =& $refs[$parent_id];
//                $parent[$key_childrens][] =& $arr[$offset];
//            }
//            else
//            {
//                $tree[] =& $arr[$offset];
//            }
//        }
//
//        return $tree;
//    }
//
//    /**
//     * 将树形数组展开为平面的数组
//     *
//     * 这个方法是 tree() 方法的逆向操作。
//     *
//     * @param array $tree 树形数组
//     * @param string $key_childrens 包含子节点的键名
//     *
//     * @return array 展开后的数组
//     */
//    static function treeToArray($tree, $key_childrens = 'childrens')
//    {
//        $ret = array();
//        if (isset($tree[$key_childrens]) && is_array($tree[$key_childrens]))
//        {
//            foreach ($tree[$key_childrens] as $child)
//            {
//                $ret = array_merge($ret, self::treeToArray($child, $key_childrens));
//            }
//            unset($tree[$key_childrens]);
//            $ret[] = $tree;
//        }
//        else
//        {
//            $ret[] = $tree;
//        }
//        return $ret;
//    }
//
//    /**
//     * 根据指定的键对数组排序
//     *
//     * 用法：
//     * @code php
//     * $rows = array(
//     *     array('id' => 1, 'value' => '1-1', 'parent' => 1),
//     *     array('id' => 2, 'value' => '2-1', 'parent' => 1),
//     *     array('id' => 3, 'value' => '3-1', 'parent' => 1),
//     *     array('id' => 4, 'value' => '4-1', 'parent' => 2),
//     *     array('id' => 5, 'value' => '5-1', 'parent' => 2),
//     *     array('id' => 6, 'value' => '6-1', 'parent' => 3),
//     * );
//     *
//     * $rows = Helper_Array::sortByCol($rows, 'id', SORT_DESC);
//     * dump($rows);
//     * // 输出结果为：
//     * // array(
//     * //   array('id' => 6, 'value' => '6-1', 'parent' => 3),
//     * //   array('id' => 5, 'value' => '5-1', 'parent' => 2),
//     * //   array('id' => 4, 'value' => '4-1', 'parent' => 2),
//     * //   array('id' => 3, 'value' => '3-1', 'parent' => 1),
//     * //   array('id' => 2, 'value' => '2-1', 'parent' => 1),
//     * //   array('id' => 1, 'value' => '1-1', 'parent' => 1),
//     * // )
//     * @endcode
//     *
//     * @param array $array 要排序的数组
//     * @param string $keyname 排序的键
//     * @param int $dir 排序方向
//     *
//     * @return array 排序后的数组
//     */
//    static function sortByCol($array, $keyname, $dir = SORT_ASC)
//    {
//        return self::sortByMultiCols($array, array($keyname => $dir));
//    }
//
//    /**
//     * 将一个二维数组按照多个列进行排序，类似 SQL 语句中的 ORDER BY
//     *
//     * 用法：
//     * @code php
//     * $rows = Helper_Array::sortByMultiCols($rows, array(
//     *     'parent' => SORT_ASC,
//     *     'name' => SORT_DESC,
//     * ));
//     * @endcode
//     *
//     * @param array $rowset 要排序的数组
//     * @param array $args 排序的键
//     *
//     * @return array 排序后的数组
//     */
//    static function sortByMultiCols($rowset, $args)
//    {
//        $sortArray = array();
//        $sortRule = '';
//        foreach ($args as $sortField => $sortDir)
//        {
//            foreach ($rowset as $offset => $row)
//            {
//                $sortArray[$sortField][$offset] = $row[$sortField];
//            }
//            $sortRule .= '$sortArray[\'' . $sortField . '\'], ' . $sortDir . ', ';
//        }
//        if (empty($sortArray) || empty($sortRule)) { return $rowset; }
//        eval('array_multisort(' . $sortRule . '$rowset);');
//        return $rowset;
//    }
//}


 $rows = array(
                      array('id' => 1, 'value' => '1-1', 'parent' => 1),
                     array('id' => 2, 'value' => '2-1', 'parent' => 1),
                      array('id' => 3, 'value' => '3-1', 'parent' => 1),
                      array('id' => 4, 'value' => '4-1', 'parent' => 2),
                      array('id' => 5, 'value' => '5-1', 'parent' => 2),
                      array('id' => 6, 'value' => '6-1', 'parent' => 3),
            );

            $rows = ArrayHelper::sortByCol($rows, 'id', SORT_DESC);
   //         var_dump($rows);die();






$data = $_POST;

$chat_group_item = model('mechanic_chat_group')->get_one(array('q_id'=>$data['q_id']));

$array = array('client_id'=>END_HUANXIN_CLIENT_ID,'client_secret'=>END_HUANXIN_CLIENT_SECRET,'org_name'=>END_HUANXIN_ORG_NAME,'app_name'=>END_HUANXIN_APP_NAME);

$ease = new Easemob($array);

//$ql = "select * where  timestamp < {$chat_group_item['q_end_time']} and timestamp > {$chat_group_item['q_start_time']}";  //时间范围
//$ql = "select * where  (from= '183' and to='zhao') or (from= 'zhao' and to='183')";  //角色范围
$ql1 = "select *  where from= 'zhao' and to='182' and timestamp < {$chat_group_item['q_end_time']} and timestamp > {$chat_group_item['q_start_time']}";
$ql2 = "select *  where from= '182' and to='zhao' and timestamp < {$chat_group_item['q_end_time']} and timestamp > {$chat_group_item['q_start_time']}";
//$ql = "select *  where (from= '182' and to='zhao') or ( from= 'zhao' and to='182') and timestamp > {$chat_group_item['q_start_time']}";

$result1 = $ease->chatRecord(urlencode($ql1));
$result2 = $ease->chatRecord(urlencode($ql2));

//$messages = json_encode($result['entities']);
//var_dump($ql);
$result = array_merge($result1['entities'],$result2['entities']);
$count1 = count($result1['entities']);
$count2 = count($result2['entities']);
$count3 = count($result);
//var_dump($count1."  ".$count2."     gongji: ".$count3);
//var_dump($result);
$rows = ArrayHelper::sortByCol($result, 'timestamp', SORT_DESC);
//$rows = Helper_Array::sortByCol($rows, 'id', SORT_DESC);
//var_dump($rows);
json_send(array('ql1'=>$ql1,'ql2'=>$ql2,'count'=>$count1."  ".$count2."     gongji: ".$count3,'result'=>$rows));die();














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





