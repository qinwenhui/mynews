<?php
//用户信息界面
$user = $data['user'];
?>
<html>
<head>
<meta charset="utf-8">
<title>个人信息</title>
</head>
<body>
<h1>这是个人信息界面</h1>
用户id:<?=$user['user_id']?><br>
用户名：<?=$user['name']?><br>
<a href="views/index.php">首页</a>
</body>
</html>