<?php
include_once 'pdo/categoryPdo.php';
/*
 **分类模型
 */
class Category_Models{
	private $category_id;
	private $name;
	//get,set
	public function getCategory_id(){
		return $this->category_id;
	}
	public function setCategory_id($category_id){
		$this->category_id = $category_id;
	}
	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name = $name;
	}
	
	//取得全部分类名称(表)
	public function getAllCategory(){
		$categorypdo = new CategoryPDO();
		$categorys = $categorypdo->queryAllCategory();
		return $categorys;
	}
	//添加类型
	public function addCategory($name){
		$categorypdo = new CategoryPDO();
		$isOK = $categorypdo->addCategory($name);
		return $isOK;
	}
}