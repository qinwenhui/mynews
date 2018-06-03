<?php
//用户模型的数据访问
class UserPDO{
	
	public function login($username,$password){
		//登陆验证的方法
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from users where name='$username' and password='$password'";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		if(mysqli_num_rows($result) == 0){
			//没有该用户，登陆失败
			mysqli_free_result($result);
			return false;
		}else{
			//登陆成功
			$user = mysqli_fetch_array($result);
			mysqli_free_result($result);
			return $user;
		}
	}
	
	public function register($username,$password,$level){
		//注册的方法
		//先查询是否存在用户名
		$users = $this->queryAllUser();
		foreach ($users as $user){
			if($user['name'] == $username){
				return false;
			}
		}
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "insert into users(name,password,level) values('$username','$password','$level')";
		$updateCount = $conn->query($sql);
		$db->close_conn($conn);
		if($updateCount == 0){
			//注册失败
			return false;
		}else if($updateCount == 1){
			//注册成功
			return true;
		}
		return false;
	}
	
	//查询特定用户
	public function queryUser($userId){
		//存在返回user的数组,不存在返回false
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from users where user_id=$userId";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		$user = mysqli_fetch_array($result);
		mysqli_free_result($result);
		return $user;
	}
	
	//查询所有用户
	public function queryAllUser(){
		//返回一个二维数组(一张表)
		$users = array();
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from users";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		while($user = mysqli_fetch_array($result)){
			$users[] = $user;
		}
		mysqli_free_result($result);
		return $users;
	}
}