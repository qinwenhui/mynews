<?php
include_once 'pdo/userPdo.php';
/*
**用户模型
*/
class User_Models{
    private $userId;
    private $userName;
    private $password;
    //set,get方法
    public function setUserId($id){
    	$this->userId = $id;
    }
    public function getUserId(){
    	return $this->userId;
    }
    public function setPassword($psw){
    	$this->password = $psw;
    }
    public function getPassword(){
    	return $this->password;
    }
    public function setUserName($name){
    	$this->userName = $name;
    }
    public function getUserName(){
    	return $this->userName;
    }
    
    
    //实现逻辑的方法
    public function login($userName,$password){
    	$userpdo = new UserPDO();
        $user = $userpdo->login($userName, $password);
        return $user;
    }
    public function register($userName,$password,$level='普通用户'){
    	$userpdo = new UserPDO();
    	$msg = "error";
    	if($userpdo->register($userName,$password,$level)){
    		$msg = "ok";
    	}else{
    		$msg = "error";
    	}
    	return $msg;
    }
    //获取某个用户信息
    public function getUser($user_id){
    	$userpdo = new UserPDO();
    	$user = $userpdo->queryUser($user_id);
    	return $user;
    }
    //获取所有用户（二维数组）
    public function getAllUser(){
    	$userpdo = new UserPDO();
    	$users = $userpdo->queryAllUser();
    	return $users;
    }
}
?>