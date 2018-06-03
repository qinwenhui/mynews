<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function error(){
			var username = "<?=@$_GET['error']?>";
			if(username == "error"){
				alert("用户名已存在！");
			}	
		}
		function yanzheng(){
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var password2 = document.getElementById("password2").value;
			if(username == "" || password == ""){
				alert("用户名或密码不能为空");
				return false;
			}else if(password != password2){
				alert("两次密码不相同");
				return false;
			}
			return true;
		}
	</script>
	<meta charset="utf-8">
    <title>添加管理员</title>
</head>
<body onload="error()">
<form action="../../index.php?register" method="post" onsubmit="return yanzheng()">
    <font size="4">用户名</font><input type="text" name="userName" id="username"><br>
    <font size="4">密&nbsp;&nbsp;码</font><input type="text" name="password" id="password"><br>
    <font size="4">再次输入密码</font><input type="text" name="password" id="password2"><br>
    <input type="hidden" name="level" value="管理员">
    <input type="submit" value="注册">
</form>
</body>
</html>