<?php
/*
**评论控制器
*/
class Review_Controller{
    //要加载的页面名字
    public $template = "error";
    public function main(array $getVars){
        switch ($getVars['state']){
        	case 'list': self::allReview();break;
        	case 'shenhe':self::shenhe();break;
            case 'userReview':self::userReview();break;
            case 'add':self::addReview();break;
        }
    }
    //添加评论的方法
    public function addReview(){
        $review_Model = new Review_Models();
        $user_id = $_POST['user_id'];
        $news_id = $_POST['news_id'];
        $content = $_POST['content'];
        if($review_Model->addReview($user_id,$news_id,$content)){
            //添加成功,重定向到新闻详情,并携带成功提示
            header("Location: index.php?news&state=detail&news_id=$news_id&error=ok");
        }else{
            //添加失败，重定向到新闻详情，并携带失败提示
            header("Location: index.php?news&state=detail&news_id=$news_id&error=error");
        }
    }
    //查看某用户的所有评论
    public function userReview(){
    	$user_id = $_GET['user_id'];
    	$review_Model = new Review_Models();
    	$reviews = $review_Model->getUserReview($user_id);
    	$this->template = "admin/user_review";
    	$view = new View_Models($this->template);
    	$view->assign('reviews', $reviews);
    }
    //查看所有评论，列表
    public function allReview(){
    	$review_Model = new Review_Models();
    	$reviews = $review_Model->getAllReview();
    	$this->template = 'admin/review';
    	$view = new View_Models($this->template);
    	$view->assign('reviews', $reviews);
    }
    //审核评论
    public function shenhe(){
    	$review_Model = new Review_Models();
    	$review_id = $_GET['review_id'];
    	$isOk = $review_Model->shenhe($review_id);
    	if($isOk){
    		//审核成功
    		header("Location: index.php?review&state=list");
    	}else{
    		//审核失败
    	}
    }
}