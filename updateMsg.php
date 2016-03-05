<?php
require_once 'dbUtil.php';
$conn = PdoFactory::getConn();

//获取当前留言信息
$id = $_GET['id'];

$sql = <<<SQL
SELECT * FROM msgs
WHERE id = {$id}
SQL;

$msg = PdoFactory::getResults($conn, $sql)[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改留言</title>
</head>
<body>
    <form action="Controllers/UpdateController.php?id={$id}" method="post">
    <p>留言标题: <input type="text" name="title" value="<?php echo $msg['title'];?>"/></p>
    <input type="hidden" name="id" value="<?php echo $id;?>" /></p>
    <p>留言内容: <textarea  name="content"><?php echo $msg['content'];?></textarea></p>
        <p>
            <input type="submit" value="更新" name="submit">
            <input type="submit" value="取消" name="cancle">
        </p>
    </form>
</body>
</html>
