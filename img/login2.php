<?php
// echo $_SESSION['helloweba_num'];die;
if ($_POST['email'])
{
	$data = array();
	if($_POST['check_code']!=$_SESSION['helloweba_num'])
	{
		die("验证码错误");
	}
	$data['username'] = $_POST['email'];
	$password = end_encode($_POST['password']);
	$data['password'] = $password;

	$u = model('user')->get_one($data);

	if (!$u)
	{
		$u = model('teacher')->get_one(array('username'=>$_POST['email'],'password'=>$password));
	}


	if ($u)
	{
		$_SESSION['user'] = $u;
		$_SESSION['user_type'] = $u['user_id'] ? 'student' : 'teacher';
		$_SESSION['is_teacher'] = $_SESSION['user_type'] == 'teacher';
		$_SESSION['is_student'] = $_SESSION['user_type'] == 'student';


		if ($_POST['remember'] == 'yes')
		{
			$t = time() + 86400*365;
			setcookie('hash',end_encode($u['user_id']),$t);
			setcookie('uid',$u['user_id'],$t);
		}
		die('ok');
	}
	else
	{
		die('用户名或密码错误!');
	}
}
