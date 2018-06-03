<html>
<head>
<?php $users = $data['users'];?>
<title>用户列表</title>
<meta charset="utf-8">
</head>
<body>
	用户列表管理页面<br><br>
	所有用户列表：<br><br>
	<?php foreach($users as $user){?>
	<a href="index.php?user&state=user&user_id=<?=$user['user_id'] ?>&level=guanliyuan"><?=$user['name'] ?></a>
	<br>
	<?php }?>
</body>
</html>