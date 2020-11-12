<?php
/******登入檢查******
 * 1. 連線資料庫
 * 2. 取得表單傳遞的帳密資料
 * 3. 比對會員資料表中是否有相符的資料
 * 4. 取得會員資料
 * 5. 檢查會員身份及權限
 * 6. 依據會員身份導向不同的頁面
 */
$dsn="mysql:host=localhost;dbname=member;charset=utf8";
$pdo= new PDO($dsn,'root','');

$acc=$_POST['acc'];
$pw=$_POST['pw'];

// 安全作法
// $sql="select count(*) from `login` where `acc`='$acc' && `pw`='$pw'";
// // echo $sql;
// $check=$pdo->query($sql)->fetchColumn();



// 建立檢查帳號密碼的SQL語法
$sql="select * from `login` where `acc`='$acc' && `pw`='$pw'";
// echo $sql;
// 執行SQL語法並取得資料
$check=$pdo->query($sql)->fetch();

// 判斷回傳質是否為空
if(!empty($check)){
  echo "登入成功";

    // 取得會員資料
    $member_sql="select * from member where login_id='{$check['id']}'";
    $member=$pdo->query($member_sql)->fetch();
    $role=$member['role'];
    
    session_start();
    
    $_SESSION['login']=$acc;

    switch($role){
      case '會員':
        header('location:mem.php');
      break;
      case 'VIP':
        header('location:vip.php');
      break;
      case '管理員':
        header('location:admin.php');
      break;
    }


}else{
  header("locationl:index.php?meg=帳密不正確，請重新登入或註冊新帳號");
}





?>