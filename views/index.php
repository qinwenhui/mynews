<html>
<head>
<?php 
	session_start();
 	$username = @$_SESSION['username'];
?>
<meta charset="utf-8">
<title>首页</title>
</head>
<body>
<h1>这是首页</h1>
<?php if($username == null){?>
<a href="login.php">你暂未登录，点击登录</a>&nbsp;&nbsp;
<a href="register.php">注册</a><br><br>
<?php }else{?>
欢迎您，<a href="../index.php?user&state=user&user_id=<?=@$_SESSION['user_id']?>"><?=$username?></a>&nbsp;&nbsp;
<a href="../index.php?user&state=zhuxiao">注销</a>
<?php }?><br>
<a href="../index.php?news&state=list">新闻列表</a>
<br><br><br><br><br><br>
<?php if(@$_SESSION['level'] == '管理员'){?>
<a href="admin/index.php">管理员后台</a>
<?php }?>
</body>
</html>