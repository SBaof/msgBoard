<?php

require_once 'connMysql.php';
$conn = PdoFactory::getConn();

//获取当前留言信息
$id = $_GET['id'];

$sql = <<<SQL
SELECT * FROM msgs
WHERE id = {$id}
SQL;

$msg = PdoFactory::getResults($conn, $sql)[0];
var_dump($msg);

//更新信息
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = <<<SQL
UPDATE msgs SET title = "%s", content = "%s" where id = "%d"
SQL;
$sql = sprintf($sql, $title, $content, $id);
$ret = $conn->exec($sql);

if ($ret == 1) {
    echo <<<STR
<script type="text/javascript">
    alert('update recode succeed!');
    window.location.href = "index.php";
</script>
STR;
} else {

    var_dump($conn->errorInfo());
}
exit("update...");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改留言</title>
</head>
<body>
    <form action="" method="post">
    <p>留言标题: <input type="text" name="title" value="<?php echo $msg['title'];?>"/></p>
    <p>留言内容: <textarea  name="content"><?php echo $msg['content'];?></textarea></p>
        <p>
            <input type="submit" value="更新" name="submit">
            <input type="submit" value="取消" name="cancle">
        </p>
    </form>
</body>
</html>
