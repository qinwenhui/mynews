<html>
<head>
<?php $reviews = $data['reviews'];?>
<title>用户评论</title>
<meta charset="utf-8">
</head>
<body>
	用户评论管理页面<br><br>
	<?php foreach ($reviews as $review){?>
	<div style="width: 100%;height: 50px;background-color: #EAEAEA;">
	<a href="index.php?news&state=detail&news_id=<?=$review['news_id']?>">查看来源新闻</a><br>
	<?=$review['content']?>
	</div>
	<div style="width: 100%;height: 10px;background-color: #FAFAFA;">
	</div>
	<?php }?>
</body>
</html>