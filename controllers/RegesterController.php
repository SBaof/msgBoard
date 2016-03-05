<?php
require_once "../PasswordHash.php";
require_once "../dbUtil.php";

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $user_name = $_POST['user'];
    $user_pwd  = $_POST['pwd'];
    $user_intro = $_POST['intro'];


    $hasher = new PasswordHash(8, false);
    $user_pwd = $hasher->HashPassword($user_pwd);

    $conn = PdoFactory::getConn();
    $sql = sprintf("insert into user (name, pwd, intro) values ('%s', '%s', '%s')", $user_name, $user_pwd, $user_intro);
    $ret = $conn->exec($sql);
    if ($ret == 1) {
        echo <<<STR
<script type="text/javascript">
    alert('regested succeed!');
    window.location.href = "../index.php";
</script>
STR;
    } else {
        echo <<<STR
<script type="text/javascript">
    alert('Something wrong:maybe user exist!');
    window.location.href = "../regester.php";
</script>
STR;

    }
}
if (isset($_POST['cancle']) && !empty($_POST['cancle'])) {
    header("location: ../index.php");
}
