<?php
require_once '../PasswordHash.php';
require_once '../dbUtil.php';

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $user_name = $_POST['user'];
    $user_pwd  = $_POST['pwd'];

    //set cookie
    $ret = setcookie('user', $user_name, time() + 24 * 3600);
    var_dump($ret);

    var_dump($_COOKIE);

    $conn = PdoFactory::getConn();
    $pwd = PdoFactory::getPwdByName($conn, $user_name);
    $hasher = new PasswordHash(8, false);
    $ret = $hasher->CheckPassword($user_pwd, $pwd[0]['pwd']);

    if ($ret) {
        echo <<<STR
<script type="text/javascript">
    alert('welcome back!');
    window.location.href = "../msgBoard.php";
</script>
STR;
    } else {
         echo <<<STR
<script type="text/javascript">
    alert('Permition denied!');
    window.location.href = "../index.php";
</script>
STR;
    }
}

if (isset($_POST['signup']) && !empty($_POST['signup'])) {
    header("location: ../regester.php");
}
