<?php
//后台管理首页
session_start();
?>
<html>
<head>
<title>后台首页</title>
<meta charset="utf-8">
</head>
<body>
<?php if(@$_SESSION['level'] == '管理员'){?>
	<font size="8" color="red">后台管理</font><br><br><br>
	<div>
	<a href="news.php">新闻管理</a><br><br>
	<a href="../../index.php?user&state=list">用户管理</a><br><br>
	<a href="../../index.php?review&state=list">评论管理</a><br><br>
	<a href="count.php">流量统计</a><br><br>
	<a href="">手机端管理</a><br><br>
	<a href="addAdmin.php">添加管理员</a><br><br>
	<a href="../index.php">网站首页</a>
	</div>
<?php }else{?>
你不是管理员！
<a href="../index.php">网站首页</a>
<?php }?>
</body>
</html>