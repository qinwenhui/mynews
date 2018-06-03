<?php
//新闻控制器
class News_Controller{
	//要加载的页面名字
	public $template = "error";
	public function main(array $getVars){
		//通过传入的关联数组$getVars进行一些操作,state=list就是显示列表
		switch ($getVars['state']){
			case 'list': self::newsList();break;
			case 'detail':self::newsDetail();break;
			case 'displayAddNews':self::displayAddNews();break;
			case 'add':self::addNews();break;
			case 'delete': self::deleteNews();break;
			case 'update': self::updateNews();break;
			case 'displayUpdate': self::displayUpdateNews();break;
		}
	}
	//显示新闻列表的方法
	public function newsList(){
		$news_Model = new News_Models();
		$newsArray = $news_Model->getAllNews();
		$this->template = "news_list";
		//管理员的话，跳转到管理员专用的新闻列表页面
		if(@$_GET['level'] == 'guanliyuan'){
			$this->template = "admin/news_list";
		}
		$view = new View_Models($this->template);
		$view->assign("newss", $newsArray);
	}
	//新闻详情的处理
	public function newsDetail(){
		$news_Model = new News_Models();
		$review_Model = new review_Models();
		$news_id = $_GET['news_id'];
		$news = $news_Model->getNews($news_id);
		//显示当前新闻的全部已审核评论
		$reviews = $review_Model->getNewsReview($news_id);
		$this->template = "news_detail";
		$view = new View_Models($this->template);
		$view->assign("news", $news);
		$view->assign("reviews", $reviews);
	}
	
	//显示添加新闻的页面
	public function displayAddNews(){
		//从模型获取新闻分类信息，以便在添加新闻的页面使用(表)
		$this->template = "error";
		$category_Model = new Category_Models();
		$categorys = $category_Model->getAllCategory();
		if($categorys != null){
			$this->template = "admin/add_news";
		}
		$view = new View_Models($this->template);
		$view->assign('categorys', $categorys);
	}
	
	//添加新闻的操作
	public function addNews(){
		$user_id = $_POST['user_id'];
		$category_id = $_POST['category_id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$file = $_FILES['attachment'];
		$upload = new Upload_Utils();
		$attachment = $upload->upload($file);
		$news_Model = new News_Models();
		if($news_Model->addNews($user_id, $category_id, $title, $content, $attachment)){
			//添加成功，重定向回列表
			header("Location: index.php?news&state=list");
		}else{
			//添加失败，重定向回添加页面，并携带错误信息
			header("Location: index.php?news&state=displayAddNews&error=error");
		}
	}
	//删除新闻的操作
	public function deleteNews(){
		$news_id = $_GET['news_id'];
		$news_Model = new News_Models();
		$isOk = $news_Model->deleteNews($news_id);
		if($isOk){
			//删除成功
			header("Location: index.php?news&state=list&level=guanliyuan");
		}else{
			//删除失败
			echo "删除失败";
		}
	}
	//显示编辑新闻的页面
	public function displayUpdateNews(){
		$news_id = $_GET['news_id'];
		$news_Model = new News_Models();
		$category_Model = new Category_Models();
		$news = $news_Model->getNews($news_id);
		$categorys = $category_Model->getAllCategory();
		if($news != false && $categorys != false){
			$this->template = 'admin/news_update';
		}
		$view = new View_Models($this->template);
		$view->assign('news', $news);
		$view->assign('categorys', $categorys);
	}
	//编辑新闻
	public function updateNews(){
		$news_id = $_GET['news_id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$category_id = $_POST['category_id'];
		$attachment = $_FILES['attachment'];
		if($attachment['error'] != 0){
			//如果没有选择上传文件，则附件的值为原来的值
			$attachment = $_POST['image'];
		}else if($attachment['error'] == 0){
			//上传了附件
			$upload = new Upload_Utils();
			$attachment = $upload->upload($attachment,"uploads",$news_id);
		}
		$news_Model = new News_Models();
		$isOk = $news_Model->updateNews($news_id, $title, $content, $category_id, $attachment);
		if($isOk){
			//编辑成功
			header("Location: index.php?news&state=displayUpdate&error=ok&news_id=$news_id");
		}else{
			//编辑失败
		}
	}
}