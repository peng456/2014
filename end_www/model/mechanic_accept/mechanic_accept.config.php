<?php
/**
 * APP version model config
 *
 * @author liudanking @ 2013.12.17
 */

$appversion_option_platform = array(
	'android'=>'<span style="color:green">Android</span>',
	'iphone'=>'<span style="color:grey">iPhone</span>',
	'ipad'=>'<span style="color:grey">iPad</span>'
);

$appversion_option_yesno = array(
	'0'=>'<span style="color:grey">旧版本</span>',
	'1'=>'<span style="color:green">当前版本</span>'
);

$appversion_option_update_level = array(
	'0'=>'<span style="color:red">必须更新</span>',
	'1'=>'<span style="color:grey">强烈建议更新</span>',
	'2'=>'<span style="color:green">建议更新</span>'
);

$end_models['mechanic_appversion'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => 'APP版本列表',	//某型的名字，可以把一个栏目配置成某个模型
	'list_items'=>20, //后台每页显示
	'no_category'=>true,
	'category_fields'=> array(
		'name'=>array(
			'name'=>lang('Name'),
			'type'=>'text',
			'null'=>false
		)
	),
	'fields' => array(
		'platform'=>array(
			'name'=>'APP平台',
			'type'=>'select',
			'options'=>$appversion_option_platform
		),
		'version'=>array(
			'name'=>'版本号',
			'type'=>'text',
			'null'=>false,
			'description'=>'四位版本号：1.0.0.0'
		),
		'url'=>array(
			'name'=>'下载地址',
			'type'=>'text',
			#'filetype'=> array('apk','ipa', 'pdf'),
			'null'=>false
		),
		'update_level'=>array(
			'name'=>'更新级别',
			'type'=>'select',
			'options'=>$appversion_option_update_level,
			'description'=>'0：必须更新；1：强烈建议更新；2：建议更新',
			'null'=>true
		)
		
	),
	'list_fields' => array(
		'appversion_id'=>array(
			'name'=>'ID',
			'width'=>'30',
			'sort'=>true,
			'align'=>'center',
		),
		'platform'=>array(
			'name'=>'平台',
			'edit'=>true,
			'type'=>'select',
			'options'=>$appversion_option_platform,
			'sort'=>true,
			'search'=>true
		),
		'version'=>array(
			'name'=>'版本号',
			'sort'=>true,
			'type'=>'text',
			'search'=>true
		),
		'url'=>array(
			'name'=>'下载地址',
			'type'=>'text',
			'filter'=>'get_html_link'
		),
		'update_level'=>array(
			'name'=>'更新级别',
			'edit'=>true,
			'type'=>'select',
			'options'=>$appversion_option_update_level
		),
		'status'=>array(
			'name'=>'状态',
			'edit'=>true,
			'type'=>'select',
			'options'=>$appversion_option_yesno
		),
		'create_time'=>array(
			'name'=>'发布时间',
			'sort'=>true,
			'filter'=>'show_mechanic_appversion_date'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_mechanic_appversion_options'
		)
	)
);


function show_mechanic_appversion_date($t)
{
	return date('Y-m-d H:i:s',$t);
}


$end_rights[] = array(
	'name'=>'mechanic_appversion',
	'description'=>'APP版本数据',
	'rights'=>array('view','delete','update','add')
);

function show_mechanic_appversion_options($item)
{
	$id = 'appversion_id';
	end_show_view_button($item[$id]);
	end_show_edit_button($item[$id]);
	end_show_delete_button($item[$id]);
}

function get_html_link($url)
{
	// if (strpos($url, 'http://') === false)
	// 	return "<a href='.$url'>$url</a>";
	// else
		return "<a href='$url'>$url</a>";
}
