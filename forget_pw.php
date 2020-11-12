<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>忘記密碼</title>
</head>
<body>
<?php
if(isset($_POST['email'])){
    $dsn="mysql:host=localhost;dbname=member;charset=utf8";
    $pdo=new PDO($dsn,'root','');
    $sql="select * from login where email='{$_POST['email']}'";
    echo $sql;
    $chk=$pdo->query($sql)->fetch();
    
    echo "<pre>";
    print_r($chk);
    echo "</pre>";

    if(!empty($chk)){
        $res=$chk['pw'];

    }else{
        $res="查無此人";
    }
}


?>


    <form action="?" method="post">
        <input type="text" name="email">
        <input type="submit" value="查詢">
    </form>
    <span>
    <?php
    if(isset($res)){
        echo $res;
    }
    ?>
    </span>
</body>
</html>