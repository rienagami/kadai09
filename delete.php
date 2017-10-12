<?php
$id= $_GET["id"];

//DB接続
try {
    $pdo = new
    PDO('mysql:dbname=gs_db_34;charset=utf8;
    host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}


$stmt  = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
$stmt->bindValue(':id',$id);//セキュリティのためらしい
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: select.php");
    exit;
}

?>