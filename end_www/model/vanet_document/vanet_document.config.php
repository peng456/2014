<?php
/**
 * document model config
 *
 * @author liudanking
 */

$document_option_yesno = array(
	'0'=>'<span style="color:grey">关闭</span>',
	'1'=>'<span style="color:green">开放</span>'
);

$end_models['vanet_document'] = array(
	'type' => 'list', //表示这是一个列表型的模型，对应一个数据库的表
	'name' => '共享文档列表',	//某型的名字，可以把一个栏目配置成某个模型
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
		'file_name'=>array(
			'name'=>'文件名',
			'type'=>'text',
			'null'=>true
		),
		'url'=>array(
			'name'=>'下载地址',
			'type'=>'file',
			'null'=>false,
			'filetype'=> array('docx','doc', 'ppt', 'pptx', 'pdf', 'jar', 'jad')
		),
		'status'=>array(
			'name'=>'状态',
			'type'=>'select',
			'options'=>$document_option_yesno,
			'default'=>'1',
			'null'=>true,
			'description'=>'0：关闭；1：开放'
		)
	),


	'list_fields' => array(
		'document_id'=>array(
			'name'=>'ID',
			'width'=>'auto',
			'sort'=>true
		),
		'file_name'=>array(
			'name'=>'文件名',
			'width'=>'auto',
			'type'=>'text',
			'search'=>true
		),
		'url'=>array(
			'name'=>'文件',
			'width'=>'auto',
			'type'=>'text',
			'filter'=>'show_file_url_link'
		),
		'status'=>array(
			'name'=>'状态',
			'edit'=>true,
			'type'=>'select',
			'options'=>$document_option_yesno
		),
		'create_time'=>array(
			'name'=>'创建时间',
			'width'=>110,
			'sort'=>true,
			'filter'=>'show_vanet_document_date'
		),
		'_options'=>array(
			'name'=>'操作',
			'width'=>100,
			'filter'=>'show_vanet_document_options'
		)
	)
);


function show_file_url_link($url)
{
	#$url_link =  'http://' . $_SERVER['HTTP_HOST'] . '/' . $url;
	$url_link = "<a href='$url'>$url</a>";
	return $url_link;
}

function show_vanet_document_date($t)
{
	return date('Y-m-d H:i:s',$t);
}

$end_rights[] = array(
	'name'=>'vanet_document',
	'description'=>'共享文档',
	'rights'=>array('view','delete','update','add')
);

function show_vanet_document_options($document)
{
	end_show_view_button($document['document_id']);
	end_show_edit_button($document['document_id']);
	end_show_delete_button($document['document_id']);
}
