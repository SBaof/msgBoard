<?php

if (isset($_COOKIE['user']) && !empty($_COOKIE['user'])) {
    echo <<<STR
    welcome back, {$_COOKIE['user']};
    <br>
    <a href="logout.php">logout</a>
STR;
} else {
    echo <<<STR
    please login...
STR;
    header("location: login.php");
}
