<?php
// 處理新增使用者的功能
$dsn="mysql:host=localhost;dbname=member;charset=utf8";
$pdo= new PDO($dsn,'root','');

$acc=$_POST['acc'];
$pw=$_POST['pw'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$addr=$_POST['addr'];
$email=$_POST['email'];
$education=$_POST['education'];

$insert_to_login="insert into `login`(`acc`,`pw`,`email`) values('$acc','$pw','$email')";
echo $insert_to_login;
// $pdo->query($insert_to_login);
$pdo->exec($insert_to_login);


?>