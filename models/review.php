<?php
include_once 'pdo/reviewPdo.php';
/*
 **评论模型
 */
class Review_Models{
	private $review_id;
	private $user_id;
	private $news_id;
	private $content;
	private $publish_time;
	private $state;
	//get,set
	public function getReview_id(){
		return $this->review_id;
	}
	public function setReview_id($review_id){
		$this->review_id = $review_id;
	}
	public function getUser_id(){
		return $this->user_id;
	}
	public function setUser_id($user_id){
		$this->user_id = $user_id;
	}
	public function getNews_id(){
		return $this->news_id;
	}
	public function setNews_id($news_id){
		$this->news_id = $news_id;
	}
	public function getContent(){
		return $this->content;
	}
	public function setContent($content){
		$this->content = $content;
	}
	public function getPublish_time(){
		return $this->publish_time;
	}
	public function setPublish_time($publish_time){
		$this->publish_time = $publish_time;
	}
	public function getState(){
		return $this->state;
	}
	public function setState($state){
		$this->state = $state;
	}
	//处理数据的方法
	public function getAllReview(){
		//获取所有评论
		$reviewpdo = new reviewPdo();
		$reviews = $reviewpdo->queryAllReview();
		return $reviews;
	}
	public function getNewsReview($news_id){
		//获取某篇新闻的所有评论
		$reviewpdo = new reviewPdo();
		$reviews = $reviewpdo->queryNewsReview($news_id);
		return $reviews;
	}
	public function getUserReview($user_id){
		//获取某用户的所有评论
		$reviewpdo = new reviewPdo();
		$reviews = $reviewpdo->queryUserReview($user_id);
		return $reviews;
	}
	public function getReview($review_id){
		//获取特定评论
		$reviewpdo = new reviewPdo();
		$review = $reviewpdo->queryReview($review_id);
		return $review;
	}
	public function addReview($user_id,$news_id,$content){
		//添加评论
		$reviewpdo = new reviewPdo();
		$addOk = $reviewpdo->addReview($user_id,$news_id,$content);
		if($addOk == false){
			return false;
		}else{
			return true;
		}
	}
	public function shenhe($review_id){
		//审核评论
		$reviewpdo = new reviewPdo();
		$addOk = $reviewpdo->shenhe($review_id);
		if($addOk == false){
			return false;
		}else{
			return true;
		}
	}
}