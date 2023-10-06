<?php
// 支持MySQL数据库

$dbtype = 'mysql'; //设置数据库类型

$host = 'localhost'; // 设置主机名称

$dbname = 'mydemo'; //设置数据库名称

$username = 'root'; // 设置数据库用户名

$password = '123456'; // 设置数据库密码

$port = 3306; //设置数据库端口

// 创建数据源
$dsn  = "{$dbtype}:host={$host};port={$port};dbname={$dbname}";

try {
    //实例化PDO获取数据库连接
    $pdo = new PDO($dsn, $username, $password);
    $pdo->query("set names utf8");

    // echo '连接成功';
} catch (PDOException $e) {
    //捕获异常并处理
    die('连接失败' . $e->getMessage());
}
