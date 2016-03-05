<?php
require_once '../dbUtil.php';
if (isset($_POST['submit']) && !empty($_POST['submit'])) {

    $title = $_POST['title'];
    $id = $_POST['auther_id'];
    $content = $_POST['content'];

    //执行数据库插入操作

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
    window.location.href = '../msgBoard.php';
</script>
STR;
    } else {
        $conn->errorInfo();
    }
    exit("add...");
}

if (isset($_POST['cancle']) && !enpty($_POST['cancle'])) {
    echo <<<STR
<script type="text/javascript">
    alert('operation cancled!');
    window.location.href = '../msgBoard.php';
</script>
STR;
    exit('cancled...');
}