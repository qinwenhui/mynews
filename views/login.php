<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function error(){
			var error = "<?=@$_GET['error']?>";
 			if(error == "error"){
				alert("用户名或密码错误！");
			}	
		}
		function yanzheng(){
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			if(username == "" || password == ""){
				alert("用户名或密码不能为空");
				return false;
			}
			return true;
		}
		
	</script>
	<meta charset="utf-8">
    <title>登陆</title>
</head>
<body onload="error()">
<form action="../index.php?login" method="post" onsubmit="return yanzheng()">
    <font size="4">用户名</font><input type="text" name="userName" id="username"><br>
    <font size="4">密&nbsp;码</font><input type="text" name="password" id="password"><br>
    <input type="submit" value="登录">
</form>
</body>
</html>