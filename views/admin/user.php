<?php
//用户信息界面(管理员可看)
$user = $data['user'];
?>
<html>
<head>
<meta charset="utf-8">
<title>用户信息</title>
</head>
<body>
<h1>这是个人信息界面</h1>
用户id:<?=$user['user_id']?><br>
用户名：<?=$user['name']?><br>
用户密码(md5值)：<?=$user['password']?><br>
用户级别：<?=$user['level'] ?><br>
<a href="index.php?review&state=userReview&user_id=<?=$user['user_id']?>">该用户的所有评论</a><br>
<a href="views/admin/index.php">管理员首页</a>
</body>
</html>