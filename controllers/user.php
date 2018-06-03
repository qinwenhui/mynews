<?php
//新闻控制器
class User_Controller{
	//要加载的页面名字
	public $template = "error";
	public function main(array $getVars){
		//通过传入的关联数组$getVars进行一些操作,state=user就是显示用户信息
		switch ($getVars['state']){
			case 'user': self::myuser();break;
			case 'list': self::userList();break;
			case 'zhuxiao':self::zhuxiao();break;
		}
	}
	public function myuser(){
		//用户详细信息的页面，当前用户本身可查看
		$user_Model = new User_Models();
		$user_id = $_GET['user_id'];
		$user = $user_Model->getUser($user_id);
		$level = @$_GET['level'];
		if($level == "guanliyuan"){
			//管理员查看页面
			$this->template = "admin/user";
		}else{
			//用户本身查看页面
			$this->template = "user";
		}
		$view = new View_Models($this->template);
		$view->assign('user', $user);
	}
	public function userList(){
		//获取所有用户
		$user_Model = new User_Models();
		$users = $user_Model->getAllUser();
		$this->template = "admin/user_list";
		$view = new View_Models($this->template);
		$view->assign("users", $users);
	}
	public function zhuxiao(){
		//注销登录
		session_start();
		$_SESSION['user_id'] = null;
		$_SESSION['username'] = null;
		$_SESSION['password'] = null;
		$_SESSION['level'] = null;
		header("Location: views/index.php");
	}
}