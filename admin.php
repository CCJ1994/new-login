<?php
$title="管理中心";
include_once('header.php');
?>

<body>
    <h1 class="text-center">管理中心</h1>

    <div class="col-8 mx-auto d-flex justify-content-between">


    <span>
    <?php
    if(isset($_COOKIE['login'])){
        echo $_COOKIE['login']."歡迎";
    }
    ?>
    <span style="font-size:1rem"><a href="logout.php">登出</a></span>
    </span>

    </div>


    <?php

    

    $dsn="mysql:host=localhost;dbname=member;charset=utf8";
    $pdo= new PDO($dsn,'root','');
    $sql="select `login`.`id`,`acc`,`name`,`role`,`birthday`,`email`,`addr`,`create_time` 
        from `login`,`member` 
        where `login`.`id`=`member`.`login_id`";
    $users=$pdo->query($sql)->fetchALL();

    echo "<table class='table col-8 mx-auto'>";

    echo"<tr>";
    echo "<td>流水號</td>";
    echo "<td>帳號</td>";
    echo "<td>姓名</td>";
    echo "<td>角色</td>";
    echo "<td>生日</td>";
    echo "<td>信箱</td>";
    echo "<td>地址</td>";
    echo "<td>註冊日</td>";
    echo "<td>操作</td>";

    echo"</tr>";

    foreach($users as $user){
        echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['acc']}</td>";
            echo "<td>{$user['name']}</td>";
            echo "<td>{$user['role']}</td>";
            echo "<td>{$user['birthday']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>{$user['addr']}</td>";
            echo "<td>{$user['create_time']}</td>";
            echo "<td>";
            echo "<a href='edit_user.php?id={$user['id']}'><button class='btn btn-sm btn-info'>編輯</button></a>";
            echo "<a href='del_user.php?id={$user['id']}'><button class='btn btn-sm btn-danger'>刪除</button></a>";
    
            echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>


</body>
<?php
include_once('footer.php');
?>
  