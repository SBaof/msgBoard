<?php
//1.获取url参数
//2.查询指定信息

$msg_id = $_GET['id'];

require_once 'connMysql.php';
$conn = PdoFactory::getConn();
$sql = <<<SQL
SELECT msgs.title, msgs.content, msgs.time, user.name
FROM msgs, user
WHERE msgs.id = $msg_id AND msgs.auth_id = user.id;
SQL;
$msg = PdoFactory::getResults($conn, $sql)[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>显示留言</title>
</head>
<body>
<div>留言标题：<?php echo $msg['title']; ?></div>
<div>留言发表者：<?php echo $msg['name']; ?></div>
<div>留言内容：<?php echo $msg['content']; ?></div>
<div>留言发表时间：<?php echo $msg['time']; ?></div>
<div>
    <a href="index.php">Back</a>
</div>
</body>
</html>
