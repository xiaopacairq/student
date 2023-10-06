<?php
require 'conn.php'; // 引入数据库连接文件

$stu_get = $_GET['stu_no']; // 获取参数
// print_R($stu_get);

// 构造删除sql语句
$sql = "DELETE from stu where stu_no='{$stu_get}'";

// 执行sql语句，exec
$result = $pdo->exec($sql);
header('Location:index.php');
