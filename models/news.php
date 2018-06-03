<?php
include_once 'pdo/newsPdo.php';
/*
**新闻模型
*/
class News_Models{
	private $news_id;
	private $user_id;
	private $category_id;
	private $title;
	private $content;
	private $publish_time;
	private $clicked;
	private $attachment;
	//get,set
	public function getNews_id(){
		return $this->news_id;
	}
	public function setNews_id($news_id){
		$this->news_id = $news_id;
	}
	public function getUser_id(){
		return $this->user_id;
	}
	public function setUser_id($user_id){
		$this->user_id = $user_id;
	}
	public function getCategory_id(){
		return $this->category_id;
	}
	public function setCategory_id($category_id){
		$this->category_id = $category_id;
	}
	public function getTitle(){
		return $this->title;
	}
	public function setTitle($title){
		$this->title = $title;
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
	public function getClicked(){
		return $this->clicked;
	}
	public function setClicked($clicked){
		$this->clicked = $clicked;
	}
	public function getAttachmen(){
		return $this->attachment;
	}
	public function setAttachment($attachment){
		$this->attachment = $attachment;
	}
	
	//业务逻辑
	public function getAllNews(){
		//获取新闻列表
		$newspdo = new NewsPDO();
		$newsArray = $newspdo->queryAllNews();
		return $newsArray;
	}
	public function getNews($news_id){
		//获取特定id的新闻详情
		$newspdo = new NewsPDO();
		$news = $newspdo->queryNews($news_id);
		return $news;
	}
	//添加一条新闻
	public function addNews($user_id, $category_id, $title, $content, $attachment){
		$newspdo = new NewsPDO();
		return $newspdo->addNews($user_id, $category_id, $title, $content, $attachment);
	}
	//删除一条新闻
	public function deleteNews($news_id){
		$newspdo = new NewsPDO();
		return $newspdo->delete($news_id);
	}
	//更新一条新闻
	public function updateNews($news_id,$title,$content,$category_id,$attachment){
		$newspdo = new NewsPDO();
		$isOk = $newspdo->update($news_id, $title, $content, $category_id, $attachment);
		return $isOk;
	}
}