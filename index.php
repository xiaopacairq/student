<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生信息主页面</title>
</head>

<body>
    <!-- center居中标签 -->
    <center>
        <?php
        // 引入公共数据库、导航栏文件
        include 'menu.php';
        require 'conn.php';
        ?>

        <!-- 大标题 -->
        <h3>学生信息浏览</h3>

        <!-- 查询信息框 -->
        <form action="" method="get">
            <input type="text" name="select" placeholder="请输入查询信息">
            <input type="submit" value="查询">
        </form>

        <!-- 使用表格展示数据 -->
        <table border="1" width="800" cellspacing="0" cellpadding="5" bordercolor="skyblue" style="font-family: '楷体';">
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>电话</th>
                <th>年龄</th>
                <th>学院</th>
                <th colspan="2">操作</th>
            </tr>

            <?php
            //构造SQL语句
            $sql = "SELECT * from stu";
            // print_r($sql); 

            // 查询框增加查询条件$_GET
            if (isset($_GET['select'])) {
                // print_r(($_GET['select']));

                $select = $_GET['select'];
                // 拼接sql语句，添加条件
                // 模糊查询语法 数据库字段 like %PHP变量%
                $sql .= " where stu_no like '%$select%' 
                or stu_name like '%$select%'
                or gender like '%$select%'
                or telephone like '%$select%'
                or age like '%$select%'
                or college like '%$select%'
                ";
            }

            //执行sql语句，query返回一个PDOStatement对象
            $result = $pdo->query($sql);
            // print_r($result);

            //执行PDOStatement对象的fetchall方法，返回一个存放学生数据的二维数组
            $stu_arr = $result->fetchAll(PDO::FETCH_ASSOC);
            // print_r($stu_arr);

            // foreach循环二维数组
            foreach ($stu_arr as $stu) {
                echo '<tr>';
                echo "<td>{$stu['stu_no']}</td>";
                echo "<td>{$stu['stu_name']}</td>";
                echo "<td>{$stu['gender']}</td>";
                echo "<td>{$stu['telephone']}</td>";
                echo "<td>{$stu['age']}</td>";
                echo "<td>{$stu['college']}</td>";
                echo "<td><a href='update.php?stu_no={$stu['stu_no']}'>修改</a></td>";
                echo "<td><a href='delete.php?stu_no={$stu['stu_no']}'>删除</a></td>";
                echo '</tr>';
            }
            ?>
        </table>
    </center>
</body>

</html>