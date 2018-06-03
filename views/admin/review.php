<html>
<head>
<?php $reviews = $data['reviews'];?>
<title>评论管理</title>
<meta charset="utf-8">
</head>
<body>
	用户评论管理页面<br><br>
	<?php foreach($reviews as $review){ if($review['state'] == '已审核'){ ?>
	<div style="width: 100%;background-color: #EAEAEA;">
	<a href="index.php?news&state=detail&news_id=<?=$review['news_id']?>">查看来源新闻</a><br>
	<a href="index.php?user&state=user&user_id=<?=$review['user_id'] ?>&level=guanliyuan">查看该评论的用户信息</a><br>
	<?=$review['content']?>
	</div>
	<?php }?>
	<?php if($review['state'] == '未审核'){ ?>
	<div style="width: 100%;background-color: #EAEAEA;">
	<a href="index.php?news&state=detail&news_id=<?=$review['news_id']?>">查看来源新闻</a><br>
	<a href="index.php?user&state=user&user_id=<?=$review['user_id'] ?>&level=guanliyuan">查看该评论的用户信息</a><br>
	<?=$review['content']?><br><br>当前评论未审核，<a href="index.php?review&state=shenhe&review_id=<?=$review['review_id']?>"> 审核</a>
	</div>
	<div style="width: 100%;height: 10px;background-color: #FAFAFA;">
	<?php }?>
	</div>
	<div style="width: 100%;height: 30px;background-color: #FAFAFA;">
	</div>
	<?php }?>
</body>
</html>