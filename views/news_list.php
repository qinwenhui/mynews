<!DOCTYPE html>
<html>
<head>
<?php 
$newss = $data['newss'];
?>
	<meta charset="utf-8">
    <title>新闻列表</title>
</head>
<body>
下面是新闻列表<br>
<?php foreach($newss as $news){?>
<?=$news['title']?><a href="index.php?news&state=detail&news_id=<?=$news['news_id']?>">详情</a><br>
<?php }?>
<a href="views/index.php">首页</a>
</body>
</html>