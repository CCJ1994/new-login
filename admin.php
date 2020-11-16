<?php 
$title="管理中心";
include_once('header.php');
?>
<h2 class="text-center mt-3">管理中心</h2>
<div class="col-12 mx-auto d-flex justify-content-between">
<?php 
if(isset($_COOKIE['login'])){
    echo $_COOKIE['login']."歡迎";
}
?>

<a href="logout.php">登出</a>
</span>

<?php 
$dsn="mysql:host=localhost;dbname=member;charset=utf8";
$pdo=new PDO($dsn,'root','');
$sql="select `login`.`id`,`acc`,`name`,`role`,`birthday`,`email`,`addr`,`create_time` 
    from `login`,`member` 
    where `login`.`id`=`member`.`login_id`";
$users=$pdo->query($sql)->fetchALL();
echo "<table class='table col-8 mx-auto'>";

echo "<thead>";
    echo "<tr>";
    echo "<th>流水號</th>";
    echo "<th>帳號</th>";
    echo "<th>姓名</th>";
    echo "<th>角色</th>";
    echo "<th>生日</th>";
    echo "<th>信箱</th>";
    echo "<th>地址</th>";
    echo "<th>註冊日</th>";
    echo "<th>操作</th>";
    echo "<tr>";
echo "<thead>";

foreach($users as $user){
    echo "<tbody>";
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
        echo "<a href='edit_user.php?id={$user['id']}'><button class='btn btn-primary'>編輯</button></a>";
        echo "<a href='del_user.php?id={$user['id']}'><button class='btn btn-danger'>刪除</button></a>";
        echo "</td>";
        echo "</tr>";
    echo "</tbody>";
}
echo "</table>";


?>


<?php 
include_once('footer.php');

?>