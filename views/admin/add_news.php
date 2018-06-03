<html>
<head>
<?php $categorys = $data['categorys'];
session_start();
?>
<title>添加新闻</title>
<meta charset="utf-8">
<script type="text/javascript">
		function error(){
			var error = "<?=@$_GET['error']?>";
			if(error == "error"){
				alert("添加失败！");
			}	
		}
		function yanzheng(){
		}
</script>
</head>
<body onload="error()">
	添加新闻页面：<br><br>
	<form action="index.php?news&state=add" method="post" enctype="multipart/form-data">
	标题：<input type="text" name="title" id="title"> <br>
	内容：<textarea rows="6" name="content" id="content"></textarea> <br>
	分类：<select name="category_id">
	<?php for($i=0;$i<count($categorys);$i++){?>
	<option value="<?=$categorys[$i]['category_id']?>"><?=$categorys[$i]['name']?></option>
	<?php }?>
	</select> <br>
	附件：<input type="file" name="attachment" id="attachment"> <br>
	<input type="hidden" value="<?=$_SESSION['user_id']?>" name="user_id">
	<input type="submit" value="提交">
	</form>
</body>
</html>