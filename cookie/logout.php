<?php

setcookie('user', '', time() - 24 * 3600);

unset($_COOKIE['user']);

header("location: login.php");

?>
