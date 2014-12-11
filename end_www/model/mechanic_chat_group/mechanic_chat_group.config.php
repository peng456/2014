<?php
/**
 * maker model config
 *
 * @author deanmongel
 */
$end_models['mechanic_chat_group'] = array(
    'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
    'name' => '答案列表',	//某型的名字，可以把一个栏目配置成某个模型
    'list_items'=>30, //后台每页显示
    'no_category'=>true,
    'category_fields'=> array(
        'name'=>array(
            'name'=>lang('Name'),
            'type'=>'text',
            'null'=>false
        )
    ),
    //在查看操作中显示的内容，查看按钮在每条数据的后面
    'fields' => array(
        'a_id' => array(//数据库中的字段名
            'name' => 'ID',//显示在后台的名字
            'type' => 'text',//类型
            'null' => true
        ),
        'mechanic_user_id' => array(
            'name' => '技师ID',
            'type' => 'text',
            'null' => true
        ),
        'q_id' => array(
            'name' => '问题ID',
            'type' => 'text',
            'null' => true
        ),
        'text' => array(
            'name' => '文字描述',
            'type' => 'text',
            'null' => true
        ),
        'picture' => array(
            'name' => '图片',
            'type' => 'text',
            'null' => true
        ),
        'voice' => array(
            'name' => '语音',
            'type' => 'text',
            'null' => true
        ),
        'driver_comment' => array(
            'name' => '车友评价',
            'type' => 'text',
            'null' => true
        ),
        'pay_amount' => array(
            'name' => '获得酬金',
            'type' => 'text',
            'null' => true
        ),
       'create_time' => array(
          'name' => '创建时间',
           'type' => 'text',
           'null' => true
        )
    ),
    //显示在列表中的内容
    'list_fields' => array(
        'a_id'=>array(//数据库中的字段名
            'name'=>'ID',//显示在后台的名字
            'width'=>'30',
            'sort'=>true,
            'align'=>'center',
            'search'=>true
        ),

        'mechanic_user_id'=>array(
            'name'=>'技师ID',
            'width'=>'auto',
            'type'=>'text',
            'search'=>true,
            'search'=>true
        ),
        'q_id'=>array(
            'name'=>'问题ID',
            'width'=>'auto',
            'type'=>'text',
            'search'=>true
        ),
        'text' => array(
            'name' => '文字描述',
            'type' => 'text',
            'null' => true
        ),
        'picture' => array(
            'name' => '图片',
            'type' => 'text',
            'width'=>'100',
            'null' => true
        ),
        'voice' => array(
            'name' => '语音',
            'type' => 'text',
            'null' => true
        ),
        'driver_comment' => array(
            'name' => '车友评价',
            'type' => 'text',
            'width'=>'auto',
            'null' => true
        ),

        'pay_amount' => array(
            'name' => '获得酬金',
            'type' => 'text',
            'null' => true
        ),
        'create_time'=>array(
            'name'=>'创建时间',
            'width'=>'auto',
            'type'=>'text',
            'filter'=>'show_mechanic_chat_group_date'
        ),
        '_options'=>array(//显示操作里面的按钮
            'name'=>'操作',
            'width'=>100,
            'filter'=>'show_mechanic_chat_group_options'
        )
    )
);

function show_mechanic_chat_group_date($t)
{
    return date('Y-m-d H:i:s',$t);
}

//添加权限设置项
$end_rights[] = array(
    'name'=>'mechanic_chat_group',
    'description'=>'问答列表',
    'rights'=>array('view','delete','update','add')
);

function show_mechanic_chat_group_options($item)
{
    $id = 'a_id';
    end_show_view_button($item[$id]);
    end_show_edit_button($item[$id]);
    end_show_delete_button($item[$id]);
}