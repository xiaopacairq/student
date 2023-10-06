<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改信息页面</title>
</head>

<body>
    <!-- 页面居中 -->
    <center>
        <?php
        // 引入公共数据库、导航栏文件
        include 'menu.php';
        require 'conn.php';

        // 主页面传递的get请求参数
        $stu_get = $_GET['stu_no'];

        // sql语句
        $sql = "SELECT * from stu where stu_no='{$stu_get}'";

        // 执行sql语句，query返回一个PDOStatement对象
        $result = $pdo->query($sql);

        $stu_arr = $result->fetch(PDO::FETCH_ASSOC);
        // print_r($stu_arr);
        ?>

        <!-- 大标题 -->
        <h3>修改学生信息</h3>

        <!-- action="" 表示本文件处理数据 -->
        <!-- method="post" 更加安全的请求方式 -->
        <form action="" method="post">
            <!-- 表格布局，借助表格的单元格规则进行布局，但不出现边框线     -->
            <table>
                <tr>
                    <td>学号：</td>
                    <td><input type="text" name="stu_no" value="<?php echo $stu_arr['stu_no'] ?>"></td>
                </tr>
                <tr>
                    <td>姓名：</td>
                    <td><input type="text" name="stu_name" value="<?php echo $stu_arr['stu_name'] ?>"></td>
                </tr>
                <tr>
                    <td>性别：</td>
                    <td>
                        男<input type="radio" name="gender" value="男" <?php if ($stu_arr['gender'] == '男') {
                                                                            echo 'checked';
                                                                        } ?>>
                        女<input type="radio" name="gender" value="女" <?php if ($stu_arr['gender'] == '女') {
                                                                            echo 'checked';
                                                                        } ?>>
                    </td>
                </tr>
                <tr>
                    <td>电话</td>
                    <td><input type="text" name="telephone" value="<?php echo $stu_arr['telephone'] ?>"></td>
                </tr>
                <tr>
                    <td>年龄</td>
                    <td><input type="text" name="age" value="<?php echo $stu_arr['age'] ?>"></td>
                </tr>
                <tr>
                    <td>学院</td>
                    <td><input type="text" name="college" value="<?php echo $stu_arr['college'] ?>"></td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <input type="submit" value="修改">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        // 返回当前浏览器的请求方式
        // print_R($_SERVER['REQUEST_METHOD']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print_r($_POST);
            // 数组访问
            $stu_no = $_POST['stu_no'];
            $stu_name = $_POST['stu_name'];
            $gender = $_POST['gender'];
            $telephone = $_POST['telephone'];
            $age = $_POST['age'];
            $college = $_POST['college'];


            // 修改SQL语句
            $sql = "UPDATE stu set stu_no='{$stu_no}',stu_name='{$stu_name}',gender='{$gender}',telephone='{$telephone}',age='{$age}',college='{$college}' where stu_no='{$stu_get}'";

            // 执行sql语句，exec
            $result = $pdo->exec($sql);
            // print_r($result);

            header('Location:index.php');
        }


        ?>

    </center>
</body>

</html>