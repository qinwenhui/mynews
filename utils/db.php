<?php
/*
**数据库操作工具类
*/
class Db_Utils{
	private $conn = null;
	//获取连接
	public function get_conn(){
		$hostName = "localhost";
		$userName = "root";
		$password = "root";
		$dbName = "news";
		global $conn;
		$conn = new mysqli($hostName,$userName,$password);
		$conn->select_db($dbName);
		return $conn;
	}
	//关闭连接
	public function close_conn($conn){
		if($conn){
			mysqli_close($conn);
		}
	}
}