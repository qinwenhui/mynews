<?php
/*
 **文件上传操作工具类
 */
class Upload_Utils{
	//文件上传函数
	function upload($file,$file_path='uploads',$id=''){
		$error = $file['error'];
		switch ($error){
			case 0:
				$file_name = $id.$file['name'];
				$file_temp = $file['tmp_name'];
				//路径
				$destination = $file_path."/".$file_name;
				//移动文件
				move_uploaded_file($file_temp,"views/".$destination);
				return $destination;
			case 1:
				return "上传附件超过了php.ini中upload_max_filesize选项限制的值";
			case 2:
				return "上传附件超过了form表单MAX_FILE_SIZE限制的值";
			case 3:
				return "附件只有部分被上传";
			case 4:
				return "没有选择上传附件";
				
		}
	}
}