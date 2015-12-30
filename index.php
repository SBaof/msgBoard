<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>留言板主页</title>
</head>
<body>
  <div id="header">
    <a href="login.php">登陆</a>
    <a href="regesster.php">注册</a>
  </div>

  <div id="content">
    <h2>留言列表</h2>
    <table border="1px" cellspacing="0">
      <tr>
       <th>序号</th>
       <th>标题</th>
       <th>作者</th>
       <th>时间</th>
       <th>操作</th>
      </tr>

<?php
require_once 'connMysql.php';
$conn = PdoFactory::getConn();

$page_size = 5;
$count = PdoFactory::getCount($conn, 'msgs')[0];
$pageMaxNumber = ceil((float)($count['num'] / $page_size));
var_dump($pageMaxNumber);
//定义分页查询的变量信息

$page = isset($_GET['page']) ? $_GET['page'] : 1;
var_dump($page);


//page参数健壮性处理
if ($page<1) {
    $page = 1;
} elseif ($page > $pageMaxNumber) {
    $page = 1;
}

$lastPage = $page - 1;
$nextPage = $page + 1;

$page_begin = ($page-1) * $page_size;
//$page = 1;
//1.获取数据库中的所有留言
//2.建立数据库连接
//3.执行数据库查询
//4.处理数据库结果

//$sql = 'select * from msgs';
$sql = <<<SQL
SELECT msgs.id, msgs.title, user.name, msgs.time
FROM msgs, user
WHERE msgs.auth_id = user.id
LIMIT $page_begin, $page_size;
SQL;
//$ret = $conn->query($sql);
$ret = PdoFactory::getResults($conn, $sql);
foreach($ret as $row) {
    echo <<<STR
            <tr>
                <td>{$row['id']}</td>
                <td><a href="viewMsg.php?id={$row['id']}">{$row['title']}</a></td>
                <td>{$row['name']}</td>
                <td>{$row['time']}</td>
                <td>
                    <a href="deleteMsg.php?id={$row['id']}&page={$page}">删除</a>
                    <a href="updateMsg.php?id={$row['id']}&page={$page}">更新</a>
                </td>
            </tr>
STR;
}
?>
    </table>
        <div id = paging>
<?php
if ($page > 1) {
    echo <<<STR
        <a href="index.php?page= {$lastPage}">上一页</a>
STR;
}
    echo <<<STR
        <a href="index.php?page=1">首页</a>
STR;

if ($page < $pageMaxNumber) {
    echo <<<STR
        <a href="index.php?page= {$nextPage}">下一页</a>
STR;
}
?>
        </div>
  </div>

  <div>
    <a href="addMsg.php">添加留言</a>
  </div>

  <div id="footer">
    &copy; SBaof's Message Board
  </div>

</body>
</html>
