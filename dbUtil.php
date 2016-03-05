<?php

class PdoFactory
{
    public static function getConn() {

        $database = 'msgs';
        $host = '127.0.0.1';
        $username = 'root';
        $pwd = '123456';

        $conn = new PDO("mysql:host=$host; dbname=$database", $username, $pwd);
        return $conn;
    }

    public static function getResults($db, $sql) {
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCount($db, $table) {
        $sql = <<<SQL
SELECT count(*) as num from %s;
SQL;
        $sql = sprintf($sql, $table);

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPwdByName($db, $name) {
        $op = $db->prepare('SELECT pwd FROM user WHERE name = :name');
        $op->bindParam(':name', $name);
        $op->execute();
        return $op->fetchAll(PDO::FETCH_ASSOC);
    }
}

/*
$conn = PdoFactory::getConn();
$ret = PdoFactory::getCount($conn, 'msgs');
var_dump($ret);

$conn = PdoFactory::getConn();
$sql = 'select * from msgs';
$ret = PdoFactory::getResults($conn, $sql);
//$results = $ret->fetchAll(PDO::FETCH_ASSOC);
var_dump($ret);die();

$ret = $conn->query($sql);
$results = $ret->fetchAll(PDO::FETCH_ASSOC);
var_dump($results);
 */
