<?php
//分类模型的数据访问层
class CategoryPDO{
	//获取所有分类
	public function queryAllCategory(){
		$categoryArray = array();
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from category";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		while($category = mysqli_fetch_array($result)){
			$categoryArray[] = $category;
		}
		mysqli_free_result($result);
		return $categoryArray;
	}
	//通过id获取特定类型
	public function queryCategory($category_id){
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from category where category_id=$category_id";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		$category = mysqli_fetch_array($result);
		mysqli_free_result($result);
		return $category;
	}
	//添加类型
	public function addCategory($name){
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "insert into category(name) values('$name')";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		if($result == false){
			return false;
		}
		mysqli_free_result($result);
		return true;
	}
}