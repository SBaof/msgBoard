<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加留言</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
留言标题: <input type="text" name="title" /><br />
<input type="hidden" name="auther_id" value=1>
留言内容: <textarea name="content"></textarea><br />
<input type="submit" name="submit" value="发表">
<input type="submit" name="cancle" value="取消">
</form>
</body>
</html>

<?php
if (isset($_POST['submit'])) { //说明已经点击了提交按钮

    //获取表单数据
    $title = $_POST['title'];
    $id = $_POST['auther_id'];
    $content = $_POST['content'];

    //执行数据库插入操作
    require_once 'connMysql.php';
    $conn = PdoFactory::getConn();
    $sql = <<<SQL
INSERT INTO msgs (title, auth_id, content)
VALUES ("%s", "%d", "%s")
SQL;
    $sql = sprintf($sql, $title, $id, $content);
    $ret = $conn->exec($sql);

    if ($ret == 1) {
        echo <<<STR
<script type="text/javascript">
    alert('insert operation succeed!');
    window.location.href = 'index.php';
</script>
STR;
    } else {
        $conn->errorInfo();
    }
    exit("add...");
}

if (isset($_POST['cancle'])) {
    echo <<<STR
<script type="text/javascript">
    alert('operation cancled!');
    window.location.href = 'index.php';
</script>
STR;
    exit('cancled...');
}

?>
