<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加信息页面</title>
</head>

<body>
    <!-- 页面居中 -->
    <center>
        <?php
        // 引入公共数据库、导航栏文件
        include 'menu.php';
        require 'conn.php';
        ?>

        <!-- 大标题 -->
        <h3>添加学生信息</h3>
        <!-- action="" 表示本文件处理数据 -->
        <!-- method="post" 更加安全的请求方式 -->
        <form action="" method="post">
            <!-- 表格布局，借助表格的单元格规则进行布局，但不出现边框线     -->
            <table>
                <tr>
                    <td>学号：</td>
                    <td><input type="text" name="stu_no"></td>
                </tr>
                <tr>
                    <td>姓名：</td>
                    <td><input type="text" name="stu_name"></td>
                </tr>
                <tr>
                    <td>性别：</td>
                    <td>
                        男<input type="radio" name="gender" value="男" checked>
                        女<input type="radio" name="gender" value="女">
                    </td>
                </tr>
                <tr>
                    <td>电话</td>
                    <td><input type="text" name="telephone"></td>
                </tr>
                <tr>
                    <td>年龄</td>
                    <td><input type="text" name="age"></td>
                </tr>
                <tr>
                    <td>学院</td>
                    <td><input type="text" name="college"></td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <input type="submit" value="添加">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        // 返回当前浏览器的请求方式
        print_R($_SERVER['REQUEST_METHOD']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print_r($_POST);
            // 数组访问
            $stu_no = $_POST['stu_no'];
            $stu_name = $_POST['stu_name'];
            $gender = $_POST['gender'];
            $telephone = $_POST['telephone'];
            $age = $_POST['age'];
            $college = $_POST['college'];

            // 添加命令语句sql
            $sql = "INSERT into stu(stu_no,stu_name,gender,telephone,age,college) values 
            ('{$stu_no}','{$stu_name}','{$gender}','{$telephone}','{$age}','{$college}')";

            // 执行sql语句，exec()方法返回影响行数
            $result = $pdo->exec($sql);
            print_r($result);

            if ($result > 0) {
                header('Location:index.php');
            } else {
                echo '添加失败';
            }
        }


        ?>


    </center>
</body>

</html>