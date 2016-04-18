<?php
namespace Home\Controller;

use Think\Controller;


class LoginController extends Controller{
	public function login(){
		//echo "可以使用";
		session('$username',$_POST['username']);
		$value = session('$username');
		$this->display('Login/login');
		if($_POST['submit1']){
			$User = M("User");
			$user = $_POST['username'];
			$user = base64_encode($user);
			$user = base64_encode($user);
			$where['username']= $user;
			$list = $User->where($where)->select();
			$pwd = $_POST['pwd'];
			$pwd = crypt($pwd,"wjy");
			$pwd = md5($pwd);
			$pwd = base64_encode($pwd);
			$pwd = strrev($pwd);
			$pwd = $pwd."".$user;
			if($pwd == $list[0]['pwd']){
				echo "<script language=\"JavaScript\">\r\n";
				echo " alert(\"恭喜您！登陆成功！\");\r\n";
//				echo " history.back();\r\n";
			    echo "window.location.href='bingli.html'";
				echo "</script>";
				exit;
				//$this->redirect('bingli', 0, '页面跳转中...');
			}else {
				echo "<script language=\"JavaScript\">\r\n";
				echo " alert(\"用户名或者密码错误！\");\r\n";
				//echo " history.back();\r\n";
				echo "</script>";
				exit;
			}
		}else if($_POST['submit2']){
			$User = M("User");
			$where['username']= $_POST['user'];
			$list = $User->where($where)->select();
			if(count($list)==0){
				$user = $_POST['user'];
				$pwd = $_POST['pwd'];
				$email = $_POST['e-mail'];
				$user = base64_encode($user);
				$user = base64_encode($user);
				$pwd = crypt($pwd,"wjy");
				$pwd = md5($pwd);
				$pwd = base64_encode($pwd);
				$pwd = strrev($pwd);
				$pwd = $pwd."".$user;
				$email = base64_encode($email);
				$data['username'] = $user;
				$data['pwd'] = $pwd;
				$data['email'] = $email;
				$User->add($data);
				echo "<script language=\"JavaScript\">\r\n";
				echo " alert(\"恭喜您，注册成功！\");\r\n";
				echo " history.back();\r\n";
				echo "</script>";
				exit;
			} else{
				echo "<script language=\"JavaScript\">\r\n";
				echo " alert(\"抱歉，注册失败！该用户名已被占用！\");\r\n";
				echo " history.back();\r\n";
				echo "</script>";
				exit;
			}
		}
	}
	public function bingli(){
		$this->display();
		if(session('?$username')){
			
		}else {
			echo "<script language=\"JavaScript\">\r\n";
			echo "window.location.href='login.html'";
			echo "</script>";
		}
	} 

}
