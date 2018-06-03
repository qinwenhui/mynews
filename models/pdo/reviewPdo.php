<?php
//评论模型的数据访问层
class ReviewPDO{
	
	//获取所有评论,返回二维数组
	public function queryAllReview(){
		$reviewsArray = array();
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from review";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		while($review = mysqli_fetch_array($result)){
			$reviewsArray[] = $review;
		}
		mysqli_free_result($result);
		return $reviewsArray;
	}
	//通过评论id获取特定评论
	public function queryReview($review_id){
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from review where review_id=$review_id";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		$review = mysqli_fetch_array($result);
		mysqli_free_result($result);
		return $review;
	}
	//通过用户id获取该用户所有评论,返回二维数组
	public function queryUserReview($user_id){
		$reviewsArray = array();
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select * from review where user_id=$user_id";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		while($review = mysqli_fetch_array($result)){
			$reviewsArray[] = $review;
		}
		mysqli_free_result($result);
		return $reviewsArray;
	}
	//通过新闻id获取该新闻所有评论,返回二维数组(同时获取发表该评论的用户的信息)
	public function queryNewsReview($news_id,$state='已审核'){
		//双表链接查询
		$reviewsArray = array();
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "select users.*,review.* from review left outer join users on users.user_id=review.user_id where news_id=$news_id and review.state='$state'";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		while($review = mysqli_fetch_array($result)){
			$reviewsArray[] = $review;
		}
		mysqli_free_result($result);
		return $reviewsArray;
	}
	//添加评论
	public function addReview($user_id,$news_id,$content){
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = "insert into review(news_id,user_id,content,publish_time,state,ip) values($news_id,$user_id,'$content',now(),'未审核','$ip')";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		mysqli_free_result($result);
		$isOk = $result;
		return $isOk;
	}
	//审核评论
	public function shenhe($review_id){
		$db = new Db_Utils();
		$conn = $db->get_conn();
		$sql = "update review set state='已审核' where review_id=$review_id";
		$result = $conn->query($sql);
		$db->close_conn($conn);
		return $result;
	}
}