
 <?php
 /*编写_autoload函数，用于自动导入要初始化的类的位置*/
 
 function __autoload($className){
 	//自动导入要根据命名规则，类的名称是( 文件名_文件夹)例如：User_Models
 	list($filename,$folde) = explode("_", $className);
 	$file = SERVER_ROOT."/".strtolower($folde)."/".strtolower($filename).".php";
 	if(file_exists($file)){
 		include_once($file);
 	}else{
 		print "没找到这文件".$file;
 	}
 }

 $request = $_SERVER['QUERY_STRING'];
 $parsed = explode('&', $request);
 //array_shift()是把一个数组的第一个元素去掉并返回，原来的数组变成新的数组（不包含第一个元素）
 $page = array_shift($parsed);
 //把?后面的健和值分开，存入数组
 $getVars = array();
 foreach ($parsed as $argument)
 {
 	list($variable,$value) = explode('=',$argument);
 	$getVars[$variable] = $value;
 }
 //要加载的控制器
 $target = SERVER_ROOT . '/controllers/' . $page . '.php';
 
 if(file_exists($target)){
 	include_once ($target);
 	$class = ucfirst($page)."_Controller";
 	if(class_exists($class)){
 		$controller = new $class;
 	}else {
 		print "找不到类".$class;
 	}
 }else{
 	print "找不到".$target."文件";
 }
 $controller->main($getVars);
?>