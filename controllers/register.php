<?php
/*
**注册的控制器
*/
class Register_Controller{
	//要加载的页面名字
	public $template = "error";
	public function main(array $getVars){
		//通过传入的关联数组$getVars进行一些操作
		self::register();
	}
	public function register(){
		$userName = $_POST['userName'];
		$password = md5($_POST['password']);
		$level = $_POST['level'];
		$userModel = new User_Models();
		$msg = $userModel->register($userName,$password,$level);
		if($msg == "ok"){
			//注册成功,加载成功的view
			$this->template = 'register_success';
			$view = new View_Models($this->template);
			//向view传数据
			$view->assign('msg',$msg);
		}else{
			//注册失败,重定向到注册页面，并返回错误信息
			header("Location: views/register.php?error=error");
			
		}
	}
}