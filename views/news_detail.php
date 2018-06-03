<!DOCTYPE html>
<html>
<head>
<?php 
$news = $data['news'];
$reviews = $data['reviews'];
session_start();
?>
	<meta charset="utf-8">
    <title>新闻详情</title>
    <script type="text/javascript">
        function error(){
            var error = "<?=@$_GET['error']?>";
            if(error == "error"){
                //评论失败
                alert("评论失败！");
            }else if(error == "ok"){
                alert("评论成功，等待审核");
            }
        }
    </script>
</head>
<body onload="error()">
<br>
标题：<?=$news['title']?><br>
内容：<?=$news['content']?><br>
图片：<img src="views/<?=$news['attachment'] ?>">
<br>
评论：<br>
<?php foreach($reviews as $review){ ?>
<div style="background-color: #FAFAFA;width: 100%;height: 100px;">
<?=$review['name'] ?>:&nbsp;
    <?=$review['content']?>
</div>
<?php } ?>
<br>
<form action="index.php?review&state=add" method="post">
    <textarea row="4" name="content" id="review"></textarea><br>
    <input type="hidden" value="<?=$_SESSION['user_id']?>" name="user_id">
    <input type="hidden" value="<?=$news['news_id']?>" name="news_id">
    <input type="submit" value="发表评论">
</form>
<a href="views/index.php">首页</a>
</body>
</html>