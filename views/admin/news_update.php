<html>
<head>
<?php $news = $data['news'];?>
<?php $categorys = $data['categorys'];?>
<title>编辑新闻</title>
<meta charset="utf-8">
<script type="text/javascript">
		function error(){
			var error = "<?=@$_GET['error']?>";
			if(error == "error"){
				alert("添加失败！");
			}
			if(error == "ok"){	
				alert("编辑成功！");
			}
		}
</script>
</head>
<body onload="error()">
<a href="index.php?news&state=list&level=guanliyuan">返回新闻列表</a><br><br>
	<form action="index.php?news&state=update&news_id=<?=$news['news_id']?>" method="post" enctype="multipart/form-data">
	标题：<input type="text" name="title" id="title" value="<?=$news['title']?>"> <br>
	内容：<textarea rows="6" name="content" id="content" ><?=$news['content']?></textarea> <br>
	分类：<select name="category_id">
	<?php for($i=0;$i<count($categorys);$i++){?>
	<option value="<?=$categorys[$i]['category_id']?>"<?php if($news['category_id']==$categorys[$i]['category_id']){echo "selected";}?>><?=$categorys[$i]['name']?></option>
	<?php }?>
	</select> <br>
	<img src="views/<?=$news['attachment']?>"><br>
	附件：<input type="file" name="attachment" id="attachment"> <br>
	<input type="hidden" name="image" value="<?=$news['attachment'] ?>">
	<input type="hidden" value="<?=$_SESSION['user_id']?>" name="user_id">
	<input type="submit" value="编辑">
	</form>
</body>
</html>