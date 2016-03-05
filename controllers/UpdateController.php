<?php
require_once '../dbUtil.php';
$conn = PdoFactory::getConn();

//更新信息
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
	$id = $_POST['id'];
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
    window.location.href = "../msgBoard.php";
</script>
STR;
} else {
	echo "ERROR", PHP_EOL;
    var_dump($conn->errorInfo());
}
exit("update...");
}
