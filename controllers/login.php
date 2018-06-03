<?php
/**
 * 登录控制器
 */ 
class Login_Controller{
    //要加载的页面名字
    public $template = "error";
    public function main(array $getVars){
        //通过传入的关联数组$getVars进行一些操作
        self::login();
    }
    public function login(){
        $userName = $_POST['userName'];
        $password = md5($_POST['password']);
        $userModel = new User_Models();
        $user = $userModel->login($userName,$password);
        if($user != false){
        	//保存用户信息到session和cookie
        	session_start();
        	$_SESSION['user_id'] = $user['user_id'];
        	$_SESSION['username'] = $user['name'];
        	$_SESSION['password'] = $user['password'];
        	$_SESSION['level'] = $user['level'];
        	setcookie(session_name(),session_id(),time()+60);
            //登录成功,加载成功的view
            $this->template = 'login_success';
            $view = new View_Models($this->template);
            //向view传数据
            //$view->assign('msg',$msg);
        }else{
            //登录失败
        	header("Location: views/login.php?error=error");
        }
    }
}