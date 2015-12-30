<?php
//获取要删除的userID

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    //跳转到主页
    header('Location: index.php');
}
$page = $_GET['page'];

//执行删除操作
require_once 'connMysql.php';

//$id = 1;
$conn = PdoFactory::getConn();
$sql = "delete from msgs where id = %d";
$sql= sprintf($sql, $id);
//var_dump($sql);die();
$ret = $conn->exec($sql);
//var_dump($ret);die();
if ($ret == true) {
    echo <<<STR
<script type="text/javascript">
    alert("recode delete succeed!");
    window.location.href = "index.php?page=$page";
</script>
STR;
} else {
    echo <<<STR
<script type="text/javascript">
    alert("recode delete failed!");
    window.location.href = "index.php?page=$page";
</script>
STR;
}
exit("delete...");
?>
