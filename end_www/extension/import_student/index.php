<?php
END_MODULE != 'admin' && die('Access Denied');
$do = $_GET['do'];



if (!$do) //首页
{
	?>
<p>第一步，准备csv文件</p>
<p>请按照用记事本或者其他纯文本编辑器打开csv文件，确保文件内容是如下格式：<br>
<pre>姓名,学号
刘春龙,2701309012
李春江,2701309013
孙凡迪,2701309014
孙迪,2701309015</pre>	
</p>
<p>第二步，将文件内容粘贴到下面的输入框中</p>
<form action="<?php echo $url;?>&do=import" method="post">
<textarea name="content" rows=30 cols=50></textarea>
<div><input type=submit value="提交"></div>
</form>

	<?php
}
elseif ($do == 'import')
{
	if ($_POST['content'])
	{
		$s = str_replace("\r","",$_POST['content']);
		$arr = explode("\n",$s);
		$lines = array();
		foreach($arr as $l)
		{
			list($name,$stuId) = explode(',',trim($l));
			$name = trim($name);
			$stuId = trim($stuId);
			if (!$name || !$stuId) continue;
			if (!preg_match('/^\d+$/',$stuId)) continue;
			$lines[] = array('username'=>$name,'stuid'=>$stuId);
		}
		?>

<form action="<?php echo $url;?>&do=save" method="post">
<textarea style="display:none;" name="data"><?php echo json_encode($lines);?></textarea>
即将要导入如下数据，请检查:
<style>
#import-table { border-collapse: collapse;}
#import-table td,#import-table th{ border:1px solid #999; padding:2px 5px; }
</style>
<table id="import-table">
	<tr>
		<th>姓名</th>
		<th>学号</th>
	</tr>
	<?php
	foreach($lines as $l)
	{
		echo '<tr>';
		echo '<td>'.$l['username'].'</td>';
		echo '<td>'.$l['stuid'].'</td>';
		echo '</tr>';
	}
	?>
</table>
<input type=submit value="确认导入"> <a href="javascript:history.go(-1);">返回上一步</a>
</form>
		<?php
	}
	else
	{
		echo '<span style="color:red">您没有输入任何内容</span><br>';
	}
}
else if ($do == 'save')
{
	$s = $_POST['data'];
	$datas = json_decode($s,true);
    foreach($datas as $data)
    {
    	$data['grade'] = parse_stuid($data['stuid']);
        $data['password'] = $data['stuid'];
        $data['real_name'] = $data['username'];
        if(model('user')->add($data))
        {
            echo "<script>alert(\"上传成功！\")</script>";
            echo "<script>window.history.go(-3)</script>";
        }
        else
        {
            echo "<script>alert(\"上传失败,请重新上传！\")</script>";
        }

    }

}

function parse_stuid($stuid)
{
	return '2011';
}