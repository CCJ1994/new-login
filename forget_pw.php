<?php
$title="忘記密碼";
include_once('header.php');
?>
<?php
if(isset($_POST['email'])){
    $dsn="mysql:host=localhost;dbname=member;charset=utf8";
    $pdo=new PDO($dsn,'root','');
    $sql="select * from login where email='{$_POST['email']}'";
    // echo $sql;
    $chk=$pdo->query($sql)->fetch();
    // echo "<pre>";
    // print_r($chk);
    // echo "</pre>";
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





<?php
include_once('footer.php');
?>