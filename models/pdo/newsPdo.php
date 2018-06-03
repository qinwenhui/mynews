<?php
//新闻模型的数据访问
class NewsPDO{
	
	//查询所有新闻，返回一张表，二维数组
	public function queryAllNews(){
		$newsArray = array();
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from news";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		while($news = mysqli_fetch_array($result)){
			$newsArray[] = $news;
		}
		mysqli_free_result($result);
		return $newsArray;
	}
	//查询特定新闻
	public function queryNews($news_id){
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from news where news_id=$news_id";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		$news = mysqli_fetch_array($result);
		mysqli_free_result($result);
		return $news;
	}
	//查询特定新闻（包括类别）
	public function queryNewsCategory($news_id){
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select news.*,category.* from news,category where news.category_id=category.category_id and news_id=$news_id";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		$news = mysqli_fetch_array($result);
		mysqli_free_result($result);
		return $news;
	}
	//增加一条新闻
	public function addNews($user_id,$category_id,$title,$content,$attachment){
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "insert into news(user_id,category_id,title,content,publish_time,attachment) values($user_id,$category_id,'$title','$content',now(),'$attachment')";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		mysqli_free_result($result);
		return $result;
	}
	//删除一条新闻
	public function delete($news_id){
		$db = new Db_Utils();
		$sql = "delete from news where news_id=$news_id";
		$conn = $db->get_conn();
		$isOk = $conn->query($sql);
		$db->close_conn($conn);
		return $isOk;
	}
	//更新特定新闻
	public function update($news_id,$title,$content,$category_id,$attachment){
		$db = new Db_Utils();
		$sql = "update news set title='$title',content='$content',category_id=$category_id,attachment='$attachment' where news_id=$news_id";
		$conn = $db->get_conn();
		$isOk = $conn->query($sql);
		$db->close_conn($conn);
		return $isOk;
	}
}