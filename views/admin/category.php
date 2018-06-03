<html>
<head>
<?php $categorys = $data['categorys'];?>
<title>类型管理</title>
<meta charset="utf-8">
</head>
<body>
	类型管理页面<br><br>
	<?php foreach ($categorys as $category){?>
	类型：<?=$category['name'] ?><br>
	<?php }?>
	<br><br>
	<a href="views/admin/add_category.php">添加类型</a>
</body>
</html>