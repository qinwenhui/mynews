<html>
<head>
<title>添加类型</title>
<meta charset="utf-8">
<script type="text/javascript">
		function error(){
			var error = "<?=@$_GET['error']?>";
			if(error == "error"){
				alert("添加失败！");
			}	
		}
		function yanzheng(){
			var category = document.getElementById("category").value;
			if(category == ""){
				alert("名称不能为空！");
				return false;
			}
			return true;
		}
</script>
</head>
<body onload="error()">
	添加新闻类型页面：<br><br>
	<form action="../../index.php?category&state=add" method="post" onsubmit="return yanzheng()">
	<input type="text" name="category_name" id="category">
	<input type="submit" value="提交">
	</form>
</body>
</html>