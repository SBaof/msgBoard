<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加留言</title>
</head>
<body>
<form action="controllers/AddController.php" method="post">
留言标题: <input type="text" name="title" /><br />
<input type="hidden" name="auther_id" value=1>
留言内容: <textarea name="content"></textarea><br />
<input type="submit" name="submit" value="发表">
<input type="submit" name="cancle" value="取消">
</form>
</body>
</html>
