<?php
/*
**新闻类型控制器
*/
class Category_Controller{
	//要加载的页面名字
	public $template = "error";
	public function main(array $getVars){
		//通过传入的关联数组$getVars进行一些操作,state=list就是显示列表
		switch ($getVars['state']){
			case 'list': self::categoryList();break;
			case 'add':self::addCategory();break;
		}
	}
	//显示类型列表
	public function categoryList(){
		$category_Model = new Category_Models();
		$categorys = $category_Model->getAllCategory();
		if($categorys != null){
			$this->template = "admin/category";
		}
		$view = new View_Models($this->template);
		$view->assign("categorys", $categorys);
	}
	//添加类型
	public function addCategory(){
		$category_Model = new Category_Models();
		$name = $_POST['category_name'];
		if($category_Model->addCategory($name)){
			//添加成功，重定向到类型列表
			header("Location: index.php?category&state=list");
		}else{
			//添加失败，重定向到原来的页面（添加类型页面），并携带错误信息
			header("Location: views/admin/add_category.php?error=error");
		}
	}
}